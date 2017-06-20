<?php
require "functions.php";

//1.POSTでParamを取得
$id = $_POST["id"];
$name = $_POST["name"];
$lid = $_POST["lid"];
$lpw = $_POST["lpw"];
$life_flg = $_POST["life_flg"];

//2.DB接続など
$pdo = db_con();




$sql = 'UPDATE gs_user_table SET name=:name, lid=:lid, lpw=:lpw WHERE id=:id';
$update = $pdo->prepare($sql);
$update-> bindValue(':name', $name, PDO::PARAM_STR);
$update-> bindValue(':lid',  $lid,  PDO::PARAM_STR);
$update-> bindValue(':lpw',  $lpw,  PDO::PARAM_STR);
$update-> bindValue(':id',   $id,   PDO::PARAM_INT);
$status = $update->execute();




if($status==false){
    $error = $stmt->errorInfo();
    exit("ErrorQuery:".$error[2]);
}else{
        header("Location: adminSelect.php");
}

?>
