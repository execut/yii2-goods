<?php
/**
 * Created by PhpStorm.
 * User: execut
 * Date: 12/4/17
 * Time: 1:34 PM
 */

namespace execut\goods;


interface Plugin
{
    public function getArticlesCrudFieldsPlugins();
    public function getGoodsCrudFieldsPlugins();
    public function getBrandsCrudFieldsPlugins();
    public function getAttachedModels();
}