<?php
require('dbconnect.php');

$id = $_REQUEST['id'];
$sql = sprintf("SELECT * FROM my_items WHERE id=%d",mysqli_real_escape_string($db, $id)
  );
$recordSet = mysqli_query($db, $sql);
$data = mysqli_fetch_assoc($recordSet);
?>
<p>変更する消費の情報を記入してください</p>
<form id="frmUpdate" name="frmIpdate" method="post" action="update_do.php">
  <dl>
    <dt>
      <label for="maker_id">メーカーID</label>
    </dt>
    <dd>
      <input name="maker_id" type="text" id="maker_id" size="10" maxlength="10" value="<?php print(htmlspecialchars($data['maker_id'], ENT_QUOTES)); ?>" />
    </dd>

    <dt>
      <label for="item_name">商品名</label>
    </dt>
    <dd>
      <input name="item_name" type="text" id="item_name" size="35" maxlength="255" value="<?php print(htmlspecialchars($data['item_name'], ENT_QUOTES)); ?>" />
    </dd>

    <dt>
      <label for="price">価格</label>
    </dt>
    <dd>
      <input name="price" type="text" id="price" size="10" maxlength="10" value="<?php print(htmlspecialchars($data['price'], ENT_QUOTES)); ?>" />
    </dd>

    <dt>
      <label for="keyword">キーワード</label>
    </dt>
    <dd>
      <input name="keyword" type="text" id="keyword" size="50" maxlength="255" value="<?php print(htmlspecialchars($data['keyword'], ENT_QUOTES)) ?>" />
    </dd>
  </dl>
  <input type="submit" value="変更する" />
  <input type="hidden" name="id" value="<?php print(htmlspecialchars($data['id'], ENT_QUOTES)) ?>">
</form>



<!--   <input name="keyword" type="text" id="keyword" size="50" maxlength="255" value="<?php print(htmlspecialchars($data['keyword'], ENT_QUOTES));←これつけないの？ ?>" /> 
セミコロンつけないの？
-->

