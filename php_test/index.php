

<?php
//変数
// $_test=aaa;
// $test=234;

//型がわかる
// var_dump($test);

// echo $test;

// 銭湯は英文字か_ 数字はだめ

//変数２くっつけると文字として扱われる
// $test1=aaa;
// $test2=bbb;
// $test3=$test1.$test2;
// echo $test3;

//定数
// const MAX= "11aa";
// const MAX="aaaaa";
// echo MAX;

//配列　0スタート
// $array=[1,"aaaa",3];
// echo $array[1];

// echo "<pre>";
// var_dump($array);
// echo "<pre>";



//配列　複数行
// $array2=[["赤","青","黄"],["紫","紫","黒"]];
// echo $array2[0][1];

// echo "<pre>";
// var_dump($array2);
// echo "<pre>";


//　連想配列 mapのこと ;ないとちゃんと動かない　エラーは出ない
// $array_menber=[
//     "name"=> "honda",
//     "height"=> 170,
//     "hobby"=>"soccer"
// ];

// echo $array_menber["name"];

// echo "<pre>";
// var_dump($array_menber);
// echo "<pre>";

// $array_menber2=[
//     "honnda"=> [
//         "height"=>170,
//         "hobby"=>"scorrer"
//     ],
//     "kagawa"=>[
//         "height"=>165,
//         "hobby"=>"scorrer"
//     ]
// ];

// echo $array_menber2["honnda"]["height"];

// echo "<pre>";
// var_dump($array_menber2);
// echo "<pre>";

// $array_menber3=[
//     "1kumi"=>[
//         "honnda"=> [
//         "height"=>170,
//         "hobby"=>"scorrer"
//     ],
//     "kagawa"=>[
//         "height"=>165,
//         "hobby"=>"scorrer"
//     ]],
    
//     "2kumi"=>[
//      "honnda"=> [
//         "height"=>170,
//         "hobby"=>"scorrer"
//     ],
//     "kagawa"=>[
//         "height"=>165,
//         "hobby"=>"scorrer"
//     ]]

// ];

// echo $array_menber3["1kumi"]["kagawa"]["height"];

// echo "<pre>";
// var_dump($array_menber3);
// echo "<pre>";

//演算子
// $test1=7;
// $test2=3;

// $test3 = $test1 % $test2;

// echo $test3;

// $height=80;
// if ($height >=91) {
//     echo "身長は".$height."cmです";
// } 

// if($height !== 90) {
//     echo "身長は".$height."cmではありません";
// }

// == :一致
// ===　：型も一致
// $signal = "blue";

// if($signal === "red"){
//     echo "止まる";
// } else if ($signal === "yellow"){
//     echo "一旦停止";
// } else {
//     echo "すすむ";
// }
// echo "<br>";

// $speed = 80;
// if($speed >= 80){
//     echo "スピード違反";
// }
// $test = "";

// if(!empty($test) ){
//     echo "からではありません";
// } else {
//     echo "変数はから";
// }

// and or

// $signal_1 = "red";
// $signal_2 =  "blue";

// if ($signal_1 === "red" || $signal_2 === "blue"){
//     echo "sinngou";
// }

// 三項演算子

// $math = 80;

// $commnet = $math > 80 ? "good" : "bad";
// echo $commnet


// $menbers = [
//     "name" => "honnda",
//     "height" => 170,
//     "hobby" =>"scorrer"
// ];

// foreach($menbers as $menber){
// echo $menber;
// }

// キーとバリュー表示
// foreach($menbers as $key => $value){
//     echo $key ."は、".$value ."です。";
//     }
//  echo "<br>";

// $menbers_2 = [
//     "honda" =>[
//         "height" => 170,
//         "hobby" =>"scorrer"
//     ],
//     "kagawa" =>[
//         "height" => 175,
//         "hobby" =>"scorrer"
//     ],
//     ];

// foreach($menbers_2 as $menbers_1){
//     foreach($menbers_1 as $key => $value){

//             echo $key ."は、".$value ."です。";
//          }
//    }


// for($i = 0; $i < 10; $i++ ){
//     if($i === 5){
//         continue;
//     }
//     echo $i;
// }

// $j = 0;
// while($j < 5){
//     echo $j;
//     $j++;
// }

// do {echo $j;}
// while($j < 5)

//switchよりifの方が良い
//caseは==を実行している
// $data = 1;
// switch($data){
//     case $data === 1:
//         echo"1";
//         break;
//     case 2:
//         echo"2";
//         break;
//     case 3:
//         echo"3";
//         break;
//     default:

//         echo "default";
// }


// if($data === 1){
//     echo"1";

// }
// if($data === 2){
//     echo"2";

// }
// if($data === 3){
//     echo"3";

// }


// function test(){
//     echo "test";
// }
// test();

// $commnet3 = "coment3";

// function getCommnet($string){
//     echo $commnet3;
// }
// getCommnet($commnet3);


// function getNumberOfCommnet(){
//     return 5;
// }

// $commnetNumber = getNumberOfCommnet();
// echo $commnetNumber;

// function sumPrice($int1,$int2){
//     $int3 = $int1 + $int2;
//     return $int3;
// }

// $total = sumPrice(1,4);
// echo $total;

// 日本語　SJIS UTF-8 3b~6バイト
// $test = "アイウエオ";

// echo strlen($test);
// echo mb_strlen($test);

// $str = "文字列を置換します";
// echo str_replace("置換","ちかん",$str);

// $str_2 = "指定文字列で、分割します";

// echo "<pre>";
// var_dump(
//     explode("、", $str_2)
// );
// echo "<pre>";


// $str_3 = "指定文字列が含まれているか確認します";
// echo preg_match("/文字列/",$str_3);

// echo substr("あいう", 2);

// echo mb_substr("あいうえお",2);


// $array = ["りんご","みかん "];
// array_push($array, "budou", "naso");

// echo "<br>";

// var_dump($array);

// $postalCode = "123-456777";

// function checkPostalCode($str){
//     $replaceced = str_replace("-","",$str);
//     $length = strlen($replaceced); 

//     var_dump($length);

//     if ($length === 7){
//         return true;
//     }
//     return false;
// };

// var_dump(checkPostalCode($postalCode));


// $globalVariable = "グローバルな変数です";
// function checkScople($str){
//     $localVariable = "ローカルな変数です";
//     // global $globalVariable;
//     echo $str;
// }

// echo $globalVariable;
// echo $localVariable;
// checkScople($globalVariable);

// require __DIR__ . "/common/common.php";
// echo $commonVariable;
// commonTest();

// echo __FILE__ ;

?>