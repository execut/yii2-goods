<?php

namespace execut\goods\models;

use execut\goods\dependencies\Inner;
use execut\crudFields\Behavior;
use execut\crudFields\BehaviorStub;
use execut\crudFields\ModelsHelperTrait;
use Yii;
use \execut\goods\models\base\Brand as BaseBrand;
use yii\db\ActiveRecord;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "goods_brands".
 */
class Brand extends ActiveRecord
{
    const MODEL_NAME = '{n,plural,=0{Brands} =1{Brand} other{Brands}}';
    use BehaviorStub, ModelsHelperTrait;
    public function behaviors()
    {
        return ArrayHelper::merge(
            parent::behaviors(), [
            'fields' => [
                'class' => Behavior::class,
                'fields' => $this->getStandardFields(),
                'plugins' => \yii::$app->getModule('goods')->getBrandsCrudFieldsPlugins(),
            ],
        ]);
    }

    public static function tableName()
    {
        return 'goods_brands';
    }
}
