<?php
use app\assets\HighchartAsset;
HighchartAsset::register($this);
?>
<?php

/* @var $this yii\web\View */

$this->title = '男女比例';
?>
<div class="statics">

      <div class="body-content">
			
			<?php
				echo $jsondata;
			?>
      
    </div>
</div>