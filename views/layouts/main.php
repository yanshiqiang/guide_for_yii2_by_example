<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use yii\widgets\Menu;

AppAsset::register($this);
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
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => 'My Company',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
   
    NavBar::end();
    ?>
    
	
	
	<div class="container">
	   <?= Breadcrumbs::widget([
		   'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
	   ]) ?>
	   <div class="col-sm-2">
	      <?php
			echo Menu::widget([
						'items' => [
								['label' => 'Home', 'url' => ['site/index']],
								['label' => '性别', 'url' => ['site/gender']],
								['label' => '年龄', 'url' => ['site/age']],
								['label' => '省市', 'url' => ['site/area']],
								['label' => '年级', 'url' => ['site/grade']],
								['label' => '专业', 'url' => ['site/major']],
								['label' => '校园网', 'url' => ['site/net']],
								['label' => '校园无线网', 'url' => ['site/wlan']],
								['label' => '年消费分布', 'url' => ['site/purchase']],
								['label' => '生日分布', 'url' => ['site/birthday']],
								['label' => '校友分布', 'url' => ['site/alumnus']],
								['label' => '星座', 'url' => ['site/constellation']],
							],
						'activeCssClass'=>'activeclass',
			]);
		?>
	   </div>
	   <div class="col-sm-10">
			<?= $content ?>
	  </div>
	</div>
	
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; My Company <?= date('Y') ?></p>

        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
