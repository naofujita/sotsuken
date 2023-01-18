<?php
    session_start();

    
    //usernameとかを入力しているか
    if(isset($_POST["username"]) && isset($_POST["pass"])){
        try{
            //ここでデータベースから問い合わせるといいですよん
            $users = ["morioka","admin"];
            $passes = ["morimori","admin"];

            //入力値を取得する
            $user = $_POST["username"];
            $pass = $_POST["pass"];

            //usernameとpasswordの組みが正しいかチェックする
            for($i = 0;$i < count($users);$i++){
                //正しくてかつログインのセッションが開始されていなければ、セッション開始
                if($users[$i] == $user && $passes[$i] == $pass && $_SESSION["login"] == false){
                    $_SESSION['login']=true;
                    $_SESSION["user"] = $user;
                    break;
                }
            }
            if(!isset($_SESSION["user"])){
                print("正しく入力してください");
            }
        }catch(IOException $e){
            print("もう一度入力してください");
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
            print("session_id:" . $_COOKIE[session_name()]);
        }
    ?>
    </form>
</body>
</html>