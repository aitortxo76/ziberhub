<?php

namespace app\modules\network\models;

/**
 * This is the ActiveQuery class for [[Network]].
 *
 * @see Network
 */
class NetworkQuery extends \yii\db\ActiveQuery
{
    public function active()
    {
        return $this->andWhere('[[active]]=1');
    }

    public function public()
    {
        return $this->andWhere('[[public]]=1');
    }

    public function forMe()
    {

        $this->andWhere('[[public]]=1');
        return $this->orWhere('id in (SELECT network_id FROM network_player WHERE player_id=:player_id)',[':player_id'=>\Yii::$app->user->identity->id]);
    }
    /**
     * {@inheritdoc}
     * @return Network[]|array
     */
    public function all($db=null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return Network|array|null
     */
    public function one($db=null)
    {
        return parent::one($db);
    }
}
