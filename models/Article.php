<?php

namespace execut\goods\models;

use execut\crudFields\Behavior;
use execut\crudFields\BehaviorStub;
use execut\crudFields\fields\HasOneSelect2;
use execut\crudFields\ModelsHelperTrait;
use yii\db\ActiveRecord;
use yii\helpers\ArrayHelper;

class Article extends ActiveRecord
{
    const MODEL_NAME = '{n,plural,=0{Articles} =1{Article} other{Articles}}';
    use ModelsHelperTrait, BehaviorStub;
    public function behaviors() {
        return [
            'fields' => [
                'class' => Behavior::class,
                'fields' => $this->getStandardFields(['name'], [
                    'article' => [
                        'attribute' => 'article',
                        'required' => true,
                    ],
                    'goods_brand_id' => [
                        'class' => HasOneSelect2::class,
                        'relation' => 'brand',
                        'attribute' => 'goods_brand_id',
                        'url' => [
                            '/goods/brands'
                        ],
                    ],
                ]),
                'plugins' => \yii::$app->getModule('goods')->getArticlesCrudFieldsPlugins(),
            ],
        ];
    }

    public static function tableName()
    {
        return 'goods_articles';
    }

    public function rules()
    {
        $rules = ArrayHelper::merge(
            [
                [['article_filtered'], 'default', 'value' => function () {
                    return self::filtrateArticle($this->article);
                }],
            ],
            $this->getBehavior('fields')->rules()
        );

        return $rules;
    }

    /**
     * @param $article
     * @return string
     */
    public static function filtrateArticle($article, $isForDb = false)
    {
        if (is_array($article)) {
            $result = [];
            $articles = $article;
            foreach ($articles as $article) {
                $result[] = self::filtrateArticle($article, $isForDb);
            }

            return $result;
        } else {
            $article = preg_replace('/[^\dA-Z]+/', '', strtoupper($article));
            if ($isForDb && empty($article)) {
                $article = '-';
            }

            return $article;
        }
    }

    public function __toString()
    {
        return '#' . $this->id . ' ' . $this->name;
    }

    public function getName() {
        return $this->article . '/' . ($this->goods_brand_id ? $this->brand->name : '-');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBrand()
    {
        return $this->hasOne(\execut\goods\models\Brand::className(), ['id' => 'goods_brand_id']);
    }
}