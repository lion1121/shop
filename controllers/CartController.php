<?php

class CartController
{
    public function actionAdd($id)
    {
        // Добавляем товар в корзину
        Cart::addProduct($id);

        // Возвращаем пользователя на страницу
        $referrer = $_SERVER['HTTP_REFERER'];
        header("Location: $referrer");

    }
    public function actionAddAjax($id)
    {
            echo Cart::addProduct($id);
            return true;
    }

    public function actionIndex()
    {
        $categories = array();
        $categories = Category::getCategoriesList();

        $productsInCart = false;

        // Получим данные из корзины
        $productsInCart = Cart::getProducts();

        if ($productsInCart) {
            // Получаем полную информацию о товарах для списка
            $productIds = array_keys($productsInCart);
            $products = Product::getProductsByIds($productIds);

            // Получаем общую стоимость товаров
            $totalPrice = Cart::getTotalPrice($products);
        }
        require_once ROOT . '/views/cart/index.php';
        return true;
    }
}