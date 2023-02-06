<?php
session_start();
?>
<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/style.css">
    <title>ショッピングカート</title>
  </head>
  <body>
    <main>
      <section class="txtbox">
<?php
require_once('../com_func.php');
if(isset($_POST['id']))
{
  $post=sanitize($_POST);
  $p_id=$post['id'];
  $p_name=$post['name'];
  $p_price=$post['price'];
  $p_num=$post['num'];
  $flag1=false;
  if(isset($_SESSION['id'])==true)
  {
    $id=$_SESSION['id'];
    $name=$_SESSION['name'];
    $price=$_SESSION['price'];
    $num=$_SESSION['num'];
    if(in_array($p_id,$id)==true)
    {
      $alert = "<script type='text/javascript'>alert('その商品はすでにカートに入っています');</script>";
      print $alert;
      $flag1=true;
    }
  }
  if($flag1==false)
  {
    $id[]=$p_id;
    $name[]=$p_name;
    $price[]=$p_price;
    $num[]=$p_num;
    $_SESSION['id']=$id;
    $_SESSION['name']=$name;
    $_SESSION['price']=$price;
    $_SESSION['num']=$num;
  }
$max=count($id);
}
else
{
if(isset($_SESSION['id'])==false){
  $max=0;
}else{
  $id=$_SESSION['id'];
  $name=$_SESSION['name'];
  $price=$_SESSION['price'];
  $num=$_SESSION['num'];
  $max=count($id);
}
}
print '<h3>ショッピングカート</h3>';
print '<div style="text-align: center;">';
print '<ul class="cartflow">';
print '<li class="choice">カート</li>';
print '<li>情報入力</li>';
print '<li>入力確認</li>';
print '<li>注文確定</li></ul></div>';
print '<form method="post" action="change_num.php">';
print '<table><tr>';
print '<td>No.</td><td>商品名</td><td>価格</td><td>数量</td>';
print '<td>小計</td><td>削除</td></tr>';
if($max==0)
{
  print '<tr><td colspan="6">カートに商品が入っていません。</td></tr></table>';
  print '<a href="../items/item_list.html">商品一覧へ戻る</a>';
  exit();
}
$sum=0; $sub=0;
for($i=0; $i<$max; $i++)
{
  $i1=$i+1;
  print '<tr><td>'.$i1.'</td><td>'.$name[$i].'</td>';
  print '<td class="right">'.number_format($price[$i]).'</td>';
  print '<td><input type="text" name="num'.$i.'" style="width:30px;" value="'.$num[$i].'" class="right"></td>';
  $sub=$price[$i] * $num[$i];
  $sum += $sub;
  print '<td class="right">'.number_format($sub).'</td>';
  print '<td><input type="submit" name="del'.$i.'" value="削除" onClick="return confirm('."'削除してよろしいですか？');".'"></td></tr>';
}
print '<tr><td colspan="4" class="right">合　計</td>';
print '<td class="right">'.number_format($sum).'</td>';
print '<td></td></tr><tr>';
print '<td colspan="4" class="right">消費税</td>';
print '<td class="right">'.number_format($sum * 0.1).'</td>';
print '<td></td></tr><tr>';
print '<td colspan="4" class="right">合計金額</td>';
print '<td class="right">'.number_format($sum * 1.1).'</td>';
print '<td></td></tr></table>';
print '<input type="hidden" name="max" value="'.$max.'">';
print '<div class="btnright">';
print '<input class="btn3" type="submit" name="nchk" value="数量変更">';
print '<input class="btnr" type="submit" name="cclear" value="カートクリア" onClick="return confirm('."'カートクリアしますか？');".'">';
print '</div>';
print '<div class="btnbox">';
print '<input class="btn1" type="submit" name="back" value="商品一覧に戻る">';
print '<input class="btn2" type="submit" name="next" value="ご購入手続きへ">';
print '</div></form>';
?>
      </section>
    </main>
  </body>
</html>