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
            'SELECT id, name, price, image, is_new FROM product WHERE status = "1" ORDER BY id DESC'
        );
        $result->execute(
           );
       ;

        foreach ($result->fetch() as $row) {
            $productList['id'] = $row['id'];
            $productList['name'] = $row['name'];
            $productList['image'] = $row['image'];
            $productList['price'] = $row['price'];
            $productList['is_new'] = $row['is_new'];
        }
        return $productList;
    }
}