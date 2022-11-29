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
    <link href="../css/toiawase.css" rel="stylesheet" type="text/css">
    <link href="../css/tb_confirm.css" rel="stylesheet" type="text/css">
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script type="text/javascript" src="../css/animation1.js"></script>
</head>

<div class="bg_pattern Paper_v2"></div>

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

<ul class="progressbar">
  <li class="complete">ご入力</li>
  <li class="active">ご確認</li>
  <li>完了</li>
</ul>
<br>
<br>
<br>


<!--/*STEPドットバー*/!-->
<style>.progressbar {
    position: relative;
    margin: 0;
    padding: 0;
    display: flex;
    flex-wrap: wrap;
    justify-content: space-between;
}
.progressbar li {
    position: relative;
    list-style-type: none;
    text-align: center;
    text-transform: uppercase;
    width: 33.333%;
    color: #4d4d4d;
    font-weight: bold;
    counter-increment: steps;
}
.progressbar li:before {
    display: block;
    width: 26px;
    height: 26px;
    margin: 7px auto 20px auto;
    content: '';
    line-height: 26px;
    font-size: 12px;
    text-align: center;
    border-radius: 50%;
    background-color: #a19f9f;
    content: counter(steps);
}
.progressbar li:after {
    position: absolute;
    z-index: -1;
    top: 15px;
    left: -50%;
    width: 100%;
    height: 2px;
    content: '';
    background-color: #a19f9f;
}
.progressbar li:first-child:after {
    content: none;
}
.progressbar li.active,
.progressbar li.complete{
    color: #fd7200;
}
.progressbar li.active:before,
.progressbar li.complete:before {
    background-color: #fd7200;
    color: #FFF;
}
.progressbar li.active:after,
.progressbar li.complete:after {
    background-color: #fd7200;
}

/* 装飾 */
ul{
	margin: 40px 0 !important;
}
  body{
	margin: 40px 20px;
}
</style>

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
<p style="text-align : center ; font-size: 2.5rem; margin-top: 30px;">
<br>
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
    <link rel="stylesheet" href="css/toiawase.css">
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
            <div class="box_con02">
            <form action="connect.php" method="post">
                <table class="formTable">
                <tr>
                    <th>名前</th>
                    <td><span class="fas fa-angle-double-right"></span> <span class="check-info"><?php echo $_POST['name']; ?></span></td>
                    <input type="hidden" name="name" value="<?= $_POST['name']; ?>">
                </tr>
            
                <tr>
                    <th>名前(ふりがな)</th>
                    <td><span class="fas fa-angle-double-right"></span> <span class="check-info"><?php echo $_POST['name_huri']; ?></span></td>
                    <input type="hidden" name="name_huri" value="<?= $_POST['name_huri']; ?>">
                </tr>

                <tr>
                    <th>メールアドレス</th>
                    <td><span class="fas fa-angle-double-right"></span> <span class="check-info"><?php echo $_POST['mail']; ?></span></td>
                    <input type="hidden" name="mail" value="<?= $_POST['mail']; ?>">
                </tr>
            

              <!-- パスワード表示するのはダメ絶対！！！ -->
                <input type="hidden" name="pass"  value="<?=  $_POST['pass']; ?>">

            
            <tr>
                <th>郵便番号</th>
                <td><span class="fas fa-angle-double-right"></span> <span class="check-info"><?php echo $_POST['yuubin']; ?></span></td>
                <input type="hidden" name="yuubin" value="<?= $_POST['yuubin']; ?>">
            </tr>
           
            <tr>
                <th>住所</th>
                <td><span class="fas fa-angle-double-right"></span> <span class="check-info"><?php echo $_POST['address']; ?></span></td>
                <input type="hidden" name="address" value="<?= $_POST['address']; ?>">
            </tr>
            
            <tr>
                <th>電話番号</th>
                <td><span class="fas fa-angle-double-right"></span> <span class="check-info"><?php echo $_POST['tel']; ?></span></td>
                <input type="hidden" name="tel" value="<?= $_POST['tel']; ?>">
            </tr>
            
            <tr>
                <th>生年月日</th>
                <td><span class="fas fa-angle-double-right"></span> <span class="check-info"><?php echo $_POST['calendar']; ?></span></td>
                <input type="hidden" name="calendar" value="<?= $_POST['calendar']; ?>">
            </tr>
           </table>
           </div>
            <br>
            <br>
            
            <div class="btn" style="margin-top:20px;  margin-bottom: 10%;    font-size: 2rem;   transform: scale(1.5)">
            <button type="button"  onclick="history.back(-1)">内容を修正する</button>
            <button type="submit" class="btn next-btn">登録する</button>
            <div class="clear"></div>
        </form>
    
</body>
</html>
