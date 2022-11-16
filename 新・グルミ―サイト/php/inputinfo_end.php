<?php
session_start();
session_regenerate_id(true);
?>
<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="../fshopstyle.css">
    <title>グルミー顧客情報入力完了</title>
  </head>
  <body>
    <main>
      <section class="txtbox">
<div style="text-align: center;">
  <ul class="cartflow">
    <li>カート</li>
    <li>情報入力</li>
    <li>入力確認</li>
    <li class="choice">注文確定</li>
  </ul>
</div>
<?php
require_once('../com_func.php');
$post=sanitize($_POST);
$cname=$post['cname'];
$email=$post['email'];
$postal=$post['postal'];
$address=$post['address'];
$tel=$post['tel'];
$note=$post['note'];
print $cname.' 様<br>';
print 'ご注文ありがとうございました。<br>';
print $email.' 宛に自動返信メールを送りましたのでご確認ください。<br>';
print 'ご注文いただいた商品は以下の住所に発送させていただきます。<br><br>';
print '入力された内容は以下の通りです。<br>';
$replymail='';
$replymail.=$cname." 様\n\nこのたびはご注文ありがとうございました。\n";
$replymail.="\n";
$replymail.="入力された内容は以下の通りです。\n";
$replymail.="備考：".$note."\n";
$replymail.="注文日時：".$date_time_disp."\n";
$replymail.="\n";
$replymail.="ご注文商品\n";
$replymail.="**************************\n";

$id=$_SESSION['id'];
$name=$_SESSION['name'];
$price=$_SESSION['price'];
$num=$_SESSION['num'];
$max=count($id);
print '<h4>ご注文商品内容</h4>';
print '<table><tr>';
print '<td>No.</td><td>商品名</td><td>価格</td>';
print '<td>数量</td><td>小計</td></tr>';
$sum=0; $sub=0;
for($i=0; $i<$max; $i++)
{
  $i1=$i+1;
  print '<tr><td>'.$i1.'</td><td>'.$name[$i].'</td>';
  print '<td class="right">'.number_format($price[$i]).'</td>';
  print '<td class="right">'.$num[$i].'</td>';
  $sub=$price[$i] * $num[$i];
  $sum += $sub;
  print '<td class="right">'.number_format($sub).'</td></tr>';
  $replymail.='No.'.$i1."\n";
  $replymail.='商品名：'.$name[$i]."\n";
  $replymail.='価格：'.number_format($price[$i])." 円\n";
  $replymail.='数量：'.$num[$i]."\n";
  $replymail.='小計：'.number_format($sub)." 円\n\n";
}
print '<tr><td colspan="4" class="right">合　計</td>';
print '<td class="right">'.number_format($sum).'</td></tr>';
print '<tr><td colspan="4" class="right">消費税</td>';
print '<td class="right">'.number_format($sum * 0.1).'</td></tr>';
print '<tr><td colspan="4" class="right">合計金額</td>';
print '<td class="right">'.number_format($sum * 1.1).'</td></tr>';
print '</table>';
$replymail.="合計：".number_format($sum)." 円\n";
$replymail.="消費税：".number_format($sum * 0.1)." 円\n";
$replymail.="税込金額：".number_format($sum * 1.1)." 円\n\n";
$replymail.="送料は別途かかります。\n";
$replymail.="**************************\n";
$replymail.="\n";
$replymail.="--------------------------\n";
$replymail.="　グルミー\n";
$replymail.="\n";
$replymail.="住所：〇〇〇〇〇〇〇〇〇〇〇〇〇\n";
$replymail.="電話：〇〇-〇〇〇-〇〇〇〇\n";
$replymail.="メール：〇〇@〇〇〇〇〇.com\n";
$replymail.="--------------------------\n";
print '<br>';

$title='ご注文ありがとうございます。';
$header='From:〇〇@〇〇〇〇〇.com';
$mail1=html_entity_decode($replymail,ENT_QUOTES,'UTF-8');
mb_language('Japanese');
mb_internal_encoding('UTF-8');
//mb_send_mail($email,$title,$mail1,$header);

$title='お客様からおご注文がありました。';
$header='From:'.$email;
$mail1=html_entity_decode($replymail,ENT_QUOTES,'UTF-8');
mb_language('Japanese');
mb_internal_encoding('UTF-8');
//mb_send_mail('〇〇@〇〇〇〇〇.com',$title,$mail1,$header);

unset($_SESSION['id']);
unset($_SESSION['name']);
unset($_SESSION['price']);
unset($_SESSION['num']);

?>
<br>
<button class="btn1a" onclick="location.href='../index.html'">トップページへ</button>
      </section>
    </main>
  </body>
</html>