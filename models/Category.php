<?php
/**
 * Created by PhpStorm.
 * User: execut
 * Date: 4/26/17
 * Time: 5:20 PM
 */

namespace execut\goods\models;


use yii\db\ActiveRecord;

class Category extends ActiveRecord
{
	public static function tableName() {
	return 'details_categories';
	}

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategorie()
    {
        return $this->hasOne(Category::className(), ['id' => 'details_categorie_id']);
    }

    public function isCategory( ){
        return $this->details_categories_type_id == 1 || $this->details_categories_type_id == 4;
    }
}