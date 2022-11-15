<?php 
require("./connect.php");
session_start();

if (!empty($_POST)) {
    /* 入力情報の不備を検知 */
    if ($_POST['email'] === "") {
        $error['email'] = "blank";
    }
    if ($_POST['password'] === "") {
        $error['password'] = "blank";
    }
    
    /* メールアドレスの重複を検知 */
    if (!isset($error)) {
        $member = $db->prepare('SELECT COUNT(*) as cnt FROM touroku WHERE mail=?');
        $member->execute(array(
            $_POST['mail']
        ));
        $record = $member->fetch();
        if ($record['cnt'] > 0) {
            $error['mail'] = 'duplicate';
        }
    }
 
    /* エラーがなければ次のページへ */
    if (!isset($error)) {
        $_SESSION['join'] = $_POST;   // フォームの内容をセッションで保存
        header('Location: check.php');   // check.phpへ移動
        exit();
    }
}
?>
<!DOCTYPE html>
<head>
    <link rel="stylesheet" href="css/aka.css">
    <script src="https://ajaxzip3.github.io/ajaxzip3.js" charset="UTF-8"></script>
    
    <style>
        body {
            background-image: url(https://thumb.photo-ac.com/a5/a5f5402ad80d0860ea814663ffa2e226_t.jpeg);
            }
        </style>
    
    <title>会員登録</title>
</head>
<body>

    
 <div class="box_con">
    <form method="post" action="mail.php">
     <table class="formTable">

<form method="post" action="test.html">
<tr>

<h1 class="midasi">会員登録</h1>
<br>
<br>
    
<th><p>名前</p></th>
<td><input type="text" maxlength="100" placeholder="斎藤グルミ" id="name" class="wide" name="お名前" size="20"></td>
</tr>

<tr>
<th><p>名前(ふりがな)</p></th>
<td><input type="text" maxlength="200" placeholder="さいとうぐるみ" id="name_huri" class="" size="30"></td>
</tr>

<tr>
<th><p>メールアドレス</p></th>
<td><input type="text" maxlength="254" placeholder="gourmmy@mail.com" id="mail" class="" size="30"></td>
</tr>

<tr>
<th><p>パスワード</p></th>
<td><input type="password" maxlength="20" placeholder="半角英数8文字以上" id="pass" class=""></td>
</tr>

<tr>
<th><p>パスワード再入力</p></th>
<td><input type="password" maxlength="20" placeholder="半角英数8文字以上" id="repass" class=""></td>
</tr>

<body>
<tr>
<th><p>郵便番号</p></th>
<td><input type="text" maxlength="7" placeholder="ハイフンなし" id="yuubin" name="yuubin" class="" onKeyUp="AjaxZip3.zip2addr(this,'','address','address');"></td>
</tr>

<tr>
<th><p>住所</p></th>
<td><input type="text" maxlength="200" id="address" name="address" size="60"></td>
</tr>
</body>

<tr>
<th><p>電話番号</p></th>
<td><input type="text" maxlength="21" placeholder="ハイフンなし" id="phone"></td>
</tr>

<tr>
<th><p>生年月日</p></th>
<td><input type="date" name="calendar" max="9999-12-31" id="birth"></td>
</tr>

<div class="center">
<th><p class="center"><input type="submit" value="会員登録を行う" id="touroku"></p></th>
</div>

</form>

<script>
    document.getElementById("touroku").onclick = function() {
        const name = document.getElementById("name").value;
        const name_huri = document.getElementById("name_huri").value;
        const mail = document.getElementById("mail").value;
        const pass = document.getElementById("pass").value;
        const repass = document.getElementById("repass").value;
        const yuubin = document.getElementById("yuubin").value;
        const address = document.getElementById("address").value;
        const phone = document.getElementById("phone").value;
        const birth = document.getElementById("birth").value;
    
        var flag = 0;
        if(name.length == 0){flag = 1;}
        if(name_huri.length == 0){ flag = 1; }
        if(mail.length == 0){ flag = 1; }
        if(pass.length == 0){ flag = 1; }
        if(repass.length == 0){ flag = 1; }
    
        if(flag == 1){ alert('必須項目が未記入の箇所があります'); }
        else{
            var regexp = /[一-龠]/;
            if(regexp.test(name) != true){ alert('名前が漢字になっていません'); }
    
            var regexp = /^[\u{3000}-\u{301C}\u{3041}-\u{3093}\u{309B}-\u{309E}]+$/mu;
            if(regexp.test(name_huri) != true){ alert('名前(ふりがな)がひらがなになっていません'); }
    
            var regexp = /^[A-Za-z0-9]{1}[A-Za-z0-9_.-]*@{1}[A-Za-z0-9_.-]{1,}\.[A-Za-z0-9]{1,}$/;
            if(regexp.test(mail) != true){ alert('メールアドレスが形式に沿っていません'); }
    
            var regexp = /^([a-zA-Z0-9]{8,})$/;
            if(regexp.test(pass) != true){ alert('パスワードが半角英数8文字以上になっていません'); }
            if(pass != repass){ alert('パスワードが再入力時と違っています'); }
    
            var regexp = /^\d{7}$/;
            if(regexp.test(yuubin) != true){ alert('郵便番号が7桁になっていません'); }
    
            var regexp = /^(0{1}\d{9,10})$/;
            if(regexp.test(phone) != true){ alert('電話番号が形式に沿っていません'); }
        }
    };
    </script>
</body>
</html>