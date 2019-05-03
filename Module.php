<?php
/**
 * Created by PhpStorm.
 * User: execut
 * Date: 2/8/17
 * Time: 3:06 PM
 */

namespace execut\goods;

use execut\dependencies\PluginBehavior;

class Module extends \yii\base\Module implements Plugin
{
    public function behaviors()
    {
        return [
            'plugin' => [
                'class' => PluginBehavior::class,
                'pluginInterface' => Plugin::class,
            ],
        ];
    }

    public function getArticlesCrudFieldsPlugins()
    {
        $result = $this->getPluginsResults(__FUNCTION__);
        if ($result == null) {
            return [];
        }

        return $result;
    }

    public function getGoodsCrudFieldsPlugins()
    {
        $result = $this->getPluginsResults(__FUNCTION__);
        if ($result == null) {
            return [];
        }

        return $result;
    }

    public function getBrandsCrudFieldsPlugins()
    {
        $result = $this->getPluginsResults(__FUNCTION__);
        if ($result == null) {
            return [];
        }

        return $result;
    }

    public function getAttachedModels() {

        $result = $this->getPluginsResults(__FUNCTION__);
        if ($result == null) {
            return [];
        }

        return $result;
    }
}