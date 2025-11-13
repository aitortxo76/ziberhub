<?php
use yii\helpers\Html;
use yii\widgets\ListView;
use app\widgets\Card;

$this->title = Html::encode(Yii::$app->sys->event_name . ' ' . \Yii::t('app','Networks'));
$this->_description = $this->title;
$this->loadLayoutOverrides = true;

// Ejemplo de datos para la card (puedes reemplazar $pageStats con tus propios datos)


?>
<div class="network-index">
  <div class="body-content">

    <!-- 🔹 Card superior -->
    <div class="row mb-4">
      <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
        <?php Card::begin([
            'header' => 'header-icon',
            'type' => 'card-stats',
            'icon' => '<i class="fa fa-flag"></i>',
            'color' => 'primary',
            'title' => $pageStats->totalTreasures,
            'subtitle' => \Yii::t('app','Flags'),
            'footer' => '<div class="stats">
                <i class="material-icons text-danger">flag</i>' .
                $pageStats->ownClaims . ' ' . \Yii::t('app','claimed by you') . '
              </div>',
        ]); Card::end(); ?>
      </div>

      <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
            <?php Card::begin([
                'header'=>'header-icon',
                'type'=>'card-stats',
                'icon'=>'<i class="fas fa-fingerprint"></i>',
                'color'=>'warning',
                'title'=>$pageStats->totalFindings,
                'subtitle'=>\Yii::t('app','Services'),
                'footer'=>'<div class="stats">
                        <i class="material-icons text-danger">track_changes</i> '.$pageStats->ownFinds.' '.\Yii::t('app','services found by you').'
                      </div>',
            ]);Card::end();?>
        </div>
        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
            <?php Card::begin([
                'header'=>'header-icon',
                'type'=>'card-stats',
                'icon'=>'<i class="fa fa-skull"></i>',
                'color'=>'danger',
                'title'=>$pageStats->totalHeadshots,
                'subtitle'=>\Yii::t('app','Headshots'),
                'footer'=>'<div class="stats">
                        <i class="material-icons text-danger">memory</i> '.$pageStats->ownHeadshots.' '.\Yii::t('app','headshots by you').'
                      </div>',
            ]);Card::end();?>
        </div>

        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
            <?php Card::begin([
                'header'=>'header-icon',
                'type'=>'card-stats',
                'icon'=>'<i class="fas fa-medal"></i>',
                'color'=>'info',
                'title'=>number_format($pageStats->totalPoints),
                'subtitle'=>\Yii::t('app','Points'),
                'footer'=>'<div class="stats">
                        <i class="material-icons text-danger">format_list_numbered</i> '.number_format(Yii::$app->user->identity->playerScore->points).' '.\Yii::t('app','yours').'
                      </div>',
            ]);Card::end();?>
        </div>

    </div>


    <!-- 🔹 Fin card superior -->

    <!-- <h2><?= Html::encode($this->title) ?></h2> -->
    <?= \Yii::t('app','Networks consist of multiple targets that are grouped together to represent more complicated setups or simply group a specific types of targets together.') ?>
    <hr />
    <div class="row network-listview">
      <?= ListView::widget([
          'dataProvider' => $dataProvider,
          'id' => 'network-listview',
          'emptyText' => '<p class="text-info"><b>' . \Yii::t('app','There are no networks available at the moment...') . '</b></p>',
          'summary' => false,
          'options' => ['tag' => false],
          'itemOptions' => ['tag' => false],
          'itemView' => '_network',
      ]); ?>
    </div>
  </div>
</div>
