<?php
use yii\helpers\Html;
use yii\widgets\LinkPager;
?>
<h2>图书管理系统</h2>
<form action="http://localhost:8080/index.php?r=site/library" method="post">
<div class="form-group" style="display: inline-block">
    <label for="book">书名</label>
    <input style="width: 250px; display: inline-block" name="book" type="text" class="form-control" id="book" placeholder="请输入书名">
    <label for="auther">作者</label>
    <input style="width: 250px; display: inline-block" name="auther" type="text" class="form-control" id="auther" placeholder="请输入作者">
</div>
<button class="btn btn-primary">查询</button>
</form>
<?= Yii::$app->getRequest()->post() ?>
<table class="table table-striped table-dark">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">First</th>
      <th scope="col">Last</th>
      <th scope="col">Handle</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td>Mark</td>
      <td>Otto</td>
      <td>@mdo</td>
    </tr>
    <tr>
      <th scope="row">2</th>
      <td>Jacob</td>
      <td>Thornton</td>
      <td>@fat</td>
    </tr>
    <tr>
      <th scope="row">3</th>
      <td>Larry</td>
      <td>the Bird</td>
      <td>@twitter</td>
    </tr>
  </tbody>
</table>
<ul>
    <?php foreach ($books as $book): ?>
        <li>
            <?= Html::encode("{$book->id} ({$book->book})") ?>:
            <?= $book->publish ?>
        </li>
    <?php endforeach; ?>
</ul>
<div>
    <button class="btn btn-primary"><a style="color: #fff;text-decoration: none;" href="http://localhost:8080/index.php?r=site/login">添加图书</a></button>
</div>
<?= LinkPager::widget(['pagination' => $pagination]) ?>