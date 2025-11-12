<?php

use yii\widgets\Pjax;
use app\widgets\Card;
use app\widgets\leaderboard\Leaderboard;
use yii\widgets\ListView;
use yii\helpers\Html;

$this->_fluid = "-fluid";

$this->title = Yii::$app->sys->event_name . ' ' . \Yii::t('app', 'Leaderboards');
$this->_description = $this->title;
$this->_url = \yii\helpers\Url::to(['index'], 'https');

?>
<div class="scoreboard-index">
  <div class="body-content">
    <h3><?= \Yii::t('app', 'Platform <code>most</code> rankings') ?></h3>
    <div class="row">
<?php if(\Yii::$app->sys->player_point_rankings):?>
      <div class="col">
        <?php
        Pjax::begin(['id' => 'playerScore-pjax', 'enablePushState' => false, 'linkSelector' => '#player-leaderboard-pager a', 'formSelector' => false]);
        echo ListView::widget([
          'id' => 'playerScore',
          'dataProvider' => $playerDataProvider,
          'emptyText' => '<div class="card-body"><b class="text-info">' . \Yii::t('app', 'No player ranks exist at the moment...') . '</b></div>',
          'pager' => [
            'options' => ['id' => 'player-leaderboard-pager'],
            'firstPageLabel' => '<i class="fas fa-step-backward"></i>',
            'lastPageLabel' => '<i class="fas fa-step-forward"></i>',
            'maxButtonCount' => 3,
            'linkOptions' => ['class' => ['page-link'], 'aria-label' => 'Pager link'],
            'disableCurrentPageButton' => true,
            'prevPageLabel' => '<i class="fas fa-chevron-left"></i>',
            'nextPageLabel' => '<i class="fas fa-chevron-right"></i>',
            'class' => 'yii\bootstrap4\LinkPager',
          ],
          'options' => ['class' => 'card'],
          'layout' => '{summary}<div class="card-body table-responsive">{items}</div><div class="card-footer">{pager}</div>',
          'summary' => '<div class="card-header card-header-score"><h4 class="card-title">' . \Yii::t('app', 'Player points') . '</h4><p class="card-category">' . \Yii::t('app', 'Individual player scores') . '</p></div>',
          'itemOptions' => [
            'tag' => false
          ],
          'itemView' => '_score',
          'viewParams' => [
            'totalPoints' => $totalPoints,
          ]
        ]);
        Pjax::end(); ?>
      </div>
<?php endif;?>
      
      
    
    </div>
  </div>
</div>