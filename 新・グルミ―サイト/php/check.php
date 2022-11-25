<!doctype html>
<html lang="ja">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
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
    <link href="../css/check.css" rel="stylesheet" type="text/css">
    <link href="../css/tb_confirm.css" rel="stylesheet" type="text/css">
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script type="text/javascript" src="../css/animation1.js"></script>
</head>
<body>
    
    <header id="header" class="wrapper">
        <h3 class="gourmmy">Gourmmy</h3>
          <nav>
            <ul>
                <li><a href="../index.html">HOME</a></li>
				<li><a href="../gaiyou.html">Gourmmyについて</a></li>
                <li><a href="../toiawase.html">問い合わせ</a></li>
				<li><a href="../login.html">サインイン</a></li>
           </ul>
         </nav>
        </header>
        

<br>
<br>
<br>
<?php

// セッションの開始
/*session_start():
$name = htmlspecialchars($_POST['name'], ENT_QUOTES, 'UTF-8');
$name_huri = htmlspecialchars($_POST['name_huri'], ENT_QUOTES, 'UTF-8');
$mail = htmlspecialchars($_POST['mail'], ENT_QUOTES, 'UTF-8');
$pass = htmlspecialchars($_POST['pass'], ENT_QUOTES, 'UTF-8');
$repass = htmlspecialchars($_POST['repass'],ENT_QUOTES, 'UTF-8');
$yuubin = htmlspecialchars($_POST['yuubin'],ENT_QUOTES, 'UTF-8');
$address = htmlspecialchars($_POST['address'],ENT_QUOTES, 'UTF-8');
$phone = htmlspecialchars($_POST['phone'],ENT_QUOTES, 'UTF-8');
$birth = htmlspecialchars($_POST['birth'],ENT_QUOTES, 'UTF-8');

//入力値をセッション変数に格納
// データベースの設定ができるようになったらいらないよ
// 確認だけならセッションで管理するとデータを盗まれる可能性あり！！
/* $_SESSION['contact'] = $contact;
$_SESSION['comment'] = $comment;
$_SESSION['name'] = $name;
$_SESSION['gender'] = $gender;
$_SESSION['tel'] = $tel;
$_SESSION['email'] = $email;
 */

?>






<h1 class="midasi">ご入力情報確認</h1>
<p style="text-align : center ; font-size: 2rem; margin-top: 30px;">
<p>＜内容をご確認の上、"登録する"ボタンを押してください。
<br>ご入力情報に変更が必要な場合、"内容を修正する"ボタンを押し、変更を行ってください。
<br>登録情報はあとから変更することもできます。＞</p>
<?php if (!empty($error) && $error === "error"): ?>
    <p class="error">＊会員登録に失敗しました。</p>
<?php endif ?>
<br>
<br>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0">
    <title>確認画面</title>
    <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
    <link href="https://unpkg.com/sanitize.css" rel="stylesheet"/>
    <link rel="stylesheet" href="css/style.css">
</head>
<!----<body>
    <div class="content">
        <form action="" method="POST">
            <input type="hidden" name="check" value="checked">
            <h1>入力情報の確認</h1>
            <p>ご入力情報に変更が必要な場合、下のボタンを押し、変更を行ってください。</p>
            <p>登録情報はあとから変更することもできます。</p>
           < ?php if (!empty($error) && $error === "error"): ?>
                <p class="error">＊会員登録に失敗しました。</p>
            < ?php endif ?>
            <hr>--->
            <form action="connect.php" method="post">
            <div class="control">
                <p>名前</p>
                <p><span class="fas fa-angle-double-right"></span> <span class="check-info"><?php echo $_POST['name']; ?></span></p>
            </div>
 
            <div class="control">
                <p>名前(ふりがな)</p>
                <p><span class="fas fa-angle-double-right"></span> <span class="check-info"><?php echo $_POST['name_huri']; ?></span></p>
            </div>
 
            <div class="control">
                <p>メールアドレス</p>
                <p><span class="fas fa-angle-double-right"></span> <span class="check-info"><?php echo $_POST['mail']; ?></span></p>
            </div>

              <!-- パスワード表示するのはダメ絶対！！！ -->
            <input type="hidden" name="pass"  value="<?=  $_POST['pass']; ?>">

            <div class="control">
                <p>郵便番号</p>
                <p><span class="fas fa-angle-double-right"></span> <span class="check-info"><?php echo $_POST['yuubin']; ?></span></p>
            </div>
 
            <div class="control">
                <p>住所</p>
                <p><span class="fas fa-angle-double-right"></span> <span class="check-info"><?php echo $_POST['address']; ?></span></p>
            </div>
 
            <div class="control">
                <p>電話番号</p>
                <p><span class="fas fa-angle-double-right"></span> <span class="check-info"><?php echo $_POST['tel']; ?></span></p>
            </div>
 
            <div class="control">
                <p>生年月日</p>
                <p><span class="fas fa-angle-double-right"></span> <span class="check-info"><?php echo $_POST['calendar']; ?></span></p>
            </div>
 
            <br>
            <div class="btn" style="margin-top:20px;  margin-bottom: 10%;    font-size: 2rem;   transform: scale(1.5)">
            <button type="button"  onclick="history.back(-1)">内容を修正する</button>
            <button type="submit" class="btn next-btn">登録する</button>
            <div class="clear"></div>
        </form>
    </div>
</body>
</html>