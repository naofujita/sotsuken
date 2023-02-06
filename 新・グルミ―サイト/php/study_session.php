<?php
    session_start();

    
    //usernameとかを入力しているか
    if(!($_POST["username"]=="") && !($_POST["pass"]=="")){
        //入力値を取得する
        $siteuser = $_POST["username"];
        $pass = $_POST["pass"];

/************************************************************
 * ここでデータベースに接続、問い合わせ
*************************************************************/

        //データベース接続
        $dsn = 'mysql:dbname=gourmmy;host=localhost';
        $user = 'root';
        $password = '';
        
        try{
            $dbh = new PDO($dsn, $user, $password);
            //SELECT *(全ての行のこと) FROM テーブル名 WHERE 詳細条件
            $sql = "SELECT name FROM member WHERE name='".$siteuser."' and pass='".$pass."'";
            //SQLインジェクション対策
            $stmt = $dbh->prepare($sql);
            $stmt -> execute();
            // foreach文で配列の中身を一行ずつ出力
            foreach ($stmt as $row) {
                // データベースのフィールド名で出力
                $res = $row['name'];
            }
        }catch(PDOException $e){
            print('Error:'.$e->getMessage());
            die();
        }
        $dbh = null;

/*************************************************************/

        //正しくてかつログインのセッションが開始されていなければ、セッション開始
        if($siteuser == $res){
            $_SESSION['login']=true;
            $_SESSION["user"] = $siteuser;
        }else{
            print("正しく入力してください");
        }
    }else{
        //どこが空か探す
        if($_POST["username"]=="" && $_POST["pass"] == ""){
            print("ユーザー名,パスワードを入力してください");
        }else if($_POST["username"] == ""){
            print("ユーザー名を入力してください");
        }else{
            print("パスワードを入力してください");
        }
    }
    //ログアウトを押されたときにセッションをなくす
    if(isset($_POST['logout'])==true){
        $_SESSION=[];
    }    
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>セッション情報の作成・削除</title>
</head>
<body>
    <form name="myForm" method="post" action="study_session.php">
    <?php
        if(isset($_SESSION['login'])==false){
            print 'サインイン<br>';
            print('<input type="text" name="username" plaseholder="username or xxxx@mail.com"><br>');
            print('<input type="password" name="pass"><br>');
            print('<input type="submit" name="login"  value="ログイン">');
        }else{
            print($_SESSION["user"] . "さんでログイン中。<br>");
            print('<input type="submit" name="logout" value="ログアウト"><br>');
            //COOKIEは端末で保持するSESSIONIDのこと
            //SESSIONIDはサーバーで保存で、Cookieは端末で保存する
            print("session_id:" . $_COOKIE[session_name()] . "<br>");
        }
    ?>
    </form>
</body>
</html>