<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller{ 
    public function index(){
    	//$redis = \Think\Cache::getInstance('Redis');
    	//$data = $redis->get('photos');
    	//快速缓存方法
    	//$data = S('photos');
    	if(!$data){
    		$photo = M('think_photo'); 
            $data = $photo->select();
            //$redis->set('photos',$data,5); 
            //S('photos',$data,5);
    	}
        dump($data);
        $this->display();
        $dealDataLogic = D("Home/DealData",'Logic');
        $dealDataLogic->getInfo();
    }
    /*
    *插入数据
    *
    */
    public function insertData(){
    	$appScanTable = M("app_scan_data");
    	$data = array();
    	$data['registration_id']= '12345678';
    	$data['idcode'] = '352571071929990';
        $data['type'] = 1;
        $district_id = array(1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18);
        $cid = 0;
        $area = array(1,2,3,4,5,6);
        $kind = array(1,2,3,4,5,6);
        $room = array(1,2,3,4,5,6);
        $price = array(1,2,3,4,5,6);
        $data['posttime'] = time();
        $numbers = range (1,1000); 
        //shuffle 将数组顺序随即打乱 
        shuffle ($numbers); 
        //array_slice 取该数组中的某一段 
        $post_id = array_slice($numbers,0,100); 
        foreach($post_id as $val){
            $data['post_id'] = $val;
            $data['district_id'] = array_rand($district_id);
            $data['area'] = array_rand($area);
            $data['kind'] = array_rand($kind);
            $data['room'] = array_rand($room);
            $data['price'] = array_rand($price);
            $appScanTable->add($data);
            dump($appScanTable->getLastSql());
        }
    }
    /*
    *根据浏览表得出用户的喜好表
    *
    */
    public function getUserFav(){
    	$appScanTable = M("app_scan_data");
    	$appUserFav = M("app_user_fav");
    	$time = strtotime("-1 month");
    	$scanUser = M()->query("SELECT registration_id FROM app_scan_data WHERE posttime > $time GROUP BY registration_id");//将满足条件的用户筛选出来
    	foreach ($scanUser  as $key => $val) {
    		//以地区为首选
    		$regId = $val['registration_id'];
    		$districtIdData = M()->query("SELECT district_id FROM app_scan_data WHERE registration_id =$regId AND posttime > $time GROUP BY district_id ORDER BY count(district_id) DESC LIMIT 1");
    		$districtId = $districtIdData[0]['district_id'];
            //然后以价格
    		$priceData = M()->query("SELECT price FROM app_scan_data WHERE registration_id =$regId AND district_id = $districtId AND posttime > $time GROUP BY price ORDER BY count(price) DESC LIMIT 1");
    		dump(M()->getLastSql());
    		$price = $priceData[0]['price'];
    		//然后room
    		$roomData = M()->query("SELECT room FROM app_scan_data WHERE registration_id =$regId AND district_id = $districtId AND price = $price AND posttime > $time GROUP BY room ORDER BY count(room) DESC LIMIT 1"); 
    		$room = $roomData[0]['room'];
    		
    		dump($regId."--".$districtId."--".$price."--".$room);
    	}
    }

    /****************************************************************
    curl(array('url?get=data','url'),array('','post_data'));
     *****************************************************************/
    public function curl($urls,$post) {
        $queue = curl_multi_init();
        $map = array();
        foreach ($urls as $key => $url) {
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_TIMEOUT, 30);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $post[$key]);
            curl_setopt($ch, CURLOPT_HEADER, 0);
            curl_setopt($ch, CURLOPT_NOSIGNAL, true);
            curl_multi_add_handle($queue, $ch);
            $map[(string) $ch] = $url;
        }
        $responses = array();
        do {
            while (($code = curl_multi_exec($queue, $active)) == CURLM_CALL_MULTI_PERFORM) ;
            if ($code != CURLM_OK) { break; }
            while ($done = curl_multi_info_read($queue)) {
                $error = curl_error($done['handle']);
                $results = curl_multi_getcontent($done['handle']);
                $this->analysticData($results);
                $responses[$map[(string) $done['handle']]] = compact('error', 'results');
                curl_multi_remove_handle($queue, $done['handle']);
                curl_close($done['handle']);
            }
            if ($active > 0) {
                curl_multi_select($queue, 0.5);
            }
        } while ($active);
        curl_multi_close($queue);
        return $responses;
    }

    public function getCentaData(){
        $urls = array("http://txhist.centadata.com/tfs_centadata/Pih2Sln/TransactionHistory.aspx?type=1&code=SDPPWKPXPS");
        $this->curl($urls);
    }
    /**
     * 压缩html : 清除换行符,清除制表符,去掉注释标记
     * @param $string
     * @return  压缩后的$string
     * */
    public function compress_html($string) {
        $string = str_replace("\r\n", '', $string); //清除换行符
        $string = str_replace("\n", '', $string); //清除换行符
        $string = str_replace("\t", '', $string); //清除制表符
        $pattern = array (
            "/> *([^ ]*) *</", //去掉注释标记
            "/[\s]+/",
            "/<!--[^!]*-->/",
            "/\" /",
            "/ \"/",
            "'/\*[^*]*\*/'"
        );
        $replace = array (
            ">\\1<",
            " ",
            "",
            "\"",
            "\"",
            ""
        );
        return preg_replace($pattern, $replace, $string);
    }

    public function analysticData($data){
        $subject = $this->compress_html($data);
        preg_match_all('%<b> FLAT (.+?)</b>%', $subject, $flatArr, PREG_PATTERN_ORDER);//格局正则
        $flat = $flatArr[0];
        preg_match_all('%<table class="unitTran-sub-table"(.+?)<\/table>%', $subject, $flatTableArr, PREG_PATTERN_ORDER);//格局正则
        $flatTable = $flatTableArr[0];
        $pattern = '/<table id="tblFloor"(.+?)<div id="unitTran-right">/is';//楼层正则
        preg_match($pattern, $subject, $match);
        $pattern = '/<b>(.+?)<\/b>/is';
        preg_match_all($pattern, $match[0], $floorArr);
        $floors = array_unique($floorArr[0]);
        $result = array();
        $i = 0;
        foreach($floors as $key=>$val){
            $i++;
            $floor = str_replace(' ','',strip_tags($val));
            foreach($flat as $k=>$v){
                preg_match_all('/<tr(.+?)<\/tr>/is', $flatTable[$k], $unitArr, PREG_PATTERN_ORDER);
                preg_match_all('/<td(.+?)<\/td>/is', $unitArr[0][$i], $unit, PREG_PATTERN_ORDER);
                $result[] = array('floor'=>strip_tags($val),'flat'=>$v,'use_area'=>$unit[0][0],'build_area'=>$unit[0][1]);
            }
        }
        var_dump($result);
    }
}
?>