<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/reset.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
</head>
<body>
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script> 
<title>index</title>

<header>
  <nav class="navbar navbar-default">
    <div class="container-fluid"></div>
    <!-- <div class="navbar-header"><a class="navbar-brand" href="select.php">データ一覧</a></div> -->
  </nav>
</header>
<main>

<form method="POST" action="gate.php">
<div id="signin">
    <legend>sign in</legend>
        <fieldset>
              <div class="input"><label>ID:<input type="text" name="lid" placeholder="IDを入力してください"></label></div><br>
              <div class="input"><label>パスワード:<input type="text" name="lpw" placeholder="パスワードを入力してください"></label></div><br>
              <input type="hidden" name="admin_flg" value="0">
              <button type="submit" value="send">sign in</button><br>
        </fieldset>
</div>
</form>
</main>
<div class="link"><a href="userSignUp.php">Sign Up（新規登録）</a></div>
<div class="link"><a href="adminSignIn.php">Administrator Sign In</a></div>


<script></script>

<?php  ?>
</body>
</html>