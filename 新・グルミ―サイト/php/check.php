<?php
require("./dbconnect.php");
session_start();
 
/* 会員登録の手続き以外のアクセスを飛ばす */
if (!isset($_SESSION['join'])) {
    header('Location: entry.php');
    exit();
}
 
if (!empty($_POST['check'])) {
    // パスワードを暗号化
    $hash = password_hash($_SESSION['join']['password'], PASSWORD_BCRYPT);
 
    // 入力情報をデータベースに登録
    $statement = $db->prepare("INSERT INTO members SET name=?, mail=?, password=?");
    $statement->execute(array(
        $_SESSION['join']['name1'],
        $_SESSION['join']['name2'],
        $_SESSION['join']['mail'],
        $_SESSION['join']['password'],
        $_SESSION['join']['post code'],
        $_SESSION['join']['adress'],
        $_SESSION['join']['tel'],
        $_SESSION['join']['birth date'],
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
                <p><span class="fas fa-angle-double-right"></span> <span class="check-info"><?php echo htmlspecialchars($_SESSION['join']['name1'], ENT_QUOTES); ?></span></p>
            </div>
 
            <div class="control">
                <p>名前(ふりがな)</p>
                <p><span class="fas fa-angle-double-right"></span> <span class="check-info"><?php echo htmlspecialchars($_SESSION['join']['name2'], ENT_QUOTES); ?></span></p>
            </div>
 
            <div class="control">
                <p>メールアドレス</p>
                <p><span class="fas fa-angle-double-right"></span> <span class="check-info"><?php echo htmlspecialchars($_SESSION['join']['mail'], ENT_QUOTES); ?></span></p>
            </div>

            <div class="control">
                <p>パスワード</p>
                <p><span class="fas fa-angle-double-right"></span> <span class="check-info"><?php echo htmlspecialchars($_SESSION['join']['password'], ENT_QUOTES); ?></span></p>
            </div>
 
            <div class="control">
                <p>郵便番号</p>
                <p><span class="fas fa-angle-double-right"></span> <span class="check-info"><?php echo htmlspecialchars($_SESSION['join']['post code'], ENT_QUOTES); ?></span></p>
            </div>
 
            <div class="control">
                <p>住所</p>
                <p><span class="fas fa-angle-double-right"></span> <span class="check-info"><?php echo htmlspecialchars($_SESSION['join']['adress'], ENT_QUOTES); ?></span></p>
            </div>
 
            <div class="control">
                <p>電話番号</p>
                <p><span class="fas fa-angle-double-right"></span> <span class="check-info"><?php echo htmlspecialchars($_SESSION['join']['tel'], ENT_QUOTES); ?></span></p>
            </div>
 
            <div class="control">
                <p>生年月日</p>
                <p><span class="fas fa-angle-double-right"></span> <span class="check-info"><?php echo htmlspecialchars($_SESSION['join']['birth date'], ENT_QUOTES); ?></span></p>
            </div>
 
            <br>
            <a href="entry.php" class="back-btn">変更する</a>
            <button type="submit" class="btn next-btn">登録する</button>
            <div class="clear"></div>
        </form>
    </div>
</body>
</html>