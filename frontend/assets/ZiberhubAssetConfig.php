<?php
namespace app\assets;

use Yii;

class ZiberhubAssetConfig
{
    public static function sidebarColor()
    {
        /** @var Asset $bundle */
        $bundle=Yii::$app->assetManager->getBundle('app\assets\ZiberhubAsset');

        return $bundle->sidebarColor;
    }


    public static function sidebarBackgroundColor()
    {
        /** @var Asset */
        $bundle=Yii::$app->assetManager->getBundle('app\assets\ZiberhubAsset');

        return $bundle->sidebarBackgroundColor;
    }

    public static function sidebarBackgroundImage()
    {
        /** @var Asset */
        $bundle=Yii::$app->assetManager->getBundle('app\assets\ZiberhubAsset');

        return $bundle->sidebarBackgroundImage;
    }

    public static function siteTitle()
    {
        /** @var Asset */
        $bundle=Yii::$app->assetManager->getBundle('app\assets\ZiberhubAsset');

        return $bundle->siteTitle;
    }

    public static function logoMini()
    {
        /** @var Asset */
        $bundle=Yii::$app->assetManager->getBundle('app\assets\ZiberhubAsset');

        return $bundle->logoMini;
    }
}
