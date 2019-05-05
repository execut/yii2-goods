<?php
/**
 * Created by PhpStorm.
 * User: execut
 * Date: 3/16/17
 * Time: 10:10 AM
 */
return [
    'ID' => '#',
    'Name' => 'Название',
    'Created' => 'Создано',
    'Updated' => 'Обновлено',
    'Price' => 'Цена',
    'Price Old' => 'Старая цена',
    'Count' => 'Количество',
    'Is Available' => 'В наличии',
    'Goods' => 'Товары',
    \execut\goods\models\Good::MODEL_NAME => '{n, plural, =0{Товаров} =1{Товар} other{Товары}}',
    \execut\goods\models\Article::MODEL_NAME => '{n, plural, =0{Артикулов} =1{Артикул} other{Артикулы}}',
    \execut\goods\models\Brand::MODEL_NAME => '{n, plural, =0{Производителей} =1{Производитель} other{Производители}}',
    'Visible' => 'Видимость',
    'Description' => 'Описание',
    'Article' => 'Артикул',
    'Goods Good' => 'Товар',
    'Goods Article' => 'Артикул производителя',
    'Goods Brand' => 'Производитель',
    'Rating' => 'Оценка',
    'Available' => 'В наличии',
    'Link' => 'Внешняя ссылка',
    'Onclick' => 'Javascript-обработчик',
    'Reviews' => 'Количество оценок',
];