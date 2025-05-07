<?php

use yii\db\Migration;

/**
 * Class m250507_072518_create_player_networks
 */
class m250507_072518_create_player_networks extends Migration
{
  public $networks=[
    [
      'icon'=>'',
      'codename'=>'player_network1',
      'name'=>'player_network1',
      'description'=>'player_network1',
      'public'=>false,
      'guest'=>false,
      'active'=>true,
      'announce'=>false,
      'weight'=>0,
    ],
    [
      'icon'=>'',
      'codename'=>'player_network2',
      'name'=>'player_network2',
      'description'=>'player_network2',
      'public'=>false,
      'guest'=>false,
      'active'=>true,
      'announce'=>false,
      'weight'=>0,
      ],
      [
      'icon'=>'',
      'codename'=>'player_network3',
      'name'=>'player_network3',
      'description'=>'player_network3',
      'public'=>false,
      'guest'=>false,
      'active'=>true,
      'announce'=>false,
      'weight'=>0,
      ],
    ];
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
      foreach($this->networks as $entry)
      {
        $this->upsert('network',$entry,true);
      }
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m250507_072518_create_player_networks cannot be reverted.\n";

        return false;
    }

}
