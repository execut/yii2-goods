<?php

namespace execut\goods\models;

use execut\crudFields\Behavior;
use execut\crudFields\BehaviorStub;
use execut\crudFields\fields\Boolean;
use execut\crudFields\fields\Editor;
use execut\crudFields\fields\HasOneSelect2;
use execut\crudFields\ModelsHelperTrait;
use yii\db\ActiveRecord;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "goods_goods".
 */
class Good extends ActiveRecord
{
    const MODEL_NAME = '{n,plural,=0{Goods} =1{Good} other{Goods}}';
    use BehaviorStub, ModelsHelperTrait;
    public function behaviors()
    {
        if ($goodsModule = \yii::$app->getModule('goods')) {
            $goodsCrudFieldsPlugins = $goodsModule->getGoodsCrudFieldsPlugins();
        } else {
            $goodsCrudFieldsPlugins = [];
        }

        return ArrayHelper::merge(
            parent::behaviors(), [
            'fields' => [
                'class' => Behavior::class,
                'fields' => $this->getStandardFields(null, [
                    'price' => [
                        'attribute' => 'price',
                        'required' => true,
                    ],
                    'price_old' => [
                        'attribute' => 'price_old',
                    ],
                    'description' => [
                        'class' => Editor::class,
                        'attribute' => 'description',
                    ],
                    'goods_article_id' => [
                        'class' => HasOneSelect2::class,
                        'required' => true,
                        'attribute' => 'goods_article_id',
                        'relation' => 'article',
                        'nameAttribute' => 'article',
                    ],
                    'rating' => [
                        'attribute' => 'rating',
                    ],
                    'available' => [
                        'class' => Boolean::class,
                        'attribute' => 'available',
                    ],
                    'link' => [
                        'attribute' => 'link',
                    ],
                    'onclick' => [
                        'attribute' => 'onclick',
                    ],
                    'reviews' => [
                        'attribute' => 'reviews',
                    ],
                ]),
                'plugins' => $goodsCrudFieldsPlugins,
            ],
        ]);     
    }

    public static function tableName()
    {
        return 'goods_goods';
    }

    public function getArticle() {
        return $this->hasOne(Article::class, [
            'id' => 'goods_article_id',
        ]);
    }
}
