<?php
   session_start();

    
   //usernameとかを入力しているか
   if(isset($_SESSION['login'])==false){
    if(!($_POST["name"]=="") && !($_POST["pass"]=="") && !($_POST["mail"]=="")){
        //入力値を取得する
        $siteuser = $_POST["name"];
        $pass = $_POST["pass"];
        $mail = $_POST["mail"];

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
            $sql = "SELECT name FROM member WHERE name='".$siteuser."' and pass='".$pass."' and mail='".$mail."'";
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
            //print("<script>alert('".$siteuser."');</script>");
        }else{
            print("正しく入力してください");
        }
    }else{
        //どこが空か探す
        $emp = "";
        if($_POST["name"]==""){
            $emp .= "ユーザー名,";
        }
        if($_POST["username"] == ""){
            $emp .= "パスワード,";
        }
        if($_POST["mail"]==""){
            $emp .= "メールアドレス,";
        }
        print("<script>alert('".$emp."を入力してください');</script>");
    }
  }
   //ログアウトを押されたときにセッションをなくす
   if(isset($_POST['logout'])==true){
       $_SESSION=[];
   }

?>

<!doctype html>
<html lang="ja">
  <meta charset="utf-8">

<head>
<title>サインイン</title>
<link rel="shortcut icon" href="../img/アイコン１.png"><!--←ロゴのアイコン!-->
<link href="../css/login.css" rel="stylesheet" type="text/css">
</head>

<body>
    
  <header id="header">
    <h1 id="go" style="margin-top: 0; margin-bottom: 0;  font-family : Times New Roman,Times, serif;">Gourmmy</h1>
    
    <nav>
    <ul style="margin-top: 0px;">
      <li><a href="../index2.html">Home</a></li>
      <!--<li class="has-child"><a href="#">Genre</a>
        <ul>

            <li><a href="#wa"><dl>
              <dt><img src="img/海鮮丼2.jpg" alt=""></dt>
              <dd>和食</dd>
              </dl></a></li>
            <li><a href="#you"><dl>
              <dt><img src="img/ピザ２.png" alt=""></dt>
              <dd>洋食</dd>
              </dl></a></li>
            <li><a href="#tyu"><dl>
              <dt><img src="img/ラーメン5.jpg" alt=""></dt>
              <dd>中華料理</dd>
              </dl></a></li>
            <li><a href="#ka"><dl>
              <dt><img src="img/韓国.jpg" alt=""></dt>
              <dd>韓国料理</dd>
              </dl></a></li>
            <li><a href="#su"><dl>
              <dt><img src="img/スイーツ2.webp" alt=""></dt>
              <dd>スイーツ</dd>
              </dl></a></li>

        </ul>!-->

      <li><a href="../gaiyou.html">Overview</a></li>
      <li><a href="../toiawase.html">Contact</a></li>
        <li class="has-child"><a href="#"><img src="../img/アイコン4.png" style="width: 30px;  height: 30px;"></a>
        <ul>

          
          <li><a href="#wa"><dl>
            <dt></dt>
            <dd></dd>
            </dl></a></li>
          <li><a href="./login.php"><dl>
            <dt><img src="../img/鍵3.jpeg" alt=""></dt>
            <dd>Login</dd>
            </dl></a></li>
          <li><a href="#"><dl>
            <dt><img src="../img/看板2.jpg" alt=""></dt>
            <dd></dd>
            </dl></a></li>
          <li><a href="aka.html"><dl>
            <dt><img src="../img/会員登録3.jpg" alt=""></dt>
            <dd>Membership</dd>
            </dl></a></li>
          <li><a href="#"><dl>
            <dt></dt>
            <dd></dd>
            </dl></a></li>


      </ul>
    </li>
      

    
    </ul>
  </nav>
    
  </header>
        
<form method="post" action="login.php">
  <div class="login-wrap">
    <div class="login-html">
      <input id="tab-1" type="radio" name="tab" class="sign-in" checked><label for="tab-1" class="tab">Login</label>
      <input id="tab-2" type="radio" name="tab" class="sign-up"><label for="tab-2" class="tab"></label>
      <div class="login-form">
        <div class="sign-in-htm">
        <?php if(isset($_SESSION['login'])==false){ ?>
          <div class="group">
            <label for="user" class="label">Name</label>
            <input id="user" name="name" type="text" class="input">
          </div>
          <div class="group">
            <label for="mail" class="label">Email Address</label>
            <input id="mail" name="mail" type="text" class="input">
          </div>
          <div class="group">
            <label for="pass" class="label">password</label>
            <input id="pass" name="pass" type="password" class="input" data-type="password">
          </div>
          <div class="group">
            <input id="check" type="checkbox" class="check" checked>
            <label for="check"><span class="icon"></span> サインインの状態を維持しますか</label>
          </div>
          
          <div class="group">
            <input type="submit" class="button" value="Sign In">
          </div>
          <?php 
          }else{
            print("ようこそ、" . $_SESSION["user"]) . "さん！！<br><br><br>";
            print('<div class="group"><input type="submit" class="button" name="logout" value="ログアウト"></div><br>');
          }
          ?>
          <div class="hr"></div>
          <a class="aka" href="../aka.html">アカウントをお持ちでない方</a>
        </div>
        <!--<div class="sign-up-htm">
          <div class="group">
            <label for="user" class="label">Username</label>
            <input id="user" type="text" class="input" name="user">
          </div>
          <div class="group">
            <label for="pass" class="label">Password</label>
            <input id="pass" type="password" class="input" data-type="password" name="pass">
          </div>
          <div class="group">
            <label for="pass" class="label">Repeat Password</label>
            <input id="repass" type="password" class="input" data-type="password">
          </div>
          <div class="group">
            <label for="pass" class="label">Email Address</label>
            <input id="mail" type="text" class="input" name="mail">
          </div>
          <div class="group">
            <input type="submit" class="button" value="Sign Up">
          </div>
          <div class="hr"></div>
          <div class="foot-lnk">
            <label for="tab-1">Already Member?</label>
          </div>
        </div>-->
      </div>
    </div>
  </div>
</form>
</body>
</html>