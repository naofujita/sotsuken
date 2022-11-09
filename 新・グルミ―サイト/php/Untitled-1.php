<?php

// セッションの開始
session_start();

$contact = htmlspecialchars($_POST['contact'], ENT_QUOTES, 'UTF-8');
$comment = htmlspecialchars($_POST['comment'], ENT_QUOTES, 'UTF-8');
$name = htmlspecialchars($_POST['name'], ENT_QUOTES, 'UTF-8');
$gender = htmlspecialchars($_POST['gender'], ENT_QUOTES, 'UTF-8');
$tel = htmlspecialchars($_POST['tel'],ENT_QUOTES, 'UTF-8');
$email = htmlspecialchars($_POST['email'],ENT_QUOTES, 'UTF-8');

// 入力値をセッション変数に格納
$_SESSION['contact'] = $contact;
$_SESSION['comment'] = $comment;
$_SESSION['name'] = $name;
$_SESSION['gender'] = $gender;
$_SESSION['tel'] = $tel;
$_SESSION['email'] = $email;

?>


<!DOCTYPE HTML>
<html lang="ja">
<head>
<meta charset="utf-8">
<title>問い合わせ確認画面 | Gourmmy</title>
<style>

    body{
        text-align: center;
    }
    h1 {
        margin-left: 50px;
    }
    th {
        width: 200px;
        margin: 10px 0;
    }
    input#send {
        margin-left: 100px;
        margin-top: 30px;
    }
</style>
    <link href="../css/toiawase.css" rel="stylesheet" type="text/css">
    <link href="../css/tb_confirm.css" rel="stylesheet" type="text/css">
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script type="text/javascript" src="../css/animation1.js"></script>
</head>

<body>
    
    <h2><span>内容確認</span></h2>
    <br>
    
    <form action="submit2.php" method="post">
    <table class="formTable">
    
    <tr><th>お問い合わせの種類</th><td><?php echo $contact; ?></td></tr>
    <tr><th>お問い合わせ内容</th><td><?php echo $comment; ?></td></tr>
    <tr><th>お名前</th><td><?php echo $name; ?></td></tr>
    <tr><th>性別</th><td><?php echo $ruby; ?></td></tr>
    <tr><th>電話番号（半角）</th><td><?php echo $email; ?></td></tr>
    <tr><th>メールアドレス</th><td><?php echo $tel; ?></td></tr>
    
    <!--echoで変数に格納された値を表示-->
    
    </table>
    <br><br>
        
        <div class="btn">
        <input type="submit" value="送信する"></div>
</form>
</body>
</html>