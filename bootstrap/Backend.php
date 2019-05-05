<?php
/**
 * Created by PhpStorm.
 * User: execut
 * Date: 4/19/17
 * Time: 9:23 AM
 */

namespace execut\goods\bootstrap;

use execut\crud\navigation\Configurator;
use execut\goods\models\Article;
use execut\goods\models\Brand;
use execut\goods\models\Good;
use yii\console\Application;
use yii\helpers\ArrayHelper;

class Backend extends Common
{
    public $isBootstrapI18n = true;
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
        $this->bootstrapNavigation($app);
    }

    /**
     * @param $app
     */
    protected function bootstrapNavigation($app)
    {
        $module = $app->getModule('goods');
        if (!(!$app->user->isGuest && $module->adminRole === '@') && !$app->user->can($module->adminRole)) {
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
            'modelName' => Good::MODEL_NAME,
            'controller' => 'goods',
        ]);

        $navigation->addConfigurator([
            'class' => Configurator::class,
            'module' => 'goods',
            'moduleName' => 'Goods',
            'modelName' => Article::MODEL_NAME,
            'controller' => 'articles',
        ]);

        $navigation->addConfigurator([
            'class' => Configurator::class,
            'module' => 'goods',
            'moduleName' => 'Goods',
            'modelName' => Brand::MODEL_NAME,
            'controller' => 'brands',
        ]);
    }
}