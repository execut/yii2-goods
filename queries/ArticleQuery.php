<?php

namespace execut\goods\queries;

use execut\goods\models\base\Article;

/**
 * This is the ActiveQuery class for [[\execut\goods\models\Article]].
 *
 * @see \execut\goods\models\Article
 */
class ArticleQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return \execut\goods\models\Article[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return \execut\goods\models\Article|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }

    public function byBrandId($id) 
    {
        $brandIdFieldName = Article::getFieldName('brand_id');
        return $this->andWhere([
            $brandIdFieldName => $id,
        ]);
    }
}
