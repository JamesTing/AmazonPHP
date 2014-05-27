<?php
require_once './vendor/autoload.php';
require_once './config.php';
use ApaiIO\Request\RequestFactory;
use ApaiIO\Configuration\GenericConfiguration;
use ApaiIO\ResponseTransformer\ResponseTransformerInterface;
use ApaiIO\Operations\Search;
use ApaiIO\ResponseTransformer\ObjectToArray;
use ApaiIO\Operations\Lookup;
use ApaiIO\Operations\SimilarityLookup;
use ApaiIO\Operations\CartCreate;
use ApaiIO\ApaiIO;
use ApaiIO\Operations\BrowseNodeLookup;
use ApaiIO\Operations\CartAdd;

class IndexAction extends Action {
    public $nopic = '/static/image/none.gif'; 
    public $replace = array(" ","&","/","'",",",".",'"','_');
    public $noprice = '$ secret';
    public function BeginWord(){
        $array = array('Looking for','Find your','Browse all','Discover','Online shop for');
        shuffle($array);
        return $array[0];
    }
    public function EndWord(){
        $array = array('discount','reduction in price','on sale','sales promotion','with low prices','at wholesale prices');
        shuffle($array);
        return $array[0];
    }
    public function menu(){
        foreach (explode(",",MainKeyword) as $value) {
            $navgation[] = array('name' =>$value ,'url' =>str_replace($this->replace, "-", $value));
        }
        return $navgation;
    }
    public function letter(){
        return range('a', 'z');
    } 
    //友情链接
    public function link(){
        foreach (explode(";",Link) as $value) {
            $link[] = explode(",",$value);
        }
        return $link;
    }
    //随机关键词
    public function keyword(){
        $array = M(KeywordSQL)->query("SELECT * FROM __TABLE__ ORDER BY RANDOM() LIMIT 20");
        foreach ($array as $value) {
            $keyword[] = array(
                'url' => str_replace($this->replace, "-", $value['word']),
                'name' => $value['word'],
                );
        }
        return $keyword;
    }
    public function conf(){
        $conf = new GenericConfiguration();
        $conf->setCountry('com')
            ->setAccessKey(AWS_API_KEY)->setSecretKey(AWS_API_SECRET_KEY)->setAssociateTag(AWS_ASSOCIATE_TAG)
            ->setResponseTransformer('\ApaiIO\ResponseTransformer\XmlToSimpleXmlObject');
        return $conf;
    } 
    //清空某个文件夹
    function qkdir($path,$rmdir=false){
        if(!is_dir($path)){
            return false;
        }
        if($handle=opendir($path)){
            while(false!==($item=readdir($handle))){
                if($item=="." || $item==".."){
                    continue;
                }
                $item=rtrim($path,"/")."/".$item;
                if(is_dir($item)){
                    $this->qkdir($item);
                    @rmdir($item);
                }
                @unlink($item);
            }
        }
        if($rmdir){
            @rmdir($path);
        }
        return TRUE;
    }

    public function index(){
        $array = array_slice(explode(",",MainKeyword),0,4);
        foreach ($array as $arr) {
            $apaiIO = new ApaiIO($this->conf());
            $search = new Search();
            $search
                ->setCategory(SearchIndex)->setKeywords($arr)
                ->setPage(1)->setResponseGroup(array('Medium'));
            $pxml = $apaiIO->runOperation($search);
            //重置数组
            $products = array();
            foreach ($pxml->Items->Item as $result) {
                if (isset($result->ASIN)) {
                    $products[]  = array(
                        'asin' => $result->ASIN, 
                        'link' => $result->DetailPageURL,
                        'src'  => isset($result->MediumImage->URL)?$result->MediumImage->URL:$this->nopic,
                        'price'=> isset($result->ItemAttributes->ListPrice)?$result->ItemAttributes->ListPrice->FormattedPrice:$this->noprice,
                        'brand'=> $result->ItemAttributes->Brand,
                        'title'=> $result->ItemAttributes->Title,
                        'url'=> str_replace($this->replace, "-", $result->ItemAttributes->Title)
                        );
                }
            }
            $MainProduct[] = array('keyword'=>$arr,'list'=>$products);
        }

        //部署变量,渲染视图
        $array['keyword'] = $this->keyword();
        $array['letter']= $this->letter(); 
        $array['menu'] = $this->menu();
        $array['MainProduct'] = $MainProduct;
        $array['link'] = $this->link();
        $array['SiteName'] = SiteName;
        $array['SiteDescription'] = SiteDescription;
        $array['ListUrl'] = ListUrl;
        $array['DetailUrl'] = DetailUrl;
        $array['LetterUrl'] = LetterUrl;
        $array['AWS_ASSOCIATE_TAG'] = AWS_ASSOCIATE_TAG;
        $array['TrafficCode'] = TrafficCode;
        $this->assign($array);
        $this->display();
    }

