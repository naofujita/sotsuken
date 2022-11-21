
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
				<li><a href="login.html">サインイン</a></li>
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
//エラーの解決11/21 "60error"
if(isset($_POST['enquiry'])){
    $genderList = ["男","女"];
    $enquiryTypeList = ["注文について","配達について","決済について","その他"];
   
    //データを取得
    $name = $_POST["name"];
    $gender = $_POST["gender"];
    $tel = $_POST["tel"];
    $email = $_POST["email"];
    $enquiry = $_POST["enquiry"];
    $enquiry_type = $_POST["enquiry_type"];
    
     //正しく取得できているかの確認
     //print($name . ":" . $genderList[$gender] . ":" . 
     //$phone . ":" . $mail . ":" . $enquiry . ":" 
     //. $enquiryTypeList[$enquiry_type]);
     $dsn = 'mysql:dbname=gourmmy;host=localhost';
     $user = 'root';
     $password = '';
     try{
     $dbh = new PDO($dsn, $user, $password);
     $sql = "INSERT INTO enquery(id,enquiry_type,enquiry, name, gender, tel, email) 
     VALUES(?,?,?,?,?,?,?)";
     
    
     }
     //SQLインジェクション対策
     $stmt = $dbh->prepare($sql);
     $flag = $stmt->execute(array(NULL,$enquiryTypeList[$enquiry_type],$enquiry,$name,$genderList[$gender],$tel,$email));
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
    <div class="btn" style="margin-bottom: 20%;    font-size: 2rem;   transform: scale(1.5)">
    <span><a href="index.html"></a><input type="submit" value="HOMEへ戻る" disabled id="subm" /></span>
    </div>
</form>
</div>
</body>
</html>