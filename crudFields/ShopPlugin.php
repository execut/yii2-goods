<?php
/**
 * Created by PhpStorm.
 * User: execut
 * Date: 12/26/17
 * Time: 10:57 AM
 */

namespace execut\goods\crudFields;


use execut\goods\models\Shop;
use execut\crudFields\fields\HasOneSelect2;
use execut\crudFields\Plugin;

class ShopPlugin extends Plugin
{
    protected function _getFields() {
        return [
            'shop_id' => [
                'class' => HasOneSelect2::class,
                'relation' => 'shop',
                'with' => 'shop',
                'module' => 'goods',
                'attribute' => 'shop_id',
                'required' => true,
            ],
        ];
    }

    public function getRelations() {
        return [
            'shop' => [
                'class' => Shop::class,
                'name' => 'shop',
                'link' => [
                    'id' => 'shop_id',
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