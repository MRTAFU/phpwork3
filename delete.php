<?php 
require "functions.php";

//1.POSTでParamを取得
$id = $_GET["id"];

//2.DB接続など
$pdo = db_con();




$sql = 'DELETE FROM gs_user_table WHERE id=:id';
$stmt = $pdo->prepare($sql);
$stmt-> bindValue(':id', $id, PDO::PARAM_INT);
$status = $stmt->execute();

if($status==false){
    $error = $stmt->errorInfo();
    exit("ErrorQuery:".$error[2]);
}else{
    header("Location: adminSelect.php");
    exit;
}

 ?>