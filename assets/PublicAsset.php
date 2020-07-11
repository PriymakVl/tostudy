<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * Main application asset bundle.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class PublicAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/public/style.css',
        'css/public/media.css',
        'css/public/change.css',
        'css/public/modal.css',
    ];
    public $js = [
    'js/public/slick.min.js',
    'js/public/moment.min.js',
    'js/public/moment-with-locales.js',
    'js/public/nprogress.js',
    'js/public/bootstrap.js',
    'js/public/main.js',
    // <script src="//code.jivosite.com/widget/3gTQRLtjez" async></script>
    ];
    public $depends = [
        'yii\web\YiiAsset',
        // 'yii\bootstrap\BootstrapAsset',
        // 'yii\bootstrap\BootstrapPluginAsset'
    ];
}
