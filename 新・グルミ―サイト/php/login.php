<?php
session_start():
session_regenerate_id(true);
if(isset($_SESSION['login'])==false)
 {
    
    print 'ログインされていません。<br/>';
    print'<a harf = "../login.html">ログイン画面へ</a>';
    exit();
}
    
else
{
    print $_SESSION['name'];
    print'さんログイン中<br/>';
    print'<br/>';
}
?>
<?php

try
{

    $user = $_post['name'];
    $mail = $_post['mail'];
    $pass = $post['pass'];

    $user = htmlspecialchars(user,ENT_QUOTES,'<UTF-8');
    $mail = htmlspecialchars(mail,ENT_QUOTES,'<UTF-8');
    $pass = htmlspecialchars(pass,ENT_QUOTES,'<UTF-8');

    $dsn = 'mysql:dbname=gourmmy;host=localhost';
    $user = 'root';//user名
    $password = '';//パスワード(rootはデフォルトで何も設定されていない)
    //データベースへ接続する
    $dbh = new PDO($dsn, $user, $password);
    $dbh - >setAttribute(POD::ATTR_ERRMODE,POD::ERRMODE_EXCEPTION);

    $sql = 'SELECT name FROM mst_user WHERE name = ?  AND mail = ? pass = ?';
    $stmt = $dbh -> prepare($sql);
    $data[] = $name;
    $data[] = $mail;
    $data[] = $pass;
    $stmt -> execute($data);

    $dbh = null;

    $rec = $stmt ->fetch(POD::FETCH_ASSOC);

    if($rec==false)
    {
        print '入力内容が間違っています。<br/>';
        print 'a harf = "../login.html">ログイン画面へ</a>';
    }
    else
    {
        header('Location:../index.html');
        exit();
    }
}
catch(Exception $e)
{
    print 'ただいま障害により大変ご迷惑をお掛けしております。';
    exit();
}
?>
