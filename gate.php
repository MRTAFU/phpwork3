<?php 
if(
    !isset($_POST["lid"]) || $_POST["lid"]=='' ||
    !isset($_POST["lpw"]) || $_POST["lpw"]==''
){
  exit('ParamError');
};


$lid = $_POST["lid"];
$lpw = $_POST["lpw"];
$admin_flg = $_POST["admin_flg"];


//DB接続処理
try {
    $pdo = new PDO('mysql:dbname=gs_db;charset=utf8;host=localhost','root','');
} catch (PDOException $e) {
    exit('DbConnectError:'.$e->getMessage());
};

$sql = "SELECT id, lpw, admin_flg FROM gs_user_table WHERE lid=:lid";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':lid', $lid,  PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$status = $stmt->execute();
// var_dump($stmt);


//４．データ登録処理後
if($status==false){
  //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
    $error = $stmt->errorInfo();
    exit("QueryError:".$error[2]);
}else{
    $row = $stmt->fetch();
    // var_dump($row);
    // echo $row["lpw"];
    if($row["lpw"]==$lpw){
        if($row["admin_flg"]==$admin_flg){
            if($admin_flg==0){
                header('Location: main.php?id='.$row["id"]);
            }else if($admin_flg==1){
                header('Location: adminmain.php?id='.$row["id"]);
            }else{
                exit('admin_flg error');
            };
        }else{
            exit('administration error');
        };
    }else{
        exit('password incorrect');
    };
    exit;
};


 ?>