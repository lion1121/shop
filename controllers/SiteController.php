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

    public function actionContact()
    {
        $mail = 'site address';
        $subject = '';
        $message = '';
        $result = $mail($mail, $subject, $message);
        var_dump($result);
        die();
    }
}