    function category($para){
        $apaiIO = new ApaiIO($this->conf());
        $search = new Search();
        $search
            ->setCategory(SearchIndex)
            ->setKeywords($para)->setResponseGroup(array('Medium'));
        $pxml = $apaiIO->runOperation($search);
        foreach ($pxml->Items->Item as $result) {
            if (isset($result->ASIN)) {
                $products[]  = array(
                    'asin' => $result->ASIN, 
                    'link' => $result->DetailPageURL,
                    'src'  => isset($result->MediumImage->URL)?$result->MediumImage->URL:$this->nopic,
                    'price'=> isset($result->ItemAttributes->ListPrice)?$result->ItemAttributes->ListPrice->FormattedPrice:$this->noprice,
                    'brand'=> $result->ItemAttributes->Brand,
                    'title'=> $result->ItemAttributes->Title,
                    'url'=> str_replace($this->replace, "-", $result->ItemAttributes->Title)
                    );
            }
        }
        //继续查询第二页
        if ($pxml->Items->TotalPages>=2) {
            $search = new Search();
            $search
                ->setCategory(SearchIndex)
                ->setKeywords($para)->setPage(2)->setResponseGroup(array('Medium'));
            $pxml = $apaiIO->runOperation($search);
            foreach ($pxml->Items->Item as $result) {
                if (isset($result->ASIN)) {
                    $products[]  = array(
                        'asin' => $result->ASIN, 
                        'link' => $result->DetailPageURL,
                        'src'  => isset($result->MediumImage->URL)?$result->MediumImage->URL:$this->nopic,
                        'price'=> isset($result->ItemAttributes->ListPrice)?$result->ItemAttributes->ListPrice->FormattedPrice:$this->noprice,
                        'brand'=> $result->ItemAttributes->Brand,
                        'title'=> $result->ItemAttributes->Title,
                        'url'=> str_replace($this->replace, "-", $result->ItemAttributes->Title)
                        );
                }
            }
        } 

        //查询相关词语        
        $para = str_replace("-", " ", $para);
        $parameter = "'".$para."'";
        $result = M(KeywordSQL)->query(
                    "select word from __TABLE__ WHERE word MATCH $parameter LIMIT 1,8");
        if (empty($result)) {
            $result = M(KeywordSQL)->query("SELECT * FROM __TABLE__ ORDER BY RANDOM() LIMIT 8");
        } 
        $RelativeBind = "";
        foreach ($result as $value) {
            $relative[] = array(
                'name' =>$value['word'],
                'url' =>str_replace($this->replace, "-", $value['word'])
                );
            $RelativeBind .= $value['word'].', ';
        }
        //部署变量,渲染视图
        $array['keyword'] = $this->keyword();
        $array['category'] = ucwords($para);
        $array['products'] = $products;
        $array['letter'] = $this->letter();
        $array['menu'] = $this->menu();
        $array['relative'] = $relative;
        $array['RelativeBind'] = $RelativeBind;
        $array['BeginWord'] = $this->BeginWord();
        $array['EndWord'] = $this->EndWord();
        $array['CoreProduct'] = CoreProduct;
        $array['SiteName'] = SiteName;
        $array['ListUrl'] = ListUrl;
        $array['DetailUrl'] = DetailUrl;
        $array['LetterUrl'] = LetterUrl;
        $array['CategoryAd'] = CategoryAd;
        $array['AWS_ASSOCIATE_TAG'] = AWS_ASSOCIATE_TAG;
        $array['TrafficCode'] = TrafficCode;
        $this->assign($array);
        $this->display();
    }

