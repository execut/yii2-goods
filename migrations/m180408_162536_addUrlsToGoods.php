<?php
namespace execut\goods\migrations;

use execut\yii\migration\Migration;
use execut\yii\migration\Inverter;

class m180408_162536_addUrlsToGoods extends Migration
{
    public function initInverter(Inverter $i)
    {
        $i->table('goods_goods')
            ->addColumns([
                'link' => $this->string(),
                'onclick' => $this->string(),
                'reviews' => $this->integer(),
            ]);
    }
}
