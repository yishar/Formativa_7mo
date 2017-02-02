<?php

/* @var $this yii\web\View */
$this->title ='SisHNA - PUCESE';

use yii\helpers\Html;
?>
<div class="site-index">

    <center> 
         <!--<img src="../frontend/assets/logo-puce-2016-01.jpg" border="0" width=60% height=50%>--> 
         <?php 
         echo Html::img(Yii::$app->homeUrl.'../assets/logo-puce-2016-01.jpg',['alt'=>'Logo PUCE','width'=>1000,'height'=>400]);
         ?>
          
    </center>

</div>
