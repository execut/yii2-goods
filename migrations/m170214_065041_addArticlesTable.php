<?php
class m170214_065041_addArticlesTable extends \execut\yii\migration\Migration
{
    // Use safeUp/safeDown to run migration code within a transaction
    public function initInverter(\execut\yii\migration\Inverter $inverter)
    {
        $inverter->table('goods_brands')
            ->create(array_merge($this->defaultColumns(), [
                'name' => $this->string()->notNull(),
                'country' => $this->string(255),
                'site' => $this->string(255),
                'description' => $this->text(),
                'rating' => $this->integer(),
                'visible' => $this->boolean()->defaultValue('true')->notNull(),
            ]));
        $inverter->table('goods_articles')
            ->create(array_merge($this->defaultColumns(), [
                'article' => $this->string(40)->notNull(),
                'article_filtered' => $this->string(40)->notNull(),
                'visible' => $this->boolean()->defaultValue('true'),
            ]))
            ->addForeignColumn('goods_brands')
            ->createIndex(['goods_brand_id', 'article_filtered'], true, 'goods_articles_uk')
            ->createIndex('goods_brand_id')
            ->createIndex('article')
            ->createIndex('article_filtered')
            ->createIndex('visible');
        $inverter->table('goods_goods')
            ->create(array_merge($this->defaultColumns(), [
            'name' => $this->string()->notNull(),
            'price' => $this->float()->notNull(),
            'price_old' => $this->float(),
            'rating' => $this->float()->notNull()->defaultValue(5),
            'count' => $this->integer()->notNull()->defaultValue(0),
            'description' => $this->text(),
            'available' => $this->boolean()->notNull()->defaultValue('true'),
            'visible' => $this->boolean()->notNull()->defaultValue('true'),
        ]))->addForeignColumn('goods_articles');
    }
}