    function detail($asin,$title){
        $apaiIO = new ApaiIO($this->conf());
        $lookup = new Lookup();
        $lookup->setItemId($asin)->setResponseGroup(array('Large'));
        $pxml = $apaiIO->runOperation($lookup);
        $pxml->registerXPathNamespace('ns','http://webservices.amazon.com/AWSECommerceService/2011-08-01');

        if (isset($pxml->Items->Item)) {
            $result = $pxml->Items->Item;
            $product = array(
                'asin' => $result->ASIN, 
                'rel'  => $result->DetailPageURL,
                'src'  => isset($result->LargeImage->URL)?$result->LargeImage->URL:$this->nopic,
                'price'=> isset($result->ItemAttributes->ListPrice)?$result->ItemAttributes->ListPrice->FormattedPrice:$this->noprice,
                'brand'=> $result->ItemAttributes->Brand,
                'binding' => $result->ItemAttributes->Binding,
                'department' => $result->ItemAttributes->Department,
                'title'=> $result->ItemAttributes->Title,
                'url'=> str_replace($this->replace, "-", $result->ItemAttributes->Title),
                'feature'=> $pxml->xpath('//ns:Feature'),
                'editorreview' => $pxml->xpath('//ns:Content')
            );
            $search = new Search();
            $search
                ->setCategory(SearchIndex)
                ->setKeywords($pxml->Items->Item->ItemAttributes->Brand)->setResponseGroup(array('Medium'));
            $xml = $apaiIO->runOperation($search);
            foreach ($xml->Items->Item as $result) {
                if (isset($result->ASIN)) {
                    $relative[]  = array(
                        'asin' => $result->ASIN, 
                        'link' => $result->DetailPageURL,
                        'src'  => isset($result->MediumImage->URL)?$result->MediumImage->URL:$this->nopic,
                        'price'=> isset($result->ItemAttributes->ListPrice)?$result->ItemAttributes->ListPrice->FormattedPrice:$this->noprice,
                        'brand'=> $result->ItemAttributes->Brand,
                        'title'=> $result->ItemAttributes->Title,
                        'url'=> str_replace($this->replace, "-", $result->ItemAttributes->Title)
                        );
                }
            }
            //部署变量,渲染视图
            $array['keyword'] = $this->keyword();
            $array['product'] = $product;
            $array['relative'] = $relative;
            $array['letter'] = $this->letter();
            $array['menu'] = $this->menu();
            $array['description'] = substr(strip_tags(implode('',$product['editorreview'])),0,250).'...';
            $array['SearchIndex'] = SearchIndex;
            $array['SiteName'] = SiteName;
            $array['ListUrl'] = ListUrl;
            $array['DetailUrl'] = DetailUrl;
            $array['LetterUrl'] = LetterUrl;
            $array['DetailAd'] = DetailAd;
            $array['AWS_ASSOCIATE_TAG'] = AWS_ASSOCIATE_TAG;
            $array['CoreProduct'] = CoreProduct;
            $array['TrafficCode'] = TrafficCode;
            $this->assign($array);
            $this->display();
        } else {
            echo "<p>No products suggestions found</p>";
        }
    }

    function letterIndex($para){
        $array = M(KeywordSQL)->query("select word from __TABLE__ where word like '$para%'");
        foreach ($array as $value) {
            $thisletter[] = array(
                'url' => str_replace($this->replace, "-", $value['word']),
                'name'     => $value['word'],
                );
        }
        //部署变量,渲染视图
        $array['title'] = $para;
        $array['keyword'] = $this->keyword();
        $array['letter'] = $this->letter();
        $array['thisletter'] = $thisletter;
        $array['menu'] = $this->menu();
        $array['SiteName'] = SiteName;
        $array['ListUrl'] = ListUrl;
        $array['DetailUrl'] = DetailUrl;
        $array['LetterUrl'] = LetterUrl;
        $array['AWS_ASSOCIATE_TAG'] = AWS_ASSOCIATE_TAG;
        $array['TrafficCode'] = TrafficCode;
        $this->assign($array);
        $this->display();
    }

    function update(){
        $path = __ROOT__.'hub.txt';
        $file = fopen($path,"r");
        while (!feof($file)){ 
            //读取单行
            $line = fgets($file);
            //去掉结尾换行符
            $order = array("\r\n", "\n", "\r");
            $text = str_replace($order,'', $line);
            //查询是否存在
            $condition['word'] = $text;
            $result = M(KeywordSQL)->where($condition)->select();
            //如果不存在则插入数据库
            if (!$result) {
                $data = array(
                    'word' => $text,
                );
                M(KeywordSQL)->add($data);
            }
        }
        fclose($file);
        echo "<h1>:-)</h1><h3>关键词导入完毕</h3>";
    }
    function clearDataBase(){
        M(KeywordSQL)->query("DELETE FROM __TABLE__");
        echo "<h1>:-)</h1><h3>数据表已清空</h3>";        
    }

    function clearFileCache(){
        if ($this->qkdir(realpath(__ROOT__).'/app/Html',false)) {
            echo "<h1>:-)</h1><h3>文件缓存已清空</h3>";
        }else{
            echo "<h1>:-(</h1><h3>缓存清除失败</h3>";
        }   
    }
}