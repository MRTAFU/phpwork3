<?php 
if(
    !isset($_POST["name"]) || $_POST["name"]=='' ||
    !isset($_POST["lid"]) || $_POST["lid"]=='' ||
    !isset($_POST["lpw"]) || $_POST["lpw"]=='' 
){
  exit('ParamError');
};

//POSTデータ取得
$name = $_POST["name"];
$lid = $_POST["lid"];
$lpw = $_POST["lpw"];


//DB接続処理
try {
    $pdo = new PDO('mysql:dbname=gs_db;charset=utf8;host=localhost','root','');
} catch (PDOException $e) {
    exit('DbConnectError:'.$e->getMessage());
};

$stmt = $pdo->prepare("INSERT INTO gs_user_table(id, name, lid, lpw,
 admin_flg, life_flg, rgstdate )VALUES(NULL, :name, :lid, :lpw, 0, 1, sysdate())");
$stmt->bindValue(':name', $name,   PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':lid', $lid,  PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':lpw', $lpw, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$status = $stmt->execute();

//４．データ登録処理後
if($status==false){
  //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
  $error = $stmt->errorInfo();
  exit("QueryError:".$error[2]);
}else{
  //５．index.phpへリダイレクト
  header("Location: index.php");
  exit;
}




 ?>