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

<h1 class="midasi">内容確認</h1>
<p style="text-align : center ; font-size: 2rem; margin-top: 30px; ;">＜お問い合わせ内容をご確認の上、「送信」ボタンをクリックしてください。＞</p>
<br>
<br>

<?php

// セッションの開始
session_start();
$contactList = ["注文について","配達について","決済について","その他"];
$contact = htmlspecialchars($_POST['enquiry_type'], ENT_QUOTES, 'UTF-8');
$enquiry = htmlspecialchars($_POST['enquiry'], ENT_QUOTES, 'UTF-8');
$name = htmlspecialchars($_POST['name'], ENT_QUOTES, 'UTF-8');
$gender = htmlspecialchars($_POST['gender'], ENT_QUOTES, 'UTF-8');
$tel = htmlspecialchars($_POST['tel'],ENT_QUOTES, 'UTF-8');
$email = htmlspecialchars($_POST['email'],ENT_QUOTES, 'UTF-8');


// 入力値をセッション変数に格納
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
    <div class="box_con02">
    <form action="post.php" method="post">
        <table class="formTable">       
            <tr>
                <th>お問い合わせの種類</th>
                <!-- 配列の名前が違ってたよ -->
                <td><?php echo $contactList[$contact]; ?></td>
                <input type="hidden" name="enquiry_type" value="<?= $contactList[$contact]; ?>">
            </tr>                         
            <tr>
                <th>お問い合わせ内容</th>
                <!-- $_POSTで受け取った変数名が違うよ -->
                <td><?php echo $enquiry; ?></td>
                <input type="hidden" name="enquiry" value="<?= $enquiry; ?>">
            </tr>
            <tr>
                <th>お名前</th>
                <td><?php echo $name; ?></td>
                <input type="hidden" name="name" value="<?= $name; ?>">
            </tr>
            <tr>
                <th>性別</th>
                <td><?php echo $gender; ?></td>
                <input type="hidden" name="gender" value="<?= $gender; ?>">
            </tr>
            <tr>
                <th>電話番号（半角）</th>
                <td><?php echo $tel; ?></td>
                <input type="hidden" name="tel" value="<?= $tel; ?>">
            </tr>
            <tr>
                <th>メールアドレス</th>
                <td><?php echo $email; ?></td>
                <input type="hidden" name="email" value="<?= $email; ?>">
            </tr>
        
        <!--echoで変数に格納された値を表示-->
        </table>
    <br><br>
        
        <div class="btn" style="margin-bottom: 20%;    font-size: 2rem;   transform: scale(1.5)">
        <input type="button" value="内容を修正する" onclick="history.back(-1)">
        <input type="submit" value="送信"></div>
</form>
</div>
</body>
</html>