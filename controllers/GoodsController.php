<?php
namespace execut\goods\controllers;
use execut\goods\models\Good;
use execut\crud\params\Crud;
use yii\filters\AccessControl;
use yii\web\Controller;

class GoodsController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
    }

    public function actions()
    {
        $crud = new Crud([
            'modelClass' => Good::class,
            'module' => 'goods',
            'moduleName' => 'Goods',
            'modelName' => Good::MODEL_NAME,
        ]);

        return $crud->actions();
    }
}