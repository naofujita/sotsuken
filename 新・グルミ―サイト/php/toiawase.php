<!doctype html>
<html lang="ja">
<head>
<meta charset="utf-8">
<title>お問い合せ</title>
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
				<li><a href="./login.php">サインイン</a></li>
           </ul>
         </nav>
        </header>
        

<br>
<br>
<br>

<h1 class="midasi">お問い合せ</h1>
<br>
<br>

<div class="box_con02">
    <form  action="php/index.php" method="post">
    <table class="formTable">
     
      <tr>
        <th>お問い合わせの種類<span>必須</span></th>
        <td>
             <div class="box_br">
                <label>
                    <input type="radio" name="contact" value="テキスト1">
                   注文について
                </label>
            </div>
            <div class="box_br">
                <label>
                    <input type="radio" name="contact" value="テキスト2">
                    配達について
                </label>
                <div class="box_br">
                    <label>
                        <input type="radio" name="contact" value="テキスト2">
                        決済について
                    </label>
                    <div class="box_br">
                        <label>
                            <input type="radio" name="contact" value="テキスト2">
                            その他
                        </label>
                    </div>
                </div>
            </div>
        </td>
    </tr>
      <tr>
        <th>お問い合わせ内容 <span>必須</span><br /></th>
        <td><textarea name="comment" cols="50" rows="5" placeholder="メッセージを記入してください。" required/> </textarea>  </td>
      </tr>
      <!--」<tr>
        <th>ご用件</th>
        <td><select name="ご用件">
            <option value="">選択してください</option>
            <option value="ご質問・お問い合わせ">ご質問・お問い合わせ</option>
            <option value="リンクについて">リンクについて</option>
          </select></td>
      </tr>「-->
      
      <tr>
        <th>お名前<span>必須</span></th>
        <td><input size="20" type="text" class="wide" name="name"  placeholder="例）斎藤　ぐるみ" required/></td>
      </tr>
      <tr>
        <th>性別<span>必須</span></th>
        <td>
             <div class="box_br">
                 <label>
                   <input type="radio" name="gender" value="man" required> 男性
                </label>
            </div>
            <div class="box_br">
                <label>
                    <input type="radio" name="gender" value="woman" required> 女性
                 </label>
            </div>
        </td>
      </tr>
      <tr>
        <th>電話番号（半角）</th>
        <td><input size="30" type="text" class="wide" name="tel" placeholder="例）090-1234-5678"> </td>
      </tr>
      <tr>
        <th>Mail（半角）<span>必須</span></th>
        <td><input size="30" type="text" class="wide" name="email" placeholder="例）gourmmy@harapeko.com" required /></td>
      </tr>
      
    </table>
    <div class="con_pri">
        <div class="box_pri">
            <div class="box_tori">
                <h4>プライバシー</h4>
                <p class="txt">当サイトの運営に際し、お客様のプライバシーを尊重し個人情報に対して十分な配慮を行うとともに、大切に保護し、適正な管理を行うことに努めております。
            </p>
            </div>
            <div class="box_num">
                <h4>個人情報の利用目的</h4>
                <p class="txt">　a) お客様のご要望に合わせたサービスをご提供するための　　　各種ご連絡。<br>
                    　b) お問い合わせいただいたご質問への回答のご連絡。</p>
            </div>
            <div class="box_num">
                <h4>個人情報の安全管理措置について </h4>
                <p class="txt">取得した個人情報については、漏えい、減失またはき損の防止と是正、その他個人情報の安全管理のために必要かつ適切な措置を講じます。
                    お問い合わせへの回答後、取得した個人情報は当社内において削除いたします。</p>
            </div>
            <div class="box_num">
                <h4>個人情報に関する苦情及び相談について</h4>
                <p class="txt">個人情報に関する苦情及び相談には、速やかに対処します。</p>
            </div>
        </div>
    </div>
    <div class="box_check">
        <label>
            <input type="checkbox" name="acceptance-714" value="1" aria-invalid="false" class="agree" id="agree" onclick="getUserAccept()"><span class="check">プライバシーポリシーに同意する</span>
        </label>
    </div>
    <p class="btn">
        <span><a href="php/index.php"></a><input type="submit" value="確認" disabled id="subm" /></span>
    </p>
  </form>
</div>

</body>
<script lang="text/javascript">
  var check = document.getElementById("agree");
  function getUserAccept(){
    var submit = document.getElementById("subm");
    if(check.checked){
        submit.disabled = false;
    }else{
        submit.disabled = true;
    }
  }
</script>
</html>