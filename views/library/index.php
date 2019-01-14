<?php
/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */
use yii\helpers\Url;
use yii\helpers\Html;
// use common\helps\Helps;
// use common\helps\ArrayHelper;
use yii\grid\GridView;
use yii\grid\ActionColumn;
// use app\models\User;
use yii\widgets\ActiveForm;
//use yii\bootstrap\ActiveForm;
?>

<?php 
//gridview最外层加入表单，方便全选提交,会影响下拉筛选，如果没有下拉筛选可以用
//    $form=ActiveForm::begin([
//        'id'=>'Form',
//        'enableClientValidation'=>false, 
//        'action'=>'javscript:;'
//    ]);
?>
<div class="row">
    <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">图书管理平台</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive">   
             <?php
                    echo GridView::widget([
                        'dataProvider' => $dataProvider,
                        'columns' => [
                            ['class' => 'yii\grid\SerialColumn'],
                            // 数据提供者中所含数据所定义的简单的列
                            // 使用的是模型的列的数据
                            'id',
                            'name',
                            'phone',
                            // 更复杂的列数据
                            [
                                'class' => ActionColumn::className(),
                                'header' => '操作',
                                'headerOptions' => ['width' => '250'],
                                'template'=>'{get} {yes} {no} {update} {delete}',
                                'buttons' => [
                                    'update' => function ($url, $model, $key) {
                                        $str = '';
                                        $str = Html::a('<button type="button" class="btn btn-primary">编辑</button>', Url::to(['library/edit','id'=>$model->id]));
                                        return $str;
                                    },
                                    'delete' => function ($url, $model, $key) {
                                        return "<a href='javascript:;' class='btn btn-danger _delete' data-url='".Yii::$app->urlManager->createUrl(['/library/delete_js','id'=>$model->id])."'>删除</a>";
                                    },
                                ],
                            ],  
                        ],
                     ]);
                    ?>
          <!-- /.box -->
    </div>
</div>
<?php     //ActiveForm::end();   ?>    
<style>
    .select_bg{ background:BCC8D0;  }
    .table > tbody > tr > td{vertical-align: middle;}
</style>
<script>
     $("input[name='selection[]']").addClass("_check");
     //选中改变颜色
     $("._check").click(function(){
         var id=$(this).val();
         console.log(id);
         if($("#tr-"+id).hasClass("select_bg")){
            $("#tr-"+id).removeClass("select_bg");    
         }else{
            //$("#tr-"+id).css("background-color",'red');
            $("#tr-"+id).addClass("select_bg");
         }   
     });
     $("._delete").click(function(){
         var url=$(this).attr('data-url');
         console.log(url);
         $.getJSON(url,{},function(d){
            if(d.done==true){
                alert('删除成功');
                window.location.href="<?=Url::to(['library/index'])?>";
            }else{
                alert(d.error);
            } 
         });
    });
    $("._delete_all").click(function(){
        var many_check=$("input[name='selection[]']:checked");
        var ids="";
        $(many_check).each(function(){
            ids+=this.value+',';                       
        });
        //去掉最后一个逗号
        if (ids.length > 0) {
            ids = ids.substr(0, ids.length - 1);
        }else{
            alert('请选择至少一条记录！'); return false;
        }
        var url=$(this).attr('data-url');
        $.post(url,{ids},function(d){
            console.log(d);
            if(d.done==true){
                console.log(1);
                alert('删除成功！');
                window.location.href="<?=Url::to(['library/index'])?>";
            }else{
                alert(d.error);
            } 
        },'json');
    });
</script>