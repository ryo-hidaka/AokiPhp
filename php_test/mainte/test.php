<?php 
//ファイルの場所
// echo __FILE__;
// /Applications/MAMP/htdocs/php_test/mainte/test.php

//パスワードの暗号化
// echo "<br>";
// echo  (password_hash("password123",PASSWORD_BCRYPT));

//ファイル丸ごと読み込み
$contactFile = ".contact.dat";
$fileContents = file_get_contents($contactFile);
echo "<br>";
echo $fileContents;

// ファイルを上書き
// file_put_contents($contactFile,"testdesu");

//　ファイルに追加
// $addText = "tesutodesu" . "\n";
// file_put_contents($contactFile ,$addText, FILE_APPEND);

// 配列　file、カンマ区切り　explode foreach
// $allData = file($contactFile);

// foreach($allData as $lineData){
//     $lines = explode("," , $lineData);
//     echo $lines[0] . "<br>";
//     echo $lines[1] . "<br>";
//     echo $lines[2] . "<br>";
// }

$contents = fopen($contactFile, "a+");
$addTest = "1行追加" . "\n";
fwrite($contents, $addTest);
fclose($contents);
?>