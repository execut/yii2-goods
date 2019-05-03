<?php

namespace execut\goods\queries;

/**
 * This is the ActiveQuery class for [[\execut\goods\models\Brand]].
 *
 * @see \execut\goods\models\Brand
 */
class BrandQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return \execut\goods\models\Brand[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return \execut\goods\models\Brand|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }

    public function byName($name) {
        return $this->andWhere([
            'ILIKE',
            'name',
            $name,
        ]);
    }
}
