
<!DOCTYPE HTML>
<html lang="ja">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
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

<h1 class="midasi">会員登録完了</h1>
<p style="text-align : center ; font-size: 2rem; margin-top: 30px;">
＜内容が登録されました!サインインページからログインしてください＞
</p>
<br>
<br>

<?php
    //エラーの解決11/21 "60error"
    if(isset($_POST['name'])){
    
        //データを取得
              
        $name = $_POST["name"];
        $name_huri = $_POST["name_huri"];
        $mail = $_POST["mail"];
        $pass = $_POST["pass"];
        $yuubin = $_POST["yuubin"];
        $address = $_POST["address"];
        $tel = $_POST["tel"];
        $calendar = $_POST["calendar"];
        
        //正しく取得できているかの確認
        print($name . ":" . $name_huri . ":" . 
        $mail . ":" . $pass . ":" . $yuubin . ":" .
        $address . ":" . $tel . ":" . $calendar);
        $dsn = 'mysql:dbname=gourmmy;host=localhost';
        $user = 'root';
        $password = '';
        try{
            $dbh = new PDO($dsn, $user, $password);
            $sql = "INSERT INTO member(id,name,name_huri,mail,pass,yuubin,address,tel,calendar)
            VALUES(?,?,?,?,?,?,?,?,?)";
            //SQLインジェクション対策
            $stmt = $dbh->prepare($sql);
            $flag = $stmt->execute(array(NULL,$name,$name_huri,$mail,$pass,$yuubin,$address,$tel,$calendar));
            //正しくSQLが処理されたかの確認
            if(!$flag){
                print("エラー");
            }
        }catch(PDOException $e){
            print('Error:'.$e->getMessage());
            die();
        }
        $dbh = null;
    }else{
        print("送信されてません。<br>お手数お掛けしますが、もう一度やり直すか、公式の電話番号までご連絡ください。");
    }
    ?>
        
    <h1>
    <div class="btn" style="margin-top:20px;  margin-bottom: 20%;    font-size: 2rem;   transform: scale(1.5)">
    <span><a href="../index.html"><input type="submit" value="HOMEへ戻る" id="subm" /></a></span>
    </div>
</div>
</body>
</html>