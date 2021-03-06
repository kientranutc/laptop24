<?php

/* @var $this \yii\web\View */
/* @var $content string */

use backend\assets\AppAsset;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use common\widgets\Alert;
use backend\widgets\orderday;
use yii\web\Session;
use   yii\helpers\Url;

AppAsset::register($this);
$Url = str_replace("/backend", "", Yii::$app->urlManager->baseUrl);
$session = new Session;


?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
  <meta charset="<?= Yii::$app->charset ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <?= Html::csrfMetaTags() ?>
  <title><?= Html::encode($this->title) ?></title>
  <?php $this->head() ?>
</head>
<body onload="myFunction()">

  <?php $this->beginBody() ?>
 
    <div id="wrapper">

      <!-- Navigation -->
      <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="<?= Yii::$app->homeUrl; ?>">Quản lý bán hàng</a>
        </div>
        <!-- Top Menu Items -->
        <ul class="nav navbar-right top-nav" id="notification">
          
          <li id="tb">
            <div id="thongbao"><?=orderday::widget() ?></div>
            <a href="<?=Yii::$app->getUrlManager()->getBaseUrl()?>/hoadon?current=<?php echo date('Y-m-d'); ?>"><i class="fa fa-bell"></i></a>
            
          </li>
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php if(isset(Yii::$app->user->identity->username)){echo Yii::$app->user->identity->username; }else{echo "";} ?> <b class="caret"></b></a>
            <ul class="dropdown-menu">

              <li>
                <a href="#"><i class="fa fa-fw fa-gear"></i> Settings</a>
              </li>
              <li class="divider"></li>
              
              <?php 
              if (!Yii::$app->user->isGuest)
              {
                ?>
                <li>
                 <?=Html::beginForm(['/site/logout'], 'post')?>
                 <?= Html::submitButton('Logout('.Yii::$app->user->identity->username.')',['class' => 'btn btn-link'])?>
                 <?=Html::endForm()?>
               </li>   
               <?php
             }
             else
             {
              
              
             }
             ?>                       
           </ul>
         </li>
       </ul>
       <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
       <div class="collapse navbar-collapse navbar-ex1-collapse">
        <ul class="nav navbar-nav side-nav">
          <li class="active">
            <a href="<?= Yii::$app->homeUrl; ?>"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
          </li>
          
          <li>
            <a href="<?=Yii::$app->getUrlManager()->getBaseUrl()?>/menu"><i class="fa fa-fw fa-table"></i>Menu</a>
          </li>
          <li>
           
          </li>
          <li>
           <a href="javascript:void(0)" data-toggle="collapse" data-target="#demo" ><i class="fa fa-fw fa-edit"></i>Quản Lý sản Phẩm</a>
           <ul id="demo" class="collapse">
            <li>
              <a href="<?=Yii::$app->getUrlManager()->getBaseUrl()?>/loaisanpham">Loại sản Phẩm</a>
            </li>
            <li>
              <a href="<?=Yii::$app->getUrlManager()->getBaseUrl()?>/sanpham">Sản Phẩm</a>
            </li>
            <li>
              <a href="<?=Yii::$app->getUrlManager()->getBaseUrl()?>/thuoctinh">Thuộc tính Sản Phẩm</a>
            </li>
            
          </ul>
        </li>
        <li>
          <a href="<?=Yii::$app->getUrlManager()->getBaseUrl()?>/tintuc"><i class="fa fa-newspaper-o" aria-hidden="true"></i> Tin tức</a>
        </li>
        <li>
          <a href="<?=Yii::$app->getUrlManager()->getBaseUrl()?>/lienhe"><i class="fa fa-fw fa-table"></i>Liên hệ</a>
        </li>
        <li>
         <a href="javascript:void(0)" data-toggle="collapse" data-target="#demo3" ><i class="fa fa-fw fa-edit"></i>Quản Lý Thanh Toán</a>
         <ul id="demo3" class="collapse">
          <li>
            <a href="<?=Yii::$app->getUrlManager()->getBaseUrl()?>/thanhtoan">Hình thức thanh toán</a>
          </li>
          <li>
            <a href="<?=Yii::$app->getUrlManager()->getBaseUrl()?>/vanchuyen">Hình thức vận chuyển</a>
          </li>

        </ul>
      </li>
      <li>
        <a href="<?=Yii::$app->getUrlManager()->getBaseUrl()?>/khoanggia"><i class="fa fa-fw fa-table"></i>Khoảng giá</a>
      </li>
       <li>
           <a href="javascript:void(0)" data-toggle="collapse" data-target="#baocao" ><i class="fa fa-fw fa-edit"></i>Báo cáo, thống kê</a>
           <ul id="baocao" class="collapse">
            <li>
              <a href="<?=Yii::$app->getUrlManager()->getBaseUrl()?>/baocao">Sản phẩm không bán được</a>
            </li>
            <li>
              <a href="<?=Yii::$app->getUrlManager()->getBaseUrl()?>/doanh-thu">Doanh thu</a>
            </li>
              <li>
              <a href="<?=Yii::$app->getUrlManager()->getBaseUrl()?>/san-pham-ban-chay">Top 20 sản phẩm bán chạy</a>
            </li>
           
            
          </ul>
        </li>
      
    </ul>
  </div>
  <!-- /.navbar-collapse -->
