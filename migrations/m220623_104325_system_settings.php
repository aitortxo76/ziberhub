<?php

use yii\db\Migration;

/**
 * Class m220623_104325_system_settings
 */
class m220623_104325_system_settings extends Migration
{
    public $sysconfigs=[
      ['id'=>"event_name",'val'=>"ZiberHub CTF"],
      ['id'=>"event_active",'val'=>"1"],
      ['id'=>"approved_avatar",'val'=>"1"],
      ['id'=>"challenge_home",'val'=>"uploads/"],
      ['id'=>"dashboard_is_home",'val'=>"1"],
      ['id'=>"default_homepage",'val'=>"/dashboard/index"],
      ['id'=>"dn_commonName",'val'=>"ROOT CA"],
      ['id'=>"dn_countryName",'val'=>"ES"],
      ['id'=>"dn_localityName",'val'=>"Bilbao"],
      ['id'=>"dn_organizationalUnitName",'val'=>"ziberhub.eus"],
      ['id'=>"dn_organizationName",'val'=>"echoCTF"],
      ['id'=>"dn_stateOrProvinceName",'val'=>"Spain"],
      ['id'=>"leaderboard_show_zero",'val'=>"0"],
      ['id'=>"leaderboard_visible_after_event_end",'val'=>"0"],
      ['id'=>"leaderboard_visible_before_event_start",'val'=>"0"],
      ['id'=>"mail_from",'val'=>"ziberhubtx@gmail.com"],
      ['id'=>"mail_fromName",'val'=>"ZiberHub CTF"],
      ['id'=>'dsn','val'=>'gmail+smtp://ziberhubtx@gmail.com:hqmvdotdcjqrwdvf@default?local_domain=ziberhub.eus'],
      ['id'=>"mail_useFileTransport",'val'=>"0"],
      ['id'=>"moderator_domain",'val'=>"mui.ziberhub.eus"],
      ['id'=>"offense_domain",'val'=>"ziberhub.eus"],
      ['id'=>"player_profile",'val'=>"1"],
      ['id'=>"profile_visibility",'val'=>"public"],
      ['id'=>"require_activation",'val'=>"1"],
      ['id'=>"spins_per_day",'val'=>"70"],
      ['id'=>"target_days_new",'val'=>"1"],
      ['id'=>"target_days_updated",'val'=>"1"],
      ['id'=>"time_zone",'val'=>"UTC"],
      ['id'=>"twitter_account",'val'=>"ziberhubeus"],
      ['id'=>"twitter_hashtags",'val'=>"ZiberHub,CTF"],
      ['id'=>"vpngw",'val'=>"vpn.ziberhub.eus"],
      ['id'=>'all_players_vip','val'=>"1"],
      ['id'=>'player_require_approval','val'=>"0"],
      ['id'=>'team_visible_instances','val'=>"1"],
      ['id'=>'hide_timezone','val'=>"1"],
      ['id'=>'profile_discord','val'=>"1"],
      ['id'=>'profile_echoctf','val'=>"1"],
      ['id'=>'profile_github','val'=>"1"],
      ['id'=>'module_smartcity_disabled','val'=>"1"],
      ['id'=>'time_zone', 'val'=>'Europe/Madrid'],
      ['id'=>'profile_settings_fields','val'=>'avatar,bio,country,discord,echoctf,email,fullname,github,pending_progress,twitter,username,visibility'],
      ['id'=>'pf_state_limits','val'=>'(max 10000, source-track rule, max-src-nodes 5, max-src-states 2000, max-src-conn 50)'],
      ['id'=>'frontpage_scenario','val'=>'
      <div class="row d-flex justify-content-center">
        <div class="col-sm-8 col-xl-6">
          <center><img class="rounded" width="400px" src="/images/logo.png" alt="ZiberHub CTF" /></center>
        </div>
        <div class="col-sm-8 col-xl-7">
          <p class="h3 text-center"><samp>Welcome to ZiberHub CTF</samp></p>
        </div>
      </div>
      <br/>
      <div class="row row-eq-height d-flex justify-content-center">
        <div class="col-sm-9 col-md-6 col-lg-6 col-xl-5 d-flex">
          <div class="card bg-info flex-fill text-center">
            <div class="card-body">
              <img src="/images/vip.svg" class="img-fluid" align="left" style="float: left; max-height: 100px;"/>
              <h3 class="card-title"><b>Sample</b></h3>
              <p class="card-text lead"><a href="/" class="text-dark text-bold">Action call</a></p>
            </div>
          </div>
        </div>
      </div>
      <div class="row d-flex justify-content-center">
        <div class="col-sm-8 col-xl-7">
          <p class="text-danger"><b>You can edit this page from the backend at <code>Content => Frontpage Scenario</code></b></p>
        </div>
      </div>'],
    //['id'=>'menu_items', 'val'=>'[{"name":"<i class=\"fab fa-slack text-slack\"><\/i><p class=\"text-slack\">Join our Slack!<\/p>","link":"https:\/\/slack-link"}]'],
    ];
    public $disabled_routes=[
        ['route'=>'/network%'],
        ['route'=>'/site/changelog%'],
        ['route'=>'/tutorial%'],
        ['route'=>'/help/experience%'],
    ];
    public $delete_url_routes=[
      ['id'=>8 ],// changelog
      ['id'=>52 ],// tutorials
      ['id'=>53 ],// tutorial/<id>
      ['id'=>70 ],// subs
      ['id'=>71 ],// subs
      ['id'=>72 ],// subs
      ['id'=>73 ],// subs
      ['id'=>74 ],// subs
      ['id'=>75 ],// subs
      ['id'=>76 ],// subs
      ['id'=>77 ],// subs
      ['id'=>78 ],// subs
    ];
    public $upsert_url_routes=[    ];
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {

      // delete not needed url routes
      foreach($this->delete_url_routes as $route)
      {
        $this->delete('url_route',$route);
      }
      // delete urls to be added so that we dont
      // end up with duplicates
      foreach($this->upsert_url_routes as $route)
      {
        $this->delete('url_route',$route);
      }

      // delete not needed url routes
      foreach($this->sysconfigs as $entry)
      {
        $this->upsert('sysconfig',$entry);
      }

      // update existing url routes
      foreach($this->upsert_url_routes as $route)
      {
        $this->upsert('url_route',$route,true);
      }

      // add/modify disabled routes
      foreach($this->disabled_routes as $route)
      {
        $this->upsert('disabled_route',$route,true);
      }
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
      echo "m220623_104325_system_settings cannot be reverted.\n";
    }

}
