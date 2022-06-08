<?php

//　DB接続
function insertContact($request){
require "db_connection.php";

//　入力・DB保存 sql prepare bind execute(配列(全て文字列))
$params = [
    'id' => null,
    'your_name' => $request["your_name"],
    'email' => $request["email"],
    'url' => $request["url"],
    'gender' => $request["gender"],
    'age' => $request["age"],
    'contact' => $request["contact"],
    'created_at' => null
  ];

//   $params = [
//     'id' => null,
//     'your_name' => 'なまえ123',
//     'email' => 'test@test.com',
//     'url' => 'http://test.com',
//     'gender' => '1',
//     'age' => '2',
//     'contact' => 'いいい',
//     'created_at' => null
//   ];

$count =0;
$columns = "";
$values = '';

foreach(array_keys($params) as $key){
    if($count++>0){
        $columns .= ",";
        $values .= ",";
    }
    $columns .= $key;
    $values .= ":".$key;
};

$sql = "insert into contacts (".$columns.")values(".$values.")"; //名前つきプレイスホルダ

// var_dump($sql);
// exit();

$stmt = $pdo->prepare($sql); //プリペアード捨てトメント
$stmt->execute($params); //実行

$result = $stmt->fetchall();
echo "<pre>";
var_dump($result);
echo "</pre>";
}
?>