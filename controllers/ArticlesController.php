<?php
namespace execut\goods\controllers;
use execut\goods\models\Article;
use execut\goods\models\Brand;
use execut\crud\params\Crud;
use yii\filters\AccessControl;
use yii\web\Controller;

class ArticlesController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => [$this->module->adminRole],
                    ],
                ],
            ],
        ];
    }

    public function actions()
    {
        $crud = new Crud([
            'modelClass' => Article::class,
            'module' => 'goods',
            'moduleName' => 'Goods',
            'modelName' => Article::MODEL_NAME,
        ]);

        return $crud->actions();
    }
}