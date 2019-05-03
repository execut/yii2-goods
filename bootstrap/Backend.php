<?php
/**
 * Created by PhpStorm.
 * User: execut
 * Date: 4/19/17
 * Time: 9:23 AM
 */

namespace execut\goods\bootstrap;

use execut\crud\navigation\Configurator;
use yii\console\Application;
use yii\helpers\ArrayHelper;

class Backend extends Common
{
    public function getDefaultDepends() {
        return ArrayHelper::merge(parent::getDefaultDepends(), [
            'bootstrap' => [
                'navigation' => [
                    'class' => \execut\navigation\Bootstrap::class,
                ],
                'crud' => [
                    'class' => \execut\crud\Bootstrap::class,
                ],
            ],
        ]);
    }

    public function bootstrap($app)
    {
        parent::bootstrap($app);
        $this->registerTranslations($app);
        $this->bootstrapNavigation($app);
    }

    public function registerTranslations($app) {
        $app->i18n->translations['execut/goods'] = [
            'class' => 'yii\i18n\PhpMessageSource',
            'sourceLanguage' => 'en-US',
            'basePath' => '@execut/goods/messages',
            'fileMap' => [
                'execut/goods' => 'goods.php',
            ],
        ];
    }

    /**
     * @param $app
     */
    protected function bootstrapNavigation($app)
    {
        if ($app instanceof Application || $app->user->isGuest) {
            return;
        }
        /**
         * @var Component $navigation
         */
        $navigation = $app->navigation;
        $navigation->addConfigurator([
            'class' => Configurator::class,
            'module' => 'goods',
            'moduleName' => 'Goods',
            'modelName' => '{n, plural, =0{Goods} =1{Good} other{Goods}}',
            'controller' => 'goods',
        ]);

        $navigation->addConfigurator([
            'class' => Configurator::class,
            'module' => 'goods',
            'moduleName' => 'Goods',
            'modelName' => '{n, plural, =0{Articles} =1{Article} other{Articles}}',
            'controller' => 'articles',
        ]);

        $navigation->addConfigurator([
            'class' => Configurator::class,
            'module' => 'goods',
            'moduleName' => 'Goods',
            'modelName' => '{n, plural, =0{Brands} =1{Brand} other{Brands}}',
            'controller' => 'brands',
        ]);

        $navigation->addConfigurator([
            'class' => Configurator::class,
            'module' => 'goods',
            'moduleName' => 'Goods',
            'modelName' => '{n, plural, =0{Types} =1{Type} other{Types}}',
            'controller' => 'type',
        ]);
    }
}