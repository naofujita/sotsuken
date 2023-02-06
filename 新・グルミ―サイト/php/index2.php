<!doctype html>
<html lang="ja">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>内容確認</title>
<link href="css/toiawase.css" rel="stylesheet" type="text/css">
</head>
<body>
    
    <header id="header" class="wrapper">
        <h3 class="gourmmy">Gourmmy</h3>
          <nav>
            <ul>
                <li><a href="index.html">HOME</a></li>
				<li><a href="gaiyou.html">Gourmmyについて</a></li>
                <li><a href="toiawase2.html">問い合わせ</a></li>
				<li><a href="./login.php">サインイン</a></li>
           </ul>
         </nav>
        </header>
        

<br>
<br>
<br>

<h1 class="midasi">お問い合わせ完了</h1>
<p style="text-align : center ; font-size: 2rem; margin-top: 30px;">＜内容が送信されました!内容を確認後、ご入力いただいたメールアドレスへ返信いたします。
<br>なお、返信には数日かかる場合がございます。＞</p>
<br>
<br>

<?php
if(isset($_POST['enquiry'])){
    $genderList = ["男","女"];
    $enquiryTypeList = ["注文について","配達について","決済について","その他"];
 //データベースへ接続する
 //dbnameでデータベースの名前(gourmmy),hostは基本localhostでOK
 $dsn = 'mysql:dbname=gourmmy;host=localhost';
 $user = 'root';//user名
 $password = '';//パスワード(rootはデフォルトで何も設定されていない)
 //tryでエラーが出ても安全に終了できるようにする
 try{
 //データベースへ接続する
 $dbh = new PDO($dsn, $user, $password);
 //テーブルenqueryから全てのデータを取り出すSQL
 $sql = 'select * from enquery';
?>
 <table>
 <tr><th>id</th><th>enquiry_type</th><th>enquiry</th>
 <th>name</th><th>gender</th><th>name</th>
 <th>email</th></tr><br>
<?php
 //全てのデータを取り出すおまじない
 //phpMyAdminで全て確認できるので覚える必要はほぼない
 foreach ($dbh->query($sql) as $row) {
 print("<tr>");
 print("<td>" . $row['id'] . "</td>");
 print("<td>" . $row['enquiry_type'] . "</td>");
 print("<td>" . $row['enquiry'] . "</td>");
 print("<td>" . $row['name'] . "</td>");
 print("<td>" . $row['gender'] . "</td>");
 print("<td>" . $row['tel'] . "</td>");
 print("<td>" . $row['email'] . "</td>");
 print('</tr><br>');
 }
?>
 </table>
<?php
 //エラーが出た時に⾏われる処理
 }catch (PDOException $e){
 print('Error:'.$e->getMessage());
 die();
 }
 //接続を解除する
 $dbh = null;
}
?>

<!DOCTYPE HTML>
<html lang="ja">
<head>
<meta charset="utf-8">
<title>問い合わせ完了画面 | Gourmmy</title>
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
    <link href="../css/heder_toiawase.css" rel="stylesheet" type="text/css">
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script type="text/javascript" src="../css/animation1.js"></script>
</head>

<body>
    <h1>
    <div class="btn" style="margin-bottom: 20%;    font-size: 2rem;   transform: scale(1.5);">
     <form action="index.html" method="post">
     <a href="index.html"></a><input type="submit" value="ホームに戻る" onclick="history.back(-1)">
    </div>
</form>
</div>
</body>
</html>