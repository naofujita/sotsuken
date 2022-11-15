

<?php
 //データ定義
 $enquiryTypeList = ["注⽂について","配達について","決済について","その他"];
 $genderList = ["男","⼥"];
 //データを取得
 $enquiry = $_POST["enquiry"];
 $comment = $_POST["comment"];
 $name = $_POST["name"];
 $gender = $_POST["gender"];
 $tel = $_POST["tel"];
 $email = $_POST["email"];
 //正しく取得できているかの確認
 //print($name . ":" . $genderList[$gender] . ":" . 
 //$phone . ":" . $mail . ":" . $enquiry . ":" 
 //. $enquiryTypeList[$enquiry_type]);

 $dsn = 'mysql:dbname=gourmmy;host=localhost';
 $user = 'root';
 $password = '';
 try{
 $dbh = new PDO($dsn, $user, $password);
 $sql = "INSERT INTO enquiry(id, enquiry, comment, name, gender, tel, email, ) VALUES(?,?,?,?,?,?,?)";
 //SQLインジェクション対策
 $stmt = $dbh->prepare($sql);
 $flag = $stmt->execute(array(NULL,$name,$genderList[$gender],$tel,
 $email,$enquiry,$enquiryTypeList[$enquiry]));
 //正しくSQLが処理されたかの確認
 if($flag){
 print("完了");
 }else{
 print("エラー");
 }
 }catch (PDOException $e){
 print('Error:'.$e->getMessage());
 die();
 }
 $dbh = null;
?>