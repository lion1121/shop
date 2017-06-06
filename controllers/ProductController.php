<?php


class ProductController
{
    public function actionView($productId)
    {
        $categories = array();

        // Вывод списка категорий каталога
        $categories = Category::getCategoriesList();
        $product = Product::getProductById($productId);
        require_once(ROOT . '/views/products/view.php');
        return true;
    }
}