<?php
/**
 * Created by PhpStorm.
 * User: execut
 * Date: 6/24/17
 * Time: 4:47 PM
 */

namespace execut\goods\crudFields;


use execut\goods\models\Article;
use execut\crudFields\fields\HasOneSelect2;
use execut\crudFields\Plugin;

class ArticlePlugin extends Plugin
{
    protected function _getFields() {
        return [
            'details_article_id' => [
                'class' => HasOneSelect2::class,
                'url' => ['/goods/articles'],
                'relation' => 'goodsArticle',
                'with' => 'goodsArticle.goodsBrand',
                'attribute' => 'details_article_id',
                'required' => true,
            ],
        ];
    }

    public function getRelations() {
        return [
            'goodsArticle' => [
                'class' => Article::class,
                'name' => 'goodsArticle',
                'link' => [
                    'id' => 'details_article_id',
                ],
                'multiple' => false
            ],
        ];
    }

    public function rules()
    {
        return [];
    }
}