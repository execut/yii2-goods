<?php
/**
 */

namespace execut\goods\plugin;


use execut\goods\Plugin;

class Files implements Plugin
{
    public function getArticlesCrudFieldsPlugins()
    {
        return [
            'files' => [
                'class' => \execut\files\crudFields\Plugin::class,
            ],
        ];
    }

    public function getBrandsCrudFieldsPlugins()
    {
        return [];
    }

    public function getGoodsCrudFieldsPlugins()
    {
        return [];
    }

    public function getAttachedModels() {
        return [];
    }
}