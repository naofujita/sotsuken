<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>sample</title>
</head>

<body>

    <h2>お問合せ内容</h2>

    <form action="mailto.php" method="post">

        <table border="1">
            <tr>
                <td>お問い合わせ内容</td>
                <td><?php echo $_POST['other']; ?></td>
            </tr>
            <tr>
                <td>名前</td>
                <td><?php echo $_POST['name']; ?></td>
            </tr>
            <tr>
                <td>性別</td>
                <td><?php echo $_POST['gender']; ?></td>
            </tr>
            <tr>
                <td>電話番号</td>
                <td><?php echo $_POST['tel']; ?></td>
            </tr>
            <tr>
                <td>メールアドレス</td>
                <td><?php echo $_POST['email']; ?></td>
            </tr>
            
        </table>

        <input type="submit" value="送信" />
    </form>

</body>

</html>



$name = $_POST['gender'];
if ($gender == "man"){
  $gender = "男性";
}
else if ($gender == "woman"){
  $gender = "女性";
}
