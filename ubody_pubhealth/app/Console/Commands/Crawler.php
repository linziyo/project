<?php

namespace App\Console\Commands;

use App\Models\Region;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;
use Yangqi\Htmldom\Htmldom;

class Crawler extends Command
{
    private $province_list = [
        '北京市' => ['url' => 'http://www.stats.gov.cn/tjsj/tjbz/tjyqhdmhcxhfdm/2015/11.html', 'code' => '110000000000'],
        '天津市' => ['url' => 'http://www.stats.gov.cn/tjsj/tjbz/tjyqhdmhcxhfdm/2015/12.html', 'code' => '120000000000'],
        '河北省' => ['url' => 'http://www.stats.gov.cn/tjsj/tjbz/tjyqhdmhcxhfdm/2015/13.html', 'code' => '130000000000'],
        '山西省' => ['url' => 'http://www.stats.gov.cn/tjsj/tjbz/tjyqhdmhcxhfdm/2015/14.html', 'code' => '140000000000'],
        '内蒙古自治区' => ['url' => 'http://www.stats.gov.cn/tjsj/tjbz/tjyqhdmhcxhfdm/2015/15.html', 'code' => '150000000000'],
        '辽宁省' => ['url' => 'http://www.stats.gov.cn/tjsj/tjbz/tjyqhdmhcxhfdm/2015/21.html', 'code' => '210000000000'],
        '吉林省' => ['url' => 'http://www.stats.gov.cn/tjsj/tjbz/tjyqhdmhcxhfdm/2015/22.html', 'code' => '220000000000'],
        '黑龙江省' => ['url' => 'http://www.stats.gov.cn/tjsj/tjbz/tjyqhdmhcxhfdm/2015/23.html', 'code' => '230000000000'],
        '上海市' => ['url' => 'http://www.stats.gov.cn/tjsj/tjbz/tjyqhdmhcxhfdm/2015/31.html', 'code' => '310000000000'],
        '江苏省' => ['url' => 'http://www.stats.gov.cn/tjsj/tjbz/tjyqhdmhcxhfdm/2015/32.html', 'code' => '320000000000'],
        '浙江省' => ['url' => 'http://www.stats.gov.cn/tjsj/tjbz/tjyqhdmhcxhfdm/2015/33.html', 'code' => '330000000000'],
        '安徽省' => ['url' => 'http://www.stats.gov.cn/tjsj/tjbz/tjyqhdmhcxhfdm/2015/34.html', 'code' => '340000000000'],
        '福建省' => ['url' => 'http://www.stats.gov.cn/tjsj/tjbz/tjyqhdmhcxhfdm/2015/35.html', 'code' => '350000000000'],
        '江西省' => ['url' => 'http://www.stats.gov.cn/tjsj/tjbz/tjyqhdmhcxhfdm/2015/36.html', 'code' => '360000000000'],
        '山东省' => ['url' => 'http://www.stats.gov.cn/tjsj/tjbz/tjyqhdmhcxhfdm/2015/37.html', 'code' => '370000000000'],
        '河南省' => ['url' => 'http://www.stats.gov.cn/tjsj/tjbz/tjyqhdmhcxhfdm/2015/41.html', 'code' => '410000000000'],
        '湖北省' => ['url' => 'http://www.stats.gov.cn/tjsj/tjbz/tjyqhdmhcxhfdm/2015/42.html', 'code' => '420000000000'],
        '湖南省' => ['url' => 'http://www.stats.gov.cn/tjsj/tjbz/tjyqhdmhcxhfdm/2015/43.html', 'code' => '430000000000'],
        '广东省' => ['url' => 'http://www.stats.gov.cn/tjsj/tjbz/tjyqhdmhcxhfdm/2015/44.html', 'code' => '440000000000'],
        '广西壮族自治区' => ['url' => 'http://www.stats.gov.cn/tjsj/tjbz/tjyqhdmhcxhfdm/2015/45.html', 'code' => '450000000000'],
        '海南省' => ['url' => 'http://www.stats.gov.cn/tjsj/tjbz/tjyqhdmhcxhfdm/2015/46.html', 'code' => '460000000000'],
        '重庆市' => ['url' => 'http://www.stats.gov.cn/tjsj/tjbz/tjyqhdmhcxhfdm/2015/50.html', 'code' => '500000000000'],
        '四川省' => ['url' => 'http://www.stats.gov.cn/tjsj/tjbz/tjyqhdmhcxhfdm/2015/51.html', 'code' => '510000000000'],
        '贵州省' => ['url' => 'http://www.stats.gov.cn/tjsj/tjbz/tjyqhdmhcxhfdm/2015/52.html', 'code' => '520000000000'],
        '云南省' => ['url' => 'http://www.stats.gov.cn/tjsj/tjbz/tjyqhdmhcxhfdm/2015/53.html', 'code' => '530000000000'],
        '西藏自治区' => ['url' => 'http://www.stats.gov.cn/tjsj/tjbz/tjyqhdmhcxhfdm/2015/54.html', 'code' => '540000000000'],
        '陕西省' => ['url' => 'http://www.stats.gov.cn/tjsj/tjbz/tjyqhdmhcxhfdm/2015/61.html', 'code' => '610000000000'],
        '甘肃省' => ['url' => 'http://www.stats.gov.cn/tjsj/tjbz/tjyqhdmhcxhfdm/2015/62.html', 'code' => '620000000000'],
        '青海省' => ['url' => 'http://www.stats.gov.cn/tjsj/tjbz/tjyqhdmhcxhfdm/2015/63.html', 'code' => '630000000000'],
        '宁夏回族自治区' => ['url' => 'http://www.stats.gov.cn/tjsj/tjbz/tjyqhdmhcxhfdm/2015/64.html', 'code' => '640000000000'],
        '新疆维吾尔自治区' => ['url' => 'http://www.stats.gov.cn/tjsj/tjbz/tjyqhdmhcxhfdm/2015/65.html', 'code' => '650000000000']
    ];

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'crawler';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        echo "=====Starting Crawler=====\n";
        foreach ($this->province_list as $key => $value) {
//            if (mb_convert_encoding($key, "GB2312", "utf-8") === $this->argument('name')) {
            Region::create(['code' => $value['code'], 'name' => $key, 'parent_code' => null]);
            $str = "\t" . $value['code'] . "\t" . $value['url'] . "\t" . $key . "\n";
            echo mb_convert_encoding($str, "GBK", "utf-8");
//            echo($str);
            $this->extract($value['code'], $value['url']);
            break;
//            }
        }
        echo "=====Starting Finished=====\n";
    }

    private function extract($parentCode, $url)
    {
        $html = $this->getHtml($url);

        $pos = strripos($url, '/');
        $baseUrl = substr($url, 0, $pos);

        // 将所有特殊标记同步化为crawler
        $html = str_replace('citytr', 'crawler', $html);
        $html = str_replace('countytr', 'crawler', $html);
        $html = str_replace('towntr', 'crawler', $html);
        $html = str_replace('villagetr', 'crawler', $html);

        $isLast = strpos($html, '城乡分类') > 0;

        $result = array();
        $htmlDom = new Htmldom();
        $htmlDom->load($html);
        $list = $htmlDom->find('.crawler');
        Log::debug('data',$list);

        foreach ($list as $element) {
            $data = ['code' => '', 'url' => '', 'name' => ''];
            if (sizeof($element->find('td a')) > 0) {
                $data['code'] = $element->children[0]->children[0]->innertext;
                $data['url'] = $baseUrl . "/" . $element->children[0]->children[0]->href;
                $data['name'] = $isLast ? $element->children[2]->children[0]->innertext : $element->children[1]->children[0]->innertext;

                Region::create(['code' => $data['code'], 'name' => $data['name'], 'parent_code' => $parentCode]);

                $data['children'] = $this->extract($data['code'], $data['url']);
            } else {
                $data['code'] = $element->children[0]->innertext;
                $data['url'] = "";
                $data['name'] = $isLast ? $element->children[2]->innertext : $element->children[1]->innertext;
                Region::create(['code' => $data['code'], 'name' => $data['name'], 'parent_code' => $parentCode]);
            }
            array_push($result, $data);
            echo mb_convert_encoding("\t" . $data['code'] . "\t" . $data['url'] . "\t" . $data['name'] . "\n", "GBK", "utf-8");
        }

        return $html;
    }

    private function getHtml($url)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        $output = curl_exec($ch);
        curl_close($ch);
        return mb_convert_encoding($output, "UTF-8", "GBK");
    }
}