<p>登録する消費の情報を記入してください</p>
<form id="frmInput" name="frmInput" method="post" action="input_do.php">
  <dl>
    <dt>
      <label for="maker_id">メーカーID</label>
    </dt>
    <dd>
      <input name="maker_id" type="text" id="maker_id" size="10" maxlength="10"/>
    </dd>

    <dt>
      <label for="item_name">商品名</label>
    </dt>
    <dd>
      <input name="item_name" type="text" id="item_name" size="35" maxlength="255"/>
    </dd>

    <dt>
      <label for="price">価格</label>
    </dt>
    <dd>
      <input name="price" type="text" id="price" size="10" maxlength="10"/>
    </dd>

    <dt>
      <label for="keyword">キーワード</label>
    </dt>
    <dd>
      <input name="keyword" type="text" id="keyword" size="50" maxlength="255"/>
    </dd>
  </dl>
  <input type="submit" value="送信する" />
</form>

<!-- NOT Found　になる -->