<?php
require_once(ROOT . '/components/Db.php');


class Product
{
    const SHOW_BY_DEFAULT = 10;

    /*
     * Возвращает массив продуктов
     * */
    public static function getLatestProducts($count = self::SHOW_BY_DEFAULT)
    {
        $count = intval($count);
        $db = Db::getConnection();
        $productList = array();
        $result = $db->prepare(
            'SELECT id, name, price, image, is_new FROM product WHERE status = "1" ORDER BY id DESC LIMIT :count'
        );
        $result->execute(['count' => $count]);
        foreach ($result->fetchAll() as $item) {
            $productList[] = $item;
        }

        return $productList;
    }
    /*Возвращает массив продуктов по категории
     * */
    public static function getProductsListByCategory($categoryId = false)
    {
        if($categoryId) {
            $db = Db::getConnection();
            $products = array();
            $result = $db->prepare(
                'SELECT id, name, price, is_new FROM product WHERE status = "1" AND category_id = :categoryId ' .
                ' ORDER BY id DESC LIMIT ' . self::SHOW_BY_DEFAULT
            );
            $result->execute(['categoryId' => $categoryId]);
            foreach ($result->fetchAll() as $row) {
                $products[] = $row;
            }

            return $products;
        }
    }
}