<?php
/**
 */

namespace execut\goods\widget;


use execut\yii\jui\Widget;
use yii\helpers\Html;
use yii\helpers\Url;

class Good extends Widget
{
    public $good = null;
    public $description = null;
    public function run()
    {
        $good = $this->good;
        $filesFile = $good->article->filesFile;
        $url = [
            '/files/frontend',
            'alias' => $filesFile->alias,
            'extension' => $filesFile->extension,
        ];

        $thumbUrl = [
            '/images/frontend',
            'alias' => $filesFile->alias,
            'extension' => $filesFile->extension,
            'dataAttribute' => 'size_sm',
        ];
        $image = Html::img($thumbUrl, [
            'alt' => $filesFile->alt,
        ]);

        return '<div itemscope itemtype="http://schema.org/Product">
  <a rel="nofollow" href="' . $good->link . '" target="_blank" onclick="' . $good->onclick . '">
    <span itemprop="image" itemscope="" itemtype="http://schema.org/ImageObject" contenturl="' . Url::to($url) . '">
        <meta itemprop="name" content="' . $filesFile->title . '">
        <span itemprop="contentUrl" src="' . Url::to($url) . '"></span>
        <meta itemprop="caption description" content="'.  $filesFile->title . '">
        <meta itemprop="datePublished" content="' . str_replace(' ', 'T', $filesFile->created) . '">
        <span itemprop="thumbnail" itemscope="" itemtype="http://schema.org/ImageObject">
            <meta itemprop="name" content="' . $filesFile->title . '">
            <span itemprop="contentUrl" src="' . Url::to($thumbUrl) . '" content="' . Url::to($thumbUrl) . '"></span>
            <meta itemprop="caption description" content="'.  $filesFile->title . '"></span>
    </span>
  <meta itemprop="brand" content="' . $good->article->brand->name . '">
  <meta itemprop="name" content="' . $good->name . '">
  <meta itemprop="model" content="' . $good->article->article . '">
  <span itemprop="aggregateRating" itemscope itemtype="http://schema.org/AggregateRating">
    <meta itemprop="ratingValue" content="' . $good->rating . '"><meta itemprop="reviewCount" content="' . $good->reviews . '">
  </span>
    <div class="product">
    ' . $image . '
      <span class="price-block" itemprop="offers" itemscope itemtype="http://schema.org/Offer">
        <div class="stars"></div>
        <div class="reviews">' . $good->reviews . ' customer reviews</div>
        <div class="retail-price">Retail: $<div>' . number_format($good->price_old, 2) . '</div></div>
        <meta itemprop="priceCurrency" content="USD" />
        <div class="price">$<span itemprop="price">' . number_format($good->price, 2) . '</span></div>
        <div class="savings">Savings: $' . number_format(round($good->price_old - $good->price), 2) . '</div>
        <div class="add2-to-cart"></div>
        <time itemprop="priceValidUntil" datetime="' . (date('Y') + 10) . '-11-05"></time>
        <link itemprop="itemCondition" href="http://schema.org/NewCondition"/>
        <link itemprop="availability" href="http://schema.org/InStock"/>
      </span>
    </div>
    </a>
  <span itemprop="description">' . $this->description . '</span>
</div>
';
    }
}