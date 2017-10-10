<?php

namespace App\Http\Controllers;

set_time_limit(0);

use App\Region;
use Illuminate\Http\Request;
use Yangqi\Htmldom\Htmldom;

class RegionController extends Controller
{
    private $baseUrl = 'http://www.stats.gov.cn/tjsj/tjbz/tjyqhdmhcxhfdm/2015/';

    public function index(Request $request)
    {
        $list = Region::with('children')->get();
        $callback = $request->get('callback');
        if (!$callback) {
            return response()->json($list);
        } else {
            return response()->json('aaa');
        }
    }

    public function show(Request $request, $id = null)
    {
        $list = Region::where('parent_code', $id)->get();
        $callback = $request->get('callback');
        if (!$callback) {
            return response()->json($list);
        } else {
            return response()->jsonp($callback, $list);
        }
    }

    public function fetch()
    {
        $province_list = [
            '北京市' => 'http://www.stats.gov.cn/tjsj/tjbz/tjyqhdmhcxhfdm/2015/11.html',
//            '天津市' => 'http://www.stats.gov.cn/tjsj/tjbz/tjyqhdmhcxhfdm/2015/12.html',
//            '河北省' => 'http://www.stats.gov.cn/tjsj/tjbz/tjyqhdmhcxhfdm/2015/13.html',
//            '山西省' => 'http://www.stats.gov.cn/tjsj/tjbz/tjyqhdmhcxhfdm/2015/14.html',
//            '内蒙古自治区' => 'http://www.stats.gov.cn/tjsj/tjbz/tjyqhdmhcxhfdm/2015/15.html',
//            '辽宁省' => 'http://www.stats.gov.cn/tjsj/tjbz/tjyqhdmhcxhfdm/2015/21.html',
//            '吉林省' => 'http://www.stats.gov.cn/tjsj/tjbz/tjyqhdmhcxhfdm/2015/22.html',
//            '黑龙江省' => 'http://www.stats.gov.cn/tjsj/tjbz/tjyqhdmhcxhfdm/2015/23.html',
//            '上海市' => 'http://www.stats.gov.cn/tjsj/tjbz/tjyqhdmhcxhfdm/2015/31.html',
//            '江苏省' => 'http://www.stats.gov.cn/tjsj/tjbz/tjyqhdmhcxhfdm/2015/32.html',
//            '浙江省' => 'http://www.stats.gov.cn/tjsj/tjbz/tjyqhdmhcxhfdm/2015/33.html',
//            '安徽省' => 'http://www.stats.gov.cn/tjsj/tjbz/tjyqhdmhcxhfdm/2015/34.html',
//            '福建省' => 'http://www.stats.gov.cn/tjsj/tjbz/tjyqhdmhcxhfdm/2015/35.html',
//            '江西省' => 'http://www.stats.gov.cn/tjsj/tjbz/tjyqhdmhcxhfdm/2015/36.html',
//            '山东省' => 'http://www.stats.gov.cn/tjsj/tjbz/tjyqhdmhcxhfdm/2015/37.html',
//            '河南省' => 'http://www.stats.gov.cn/tjsj/tjbz/tjyqhdmhcxhfdm/2015/41.html',
//            '湖北省' => 'http://www.stats.gov.cn/tjsj/tjbz/tjyqhdmhcxhfdm/2015/42.html',
//            '湖南省' => 'http://www.stats.gov.cn/tjsj/tjbz/tjyqhdmhcxhfdm/2015/43.html',
//            '广东省' => 'http://www.stats.gov.cn/tjsj/tjbz/tjyqhdmhcxhfdm/2015/44.html',
//            '广西壮族自治区' => 'http://www.stats.gov.cn/tjsj/tjbz/tjyqhdmhcxhfdm/2015/45.html',
//            '海南省' => 'http://www.stats.gov.cn/tjsj/tjbz/tjyqhdmhcxhfdm/2015/46.html',
//            '重庆市' => 'http://www.stats.gov.cn/tjsj/tjbz/tjyqhdmhcxhfdm/2015/50.html',
//            '四川省' => 'http://www.stats.gov.cn/tjsj/tjbz/tjyqhdmhcxhfdm/2015/51.html',
//            '贵州省' => 'http://www.stats.gov.cn/tjsj/tjbz/tjyqhdmhcxhfdm/2015/52.html',
//            '云南省' => 'http://www.stats.gov.cn/tjsj/tjbz/tjyqhdmhcxhfdm/2015/53.html',
//            '西藏自治区' => 'http://www.stats.gov.cn/tjsj/tjbz/tjyqhdmhcxhfdm/2015/54.html',
//            '陕西省' => 'http://www.stats.gov.cn/tjsj/tjbz/tjyqhdmhcxhfdm/2015/61.html',
//            '甘肃省' => 'http://www.stats.gov.cn/tjsj/tjbz/tjyqhdmhcxhfdm/2015/62.html',
//            '青海省' => 'http://www.stats.gov.cn/tjsj/tjbz/tjyqhdmhcxhfdm/2015/63.html',
//            '宁夏回族自治区' => 'http://www.stats.gov.cn/tjsj/tjbz/tjyqhdmhcxhfdm/2015/64.html',
//            '新疆维吾尔自治区' => 'http://www.stats.gov.cn/tjsj/tjbz/tjyqhdmhcxhfdm/2015/65.html'
        ];

        $result = array();
        foreach ($province_list as $key => $value) {
            array_push($result, [$key => $this->fetch_child_data($value)]);
        }

        return response()->json($result);
    }

    private function fetch_child_data($url)
    {
        $str = $this->getHtml($url);
        $isLast = strpos($str, '城乡分类') > 0;
        $str = str_replace('countytr', 'citytr', $str);
        $str = str_replace('towntr', 'citytr', $str);
        $str = str_replace('villagetr', 'citytr', $str);

        $result = array();
        $html = new Htmldom();
        $html->load($str);

        $list = $html->find('.citytr');

        $pos = strripos($url, '/');
        $baseUrl = substr($url, 0, $pos);
        if (sizeof($list) > 0) {
            foreach ($list as $element) {
                // 如果有下级
                if (sizeof($element->find('td a')) > 0) {
                    $dataUrl = $baseUrl . '/' . $element->children[0]->children[0]->href;
                    $data = [
                        'url' => $dataUrl,
                        'code' => $element->children[0]->children[0]->innertext,
                        'text' => $isLast ? $element->children[2]->children[0]->innertext : $element->children[1]->children[0]->innertext,
                        'children' => $this->fetch_child_data($dataUrl)
                    ];
                    array_push($result, $data);
                } else {
                    $data = [
                        'url' => null,
                        'code' => $element->children[0]->innertext,
                        'text' => $isLast ? $element->children[2]->innertext : $element->children[1]->innertext,
//                        'children' => $this->fetch_child_data($this->baseUrl . $element->children[0]->children[0]->href)
                    ];
                    array_push($result, $data);
                }
            }
//            echo $url . '<br/>';
//            flush();
        } else {
//            echo $str;
        }

        return $result;
    }

    private function getHtml($url)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        $output = curl_exec($ch);
        curl_close($ch);
        return mb_convert_encoding($output, "utf-8", "gb2312");
    }
}
