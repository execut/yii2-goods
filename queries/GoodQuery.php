<?php

namespace execut\goods\queries;

/**
 * This is the ActiveQuery class for [[\execut\goods\models\Good]].
 *
 * @see \execut\goods\models\Good
 */
class GoodQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return \execut\goods\models\Good[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return \execut\goods\models\Good|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }

    public function isVisible() {
        $c = $this->modelClass;

        return $this->andWhere($c::tableName() . '.visible');
    }
}
