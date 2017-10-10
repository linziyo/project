<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Yangqi\Htmldom\Htmldom;
use App\Models\Food;
use App\Models\FoodCategory;
use App\Models\FoodMeasureUnit;
use App\Models\FoodNutritionInformation;
use Pinyin;

class Boohee extends Command
{
    private $host = 'http://www.boohee.com';

    private $foot_list = [
        ['url'=>'http://www.boohee.com/food/group/1','name'=>'谷薯芋、杂豆、主食'],
        ['url'=>'http://www.boohee.com/food/group/2','name'=>'蛋类、肉类及制品'],
        ['url'=>'http://www.boohee.com/food/group/3','name'=>'奶类及制品'],
        ['url'=>'http://www.boohee.com/food/group/4','name'=>'蔬果和菌藻'],
        ['url'=>'http://www.boohee.com/food/group/5','name'=>'坚果、大豆及制品'],
        ['url'=>'http://www.boohee.com/food/group/6','name'=>'饮料'],
        ['url'=>'http://www.boohee.com/food/group/7','name'=>'食用油、油脂及制品'],
        ['url'=>'http://www.boohee.com/food/group/8','name'=>'调味品'],
        ['url'=>'http://www.boohee.com/food/group/9','name'=>'零食、点心、冷饮'],
        ['url'=>'http://www.boohee.com/food/group/10','name'=>'其它'],
        ['url'=>'http://www.boohee.com/food/view_menu','name'=>'菜肴']
    ];

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'boohee';

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

        foreach ($this->foot_list as $key => $value) {
            $str = "\t" . $value['name'] . "\t" . $value['url'] . "\n";
            echo mb_convert_encoding($str, "GBK", "utf-8");
            $category = FoodCategory::create(['name'=>$value['name']]);
            for($i=1;$i<=10;$i++){
                $this->extract($value['url']."?page={$i}",$category->id);
            }
        }

        echo "=====Starting Finished=====\n";
    }

    private function extract($url,$category_id)
    {
        $html = $this->getHtml($url);
        $html = str_replace('text-box pull-left','foot',$html);

        $htmlDom = new Htmldom();
        $htmlDom->load($html);
        $list = $htmlDom->find('.foot');

        if(!empty($list)){
            foreach($list as $element) {
                $url = $element->children[0]->children[0]->href;
                $name = $element->children[0]->children[0]->title;
                $detailUrl = $this->host.$url;

                $food_id = $this->getFood($detailUrl, $name, $category_id);
                $this->getInformation($detailUrl, $food_id);
                $this->getMeasureUnit($detailUrl, $food_id);
            }
        }
    }

    //获取食物列表
    private function getFood($url, $name, $category_id)
    {
        $html = $this->getHtml($url);
        $html = str_replace('widget-food-detail pull-left','foot-detail',$html);

        $htmlDom = new Htmldom();
        $htmlDom->load($html);
        $list = $htmlDom->find('.foot-detail');

        if(!empty($list)){
            $evaluate = $list[0]->children[1]->children[1]->innertext;
            $evaluate = preg_replace("@<b(.*?)</b>@is",'',$evaluate );
            $evaluate = str_replace(' ','',$evaluate );
            $chinese_name = Pinyin::abbr($name);
            $food = Food::create(['name'=>$name,'chinese_name'=>$chinese_name,'evaluate'=>$evaluate, 'category_id'=>$category_id]);
            return $food->id;
        }
    }

    //获取营养信息
    private function getInformation($url, $food_id)
    {
        $html = $this->getHtml($url);
        $html = str_replace('nutr-tag margin10','foot',$html);

        $htmlDom = new Htmldom();
        $htmlDom->load($html);
        $list = $htmlDom->find('.foot');

        if(!empty($list)){
            foreach($list as $element) {
                $count1 = count($element->find('dl'));
                $count2 = count($element->find('dd'));

                for ($i = 1; $i < $count1; $i++) {
                    if($i < 4) {
                        $data['name'] = $element->children[1]->children[$i]->children[0]->children[0]->innertext;
                        if ($i == 1) {
                            $data['content'] = $element->children[1]->children[$i]->children[0]->children[1]->children[0]->innertext;
                        } else {
                            $data['content'] = $element->children[1]->children[$i]->children[0]->children[1]->innertext;
                        }
                        FoodNutritionInformation::create(['name'=>$data['name'],'value'=>$data['content'],'food_id'=>$food_id]);

                        if (2 * ($i+1) <= $count2) {
                            $data['name'] = $element->children[1]->children[$i]->children[1]->children[0]->innertext;
                            $data['content'] = $element->children[1]->children[$i]->children[1]->children[1]->innertext;
                            FoodNutritionInformation::create(['name'=>$data['name'],'value'=>$data['content'],'food_id'=>$food_id]);
                        }
                    } else {
                        $data['name'] = $element->children[1]->children[4]->children[$i-4]->children[0]->children[0]->innertext;
                        $data['content'] = $element->children[1]->children[4]->children[$i-4]->children[0]->children[1]->innertext;
                        FoodNutritionInformation::create(['name'=>$data['name'],'value'=>$data['content'],'food_id'=>$food_id]);

                        if (2 * ($i+1) < $count2) {
                            $data['name'] = $element->children[1]->children[4]->children[$i-4]->children[1]->children[0]->innertext;
                            $data['content'] = $element->children[1]->children[4]->children[$i-4]->children[1]->children[1]->innertext;
                            FoodNutritionInformation::create(['name'=>$data['name'],'value'=>$data['content'],'food_id'=>$food_id]);
                        }
                    }
                }
            }
        }
    }

    //获取度量单位
    private function getMeasureUnit($url, $food_id)
    {
        $html = $this->getHtml($url);
        $html = str_replace('widget-unit','foot',$html);

        $htmlDom = new Htmldom();
        $htmlDom->load($html);
        $list = $htmlDom->find('.foot');
        if(!empty($list)){
            $count = count($list[0]->find('tr'));
            if($count > 0){
                for($i = 0; $i < $count-1; $i++) {
                    $element = $list[0]->children[1]->children[0]->children[1]->children[$i];
                    if(count($element->find('td a')) > 0 || count($element->find('td span')) > 0){
                        $name  = $element->children[0]->children[0]->innertext;
                        $value = $element->children[1]->children[0]->innertext;
                        FoodMeasureUnit::create(['name'=>$name, 'value'=>$value, 'food_id'=>$food_id]);
                    }else{
                        $name  = $element->children[0]->innertext;
                        $value = $element->children[1]->innertext;
                        FoodMeasureUnit::create(['name'=>$name, 'value'=>$value, 'food_id'=>$food_id]);
                    }
                }
            }
        }
    }

    private function getHtml($url)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        $output = curl_exec($ch);
        curl_close($ch);
        return $output;
    }
}