<?php
 //データベースへ接続する
 //dbnameでデータベースの名前(gourmmy),hostは基本localhostでOK
 $dsn = 'mysql:dbname=gourmmy;host=localhost';
 $user = 'root';//user名
 $password = '';//パスワード(rootはデフォルトで何も設定されていない)
 //tryでエラーが出ても安全に終了できるようにする
 try{
 //データベースへ接続する
 $dbh = new PDO($dsn, $user, $password);
 //テーブルenquiryから全てのデータを取り出すSQL
 $sql = 'select * from enquiry';
?>
 <table>
 <tr><th>id</th><th>contact</th><th>comment</th>
 <th>name</th><th>gender</th><th>name</th>
 <th>email</th></tr><br>
<?php
 //全てのデータを取り出すおまじない
 //phpMyAdminで全て確認できるので覚える必要はほぼない
 foreach ($dbh->query($sql) as $row) {
 print("<tr>");
 print("<td>" . $row['id'] . "</td>");
 print("<td>" . $row['contact'] . "</td>");
 print("<td>" . $row['comment'] . "</td>");
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
?>