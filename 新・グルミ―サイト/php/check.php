<?php
require("./connect.php");
session_start();
 

 
if (!empty($_POST['check'])) {
    // パスワードを暗号化
    $hash = password_hash($_SESSION['join']['password'], PASSWORD_BCRYPT);
 
    // 入力情報をデータベースに登録
    $statement = $db->prepare("INSERT INTO touroku SET name=?, name_huri=?, mail=?, pass=?, repass=?, yuubin=?, address=?, phone=?, birth=?");
    $statement->execute(array(
        $_SESSION['join']['name'],
        $_SESSION['join']['name_huri'],
        $_SESSION['join']['mail'],
        $_SESSION['join']['pass'],
        $_SESSION['join']['repass'],
        $_SESSION['join']['yuubin'],
        $_SESSION['join']['address'],
        $_SESSION['join']['phone'],
        $_SESSION['join']['birth'],
        $hash
    ));
 
    unset($_SESSION['join']);   // セッションを破棄
    header('Location: thank.php');   // thank.phpへ移動
    exit();
}
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0">
    <title>確認画面</title>
    <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
    <link href="https://unpkg.com/sanitize.css" rel="stylesheet"/>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="content">
        <form action="" method="POST">
            <input type="hidden" name="check" value="checked">
            <h1>入力情報の確認</h1>
            <p>ご入力情報に変更が必要な場合、下のボタンを押し、変更を行ってください。</p>
            <p>登録情報はあとから変更することもできます。</p>
            <?php if (!empty($error) && $error === "error"): ?>
                <p class="error">＊会員登録に失敗しました。</p>
            <?php endif ?>
            <hr>
 
            <div class="control">
                <p>名前</p>
                <p><span class="fas fa-angle-double-right"></span> <span class="check-info">
            </div>
 
            <div class="control">
                <p>名前(ふりがな)</p>
                <p><span class="fas fa-angle-double-right"></span> <span class="check-info">
            </div>
 
            <div class="control">
                <p>メール</p>
                <p><span class="fas fa-angle-double-right"></span> <span class="check-info">
            </div>

            <div class="control">
                <p>パスワード</p>
                <p><span class="fas fa-angle-double-right"></span> <span class="check-info">
            </div>
 
            <div class="control">
                <p>郵便番号</p>
                <p><span class="fas fa-angle-double-right"></span> <span class="check-info">
            </div>
 
            <div class="control">
                <p>住所</p>
                <p><span class="fas fa-angle-double-right"></span> <span class="check-info">
            </div>
 
            <div class="control">
                <p>電話番号</p>
                <p><span class="fas fa-angle-double-right"></span> <span class="check-info">
            </div>
 
            <div class="control">
                <p>生年月日</p>
                <p><span class="fas fa-angle-double-right"></span> <span class="check-info">
            </div>
 
            <br>
            <a href="aka.php" class="back-btn">変更する</a>
            <button type="submit" class="btn next-btn">登録する</button>
            <div class="clear"></div>
        </form>
    </div>
</body>
</html>