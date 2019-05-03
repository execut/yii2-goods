<?php
namespace execut\goods\controllers;
use execut\goods\models\Brand;
use execut\crud\params\Crud;
use yii\filters\AccessControl;
use yii\web\Controller;

class BrandsController extends Controller
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
            'modelClass' => Brand::class,
            'module' => 'goods',
            'moduleName' => 'Goods',
            'modelName' => Brand::MODEL_NAME,
        ]);

        return $crud->actions();
    }
}