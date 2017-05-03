<?php
/**
 * Created by PhpStorm.
 * User: darkwindcc
 * Date: 17-4-30
 * Time: 下午3:27
 */
$data_json=file_get_contents('http://restapi.amap.com/v3/place/around?key=6b0a1fb06b6d909c7af4d3571349b6a9&location=104.702081,31.53697&radius=10000&keywords=%E9%A4%90%E9%A5%AE&offset=50&page=5');
$data_array=json_decode($data_json,true);
$food_list_detail=[];
$food_list=[];
foreach ($data_array['pois'] as $item) {
    $food_list_detail[]='店名：'.$item['name'].' 地址：'.$item['address'];
    $food_list[]=$item['name'];
}
file_put_contents('foodList.txt',implode("\r\n",$food_list),FILE_APPEND);
file_put_contents('foodListDetail.txt',implode("\r\n",$food_list_detail),FILE_APPEND);
$a=1;