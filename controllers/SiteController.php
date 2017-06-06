<?php

class SiteController
{
    public function actionIndex()
    {
        $categories = array();

        // Вывод каталога с категориями
        $categories = Category::getCategoriesList();

        // Вывод последних добавленых продуктов (3 шт)
        $latestProducts = Product::getLatestProducts(3);

        require_once(ROOT . '/views/site/index.php');
        return true;
    }
}