</nav>

<div id="page-wrapper">

  <div class="container-fluid">
    <?= Breadcrumbs::widget([
      'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
      ]) ?>
      <?= Alert::widget() ?>
      <?php
      
      if(!isset($session['login'] ))
      { 

        Yii::$app->user->logout();
        return Yii::$app->getResponse()->redirect(['/site/login']);

      }
      ?>
      <?= $content?>

    </div>
    <!-- /.container-fluid -->

  </div>
  <!-- /#page-wrapper -->
  <div class="modal fade" id="modallsp" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content" style="width: 900px;">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
          <h4 class="modal-title" id="myModalLabel">Loại sản phẩm</h4>
        </div>
        <div class="modal-body">
          <iframe  width="100%" height="550" frameborder="0" src="<?php echo $Url ?>/filemanager/dialog.php?type=1&field_id=imglsp">
          </iframe>
        </div>
      </div>
    </div>
  </div>


  <!-- modal tin tuc -->
  <div class="modal fade" id="modalnews" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content" style="width: 900px;">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
          <h4 class="modal-title" id="myModalLabel">Tin Tức</h4>
        </div>
        <div class="modal-body">
          <iframe  width="100%" height="550" frameborder="0" src="<?php echo $Url ?>/filemanager/dialog.php?type=1&field_id=ImgNews">
          </iframe>
        </div>
      </div>
    </div>
  </div>
  <!-- sanpham -->
  <div class="modal fade" id="modalimagesp" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content" style="width: 900px;">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
          <h4 class="modal-title" id="myModalLabel">Sản phẩm</h4>
        </div>
        <div class="modal-body">
          <iframe  width="100%" height="550" frameborder="0" src="<?php echo $Url ?>/filemanager/dialog.php?type=1&field_id=image">
          </iframe>
        </div>
      </div>
    </div>
  </div>

  <!--  -->
  <div class="modal fade" id="modalsmallimage" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content" style="width: 900px;">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
          <h4 class="modal-title" id="myModalLabel">Sản phẩm</h4>
        </div>
        <div class="modal-body">
          <iframe  width="100%" height="550" frameborder="0" src="<?php echo $Url ?>/filemanager/dialog.php?type=1&field_id=smallimage">
          </iframe>
        </div>
      </div>
    </div>
  </div>
<!-- 
-->
<div class="modal fade" id="modalmediumimage" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content" style="width: 900px;">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">Sản phẩm</h4>
      </div>
      <div class="modal-body">
        <iframe  width="100%" height="550" frameborder="0" src="<?php echo $Url ?>/filemanager/dialog.php?type=1&field_id=mediumimage">
        </iframe>
      </div>
    </div>
  </div>
</div>
<!--  -->
<div class="modal fade" id="modallargeimage" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content" style="width: 900px;">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">Sản phẩm</h4>
      </div>
      <div class="modal-body">
        <iframe  width="100%" height="550" frameborder="0" src="<?php echo $Url ?>/filemanager/dialog.php?type=1&field_id=largeimage">
        </iframe>
      </div>
    </div>
  </div>
</div> 
</div>
<script>
var url="<?=Url::current()?>";
function myFunction() {
    setInterval(function(){
      $("#thongbao").load(url+" #thongbao");
     }, 5000);
}
</script>

<?php $this->endBody() ?>

</body>
</html>
<?php $this->endPage() ?>
