<?php


class CatalogController
{
    public function actionIndex()
    {
        $categories = array();

        // Вывод списка категорий каталога
        $categories = Category::getCategoriesList();

        // Вывод последних 10 товарок на странице "Каталог"
        $latestProducts = Product::getLatestProducts(10);
        require_once(ROOT . '/views/catalog/index.php');
        return true;
    }
    public function actionCategory($categoryId, $page = 1)
    {

        $categories = array();
        // Вывод списка категорий каталога
        $categories = Category::getCategoriesList();

        $categoryProducts = array();
        // Вывод продуктов по id продукта
        $categoryProducts = Product::getProductsListByCategory($categoryId, $page);
        $total = Product::getTotalProductsInCategory($categoryId);
        // Создаем объект Pagination - постраничная навигация
        $pagination = new Pagination($total, $page, Product::SHOW_BY_DEFAULT, 'page-');
        require_once(ROOT . '/views/catalog/category.php');
        return true;
    }
}