<?php
/**
 */

namespace execut\goods\crudFields;

use execut\crudFields\fields\HasOneSelect2;
use execut\goods\models\Good;

class Plugin extends \execut\crudFields\Plugin
{
    public function getFields() {
        return [
            [
                'class' => HasOneSelect2::class,
                'attribute' => 'goods_good_id',
                'relation' => 'good',
                'module' => 'goods',
                'url' => [
                    '/goods/goods'
                ],
            ],
        ];
    }

    public function getRelations()
    {
        return [
            'good' => [
                'class' => Good::class,
                'link' => [
                    'id' => 'goods_good_id',
                ],
                'multiple' => false
            ],
        ];
    }
}