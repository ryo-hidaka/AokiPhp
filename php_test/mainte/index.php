<?php

require "db_connection.php";

// ユーザ入力なし　sql query
// $sql = "select * from contacts where id = 2";//sql
// $stmt = $pdo->query($sql); //sql実行　stmt＝ステートメント

// $result = $stmt->fetchall();
// echo "<pre>";
// var_dump($result);
// echo "</pre>";

// ユーザ入力あり　sql prepare bind execute 悪意のあるユーザ delete * SQLインジェクション

$sql = "select * from contacts where id = :id"; //名前つきプレイスホルダ
$stmt = $pdo->prepare($sql); //プリペアード捨てトメント

$stmt->bindValue("id", 3,PDO::PARAM_INT); //紐付け
$stmt->execute(); //実行

$result = $stmt->fetchall();
echo "<pre>";
var_dump($result);
echo "</pre>";

// トランザクション begunTransactuin commit rollback
// 銀行の話　AさんがBさんに振り込むとき、Aさんの振り込むときにDBが落ちてるなど

$pdo->beginTransaction();
try{
    $pdo->commit();
}catch(PDOException $e){
    $pdo->rollback(); //更新のキャンセル
}


?>