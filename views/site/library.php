<?php
use yii\helpers\Html;
use yii\widgets\LinkPager;
?>
<h2>图书列表</h2>
<form action="http://localhost:8080/index.php?r=site/search" method="post">
<div class="form-group" style="display: inline-block">
    <label for="book">书名</label>
    <input style="width: 250px; display: inline-block" name="book" type="text" class="form-control" id="book" placeholder="请输入书名">
    <label for="auther">作者</label>
    <input style="width: 250px; display: inline-block" name="auther" type="text" class="form-control" id="auther" placeholder="请输入作者">
</div>
<button class="btn btn-primary" type="submit">查询</button>
</form>
<table class="table table-striped table-bordered">
  <thead style="background-color: #337ab7;color: #fff">
    <tr>
      <th scope="col">出版号</th>
      <th scope="col">书名</th>
      <th scope="col">作者</th>
      <th scope="col">出版时间</th>
      <th scope="col">出版社</th>
      <th scope="col">操作</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($books as $book): ?>
        <tr>
            <td><?= Html::encode("{$book->id}") ?></td>
            <td><?= Html::encode("{$book->book}") ?></td>
            <td><?= Html::encode("{$book->auther}") ?></td>
            <td><?= Html::encode("{$book->date}") ?></td>
            <td><?= Html::encode("{$book->publish}") ?></td>
            <td>
                <button class="btn btn-default" style="margin-right: 5px"><?= Html::encode("编辑") ?></button>
                <a href='<?=Yii::$app->urlManager->createUrl(['site/delete','id'=>$book->id])?>' class="btn btn-danger"><?= Html::encode("删除") ?></a>
            </td>
        </tr>
        <!-- <li>
            <?= Html::encode("{$book->id} ({$book->book})") ?>:
            <?= $book->publish ?>
        </li> -->
    <?php endforeach; ?>
  </tbody>
</table>
<div>
    <button class="btn btn-primary"><a style="color: #fff;text-decoration: none;" href="http://localhost:8080/index.php?r=site/login">添加图书</a></button>
</div>
<?= LinkPager::widget(['pagination' => $pagination]) ?>
<style>
.table > tbody > tr > td{
    vertical-align: middle;
}
</style>
<!-- <script>
    function Car(color, price) {
        this.color = color;
        this.price = price;
    }
    Car.prototype.sell = function () {
        alert( `将${this.color}的C车车买卖了小李价格是${this.price}万。`)
    }
    var Cruze = function (color, price) {
        Car.call(this, color, price)
    }
    var __proto = Object.create(Car.prototype)
    Cruze.prototype = __proto
    Cruze.prototype.constructor = Cruze
    Cruze.prototype.sell = function () {
        alert( `将${this.color}的Cruze买给了小王价格是${this.price}万。`)
    }
    var x = new Cruze('蓝', '16')
    var y = new Car('红', '14')
    x.sell()
    y.sell()


    class Car {
        constructor(color,price) {
            this.color = color
            this.price = price
        }
        sell() {
            alert( `将${this.color}的Cruze买卖了小李价格是${this.price}万。`)
        }
    }
    class Cruze extends Car {
        constructor(color,price) {
            super(color,price)
        }
        sell() {
            super.sell()
        }
    }
    var x = new Cruze('蓝', '16')
    x.sell()

this.a = 20;
var test = {
    a: 40, 
    init:()=> {
        console.log(this.a); 
        function go() {
            this.a = 60;
            console.log(this.a); 
        }
        go.prototype.a = 50;
        return go;  
    }
};
var p = test.init();
p();
new(test.init())();
</script> -->