<?php
// $db = mysqli_connect('localhost', 'root', '', 'mydb')ot die(mysqli_connect_error());
// mysqli_set_charset($db, 'utf8');

require('dbconnect.php');
$sql = sprintf('INSERT INTO my_items SET maker_id=%d, item_name="%s", price=%d, keyword="%s"',
mysqli_real_escape_string($db, $_POST['maker_id']),
mysqli_real_escape_string($db, $_POST['item_name']),
mysqli_real_escape_string($db, $_POST['price']),
mysqli_real_escape_string($db, $_POST['keyword'])
);
mysqli_query($db, $sql) or die(mysqli_error($db));
?>

<p>商品を登録しました</p>
<p><a href="index.php">一覧に戻る</a></p>