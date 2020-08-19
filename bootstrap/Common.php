<?php
/**
 */

namespace execut\goods\bootstrap;


use execut\goods\Attacher;
use execut\goods\Module;
use execut\yii\Bootstrap;
use yii\base\Application;

class Common extends Bootstrap
{
    public function getDefaultDepends()
    {
        return [
            'modules' => [
                'goods' => [
                    'class' => Module::class,
                ],
            ],
        ];
    }

    public function bootstrap($app)
    {
        parent::bootstrap($app); // TODO: Change the autogenerated stub

        $app->on(Application::EVENT_BEFORE_REQUEST, function () {
            $this->attachToModules();
        });
    }

    protected function attachToModules() {
        $models = \yii::$app->getModule('goods')->getAttachedModels();
        $tables = [];
        foreach ($models as $model) {
            $tables[] = $model::tableName();
        }

        $attacher = new Attacher([
            'tables' => $tables,
        ]);

        $attacher->safeUp();
    }
}