<?php
session_start();
session_regenerate_id(true);

require_once('../com_func.php');

$post=sanitize($_POST);

$max=$post['max'];
for($i=0; $i<$max; $i++)
{
  if(preg_match("/^[0-9]+$/",$post['num'.$i])==0)
  {
    print '数量に誤りがあります。';
    print '<a href="item_cart.php">カートに戻る</a>';
    exit();
  }
  if($post['num'.$i]<1 || 100<$post['num'.$i])
  {
    print '数量は1個以上、100個までです。';
    print '<a href="item_cart.php">カートに戻る</a>';
    exit();
  }
  $num[]=$post['num'.$i];
}

$id=$_SESSION['id'];
$name=$_SESSION['name'];
$price=$_SESSION['price'];

for($i=$max; 0<=$i; $i--)
{
  if(isset($post['del'.$i])==true)
  {
    array_splice($id,$i,1);
    array_splice($name,$i,1);
    array_splice($price,$i,1);
    array_splice($num,$i,1);
  }
}
$_SESSION['id']=$id;
$_SESSION['name']=$name;
$_SESSION['price']=$price;
$_SESSION['num']=$num;
if(isset($post['cclear'])==true)
{
  unset($_SESSION['id']);
  unset($_SESSION['name']);
  unset($_SESSION['price']);
  unset($_SESSION['num']);
}
if(isset($post['back'])==true)
{
  header('Location: ../items/item_list.html');
}
else if(isset($post['next'])==true)
{
  if(count($id)==0){
    header('Location: item_cart.php');
  }else{
    header('Location: inputinfo.html');
  }
}
else
{
  header('Location: item_cart.php');
}
?>