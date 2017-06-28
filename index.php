<?php
require('dbconnect.php');
$page = $_REQUEST['page'];
if ($page == '') {
  $page = 1;
}
$page = max($page, 1);
// 最終ページを取得する
$sql = 'SELECT COUNT(*) AS cnt FROM my_items';
$recordSet = mysqli_query($db, $sql);
$table = mysqli_fetch_assoc($recordSet);
$maxPage = ceil($table['cnt'] / 5);
$page = min($page, $maxPage);
$start = ($page - 1) * 5;
$recordSet = mysqli_query($db , 'SELECT m.name, i.* FROM makers m, my_items i WHERE m.id=i.maker_id ORDER BY id DESC LIMIT ' . $start . ',5');
// $db = mysqli_connect('localhost', 'root', 'root', 'mydb') or
// die(mysqli_connect_error());
// mysqli_set_charset($db, 'utf8');
// $recordSet = mysqli_query($db, 'SELECT m.name, i.* FROM makers m, my_items i WHERE m.id=i.maker_id ORDER BY id DESC');
// $recordSet = mysqli_query($db, 'SELECT * FROM my_items ORDER BY id DESC');
// $recordSet = mysqli_query($db, 'SELECT * FROM my_items');
// $recordSet = mysqli_query($db, 'SELECT m.name, i. * FROM makers m, my_items i WHERE m.id=i.maker_id ORDER BY id DESC LIMIT  5');
// $data = mysqli_fetch_assoc($recordSet);
// echo $data['item_name'];
// いちごが取り出せる
// $data = mysqli_fetch_assoc($recordSet);
// echo '<br />' . $data['item_name'];
// いちご、りんごが取り出せる
// while ($data = mysqli_fetch_assoc($recordSet)) {
//   echo $data['item_name'];
//   echo '<br />';
// }
// テーブルないの全件のデータを取り出す
// mysqli_query($db, 'INSERT INTO my_items SET maker_id=1, item_name="もも", price=210, keyword="缶詰,ピンク,甘い", sales=0, created="2010-08-01", modified="2010-08-01"') or die(mysqli_error($db));
// echo 'データを挿入しました';
?>
 <!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>shop</title>
  <link rel="stylesheet" type="text/css" href="index.css">
</head>
<body>
<h1>果物商品管理</h1>
<p><a href="input.php">新しい商品を登録する</a></p>
<table class="fruittable" width="100%">
<tbody>
  <tr>
    <th scope="col">ID</th>
    <th scope="col">メーカー</th>
    <th scope="col">商品名</th>
    <th scope="col">価格</th>
    <th scope="col">キーワード</th>
    <th scope="col">編集・削除</th>
  </tr>
<?php
  while ($table = mysqli_fetch_assoc($recordSet)) {
?>
  <tr>
    <td><?php print(htmlspecialchars($table['id'])); ?></td>
    <td><?php print(htmlspecialchars($table['name'])); ?></td>
    <td><?php print(htmlspecialchars($table['item_name'])); ?></td>
    <td><?php print(htmlspecialchars($table['price'])); ?></td>
    <td><?php print(htmlspecialchars($table['keyword'])); ?></td>
    <td><a href="update.php?id=<?php print(htmlspecialchars($table['id'])); ?>">編集</a> <a href="delete.php?id=<?php print(htmlspecialchars($table['id'])); ?>" onclick="return confirm('削除してもよろしいですか？');">削除</a></td>
  </tr>
<?php
}
?>
</tbody>
</table>
<ul class="paging">
<?php
if ($page > 1) {
?>
<li><a href="index.php?page=<?php print($page - 1); ?>">前のページへ</a></li>
<?php
} else {
?>
<li>前のページへ</li>
<?php
}
?>
<?php
if ($page < $maxPage){
?>
<li><a href="index.php?page=<?php print($page + 1); ?>">次のページへ</a></li>
<?php
} else {
?>
<li>次のページへ</li>
<?php
}
?>
<li><a href="index.php">最初のページへ</a></li>
</ul>
</body>
</html>

