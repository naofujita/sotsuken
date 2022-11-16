

<?php

 //正しく取得できているかの確認
 //print($name . ":" . $genderList[$gender] . ":" . 
 //$phone . ":" . $mail . ":" . $enquiry . ":" 
 //. $enquiryTypeList[$enquiry_type]);
 $dsn = 'mysql:dbname=gourmmy;host=localhost';
 $user = 'root';
 $password = '';
 try{
 $dbh = new PDO($dsn, $user, $password);
 $sql = "INSERT INTO enquery(id,enquiry_type,enquiry,name, gender, tel, email, ) 
 VALUES(?,?,?,?,?,?,?)";
 //SQLインジェクション対策
 $stmt = $dbh->prepare($sql);
 $flag = $stmt->execute(array(NULL,$enquiryTypeList[$enquiry_type],$enquiry,$name,
 $genderList[$gender],$tel,$email));
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