<?php


class Product
{
    const SHOW_BY_DEFAULT = 6;

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
    public static function getProductsListByCategory($categoryId = false, $page = 1)
    {
        if($categoryId) {
            $page = intval($page);
            $offset = ($page - 1) * self::SHOW_BY_DEFAULT;
            $db = Db::getConnection();
            $products = array();
            $result = $db->prepare(
                'SELECT id, name, price, is_new FROM product WHERE status = "1" AND category_id = :categoryId ' .
                ' ORDER BY id DESC LIMIT ' . self::SHOW_BY_DEFAULT . ' OFFSET :offset'
            );
            $result->execute([
                'categoryId' => $categoryId,
                'offset' => $offset
            ]);
            foreach ($result->fetchAll() as $row) {
                $products[] = $row;
            }

            return $products;
        }
    }
    public static function getProductById($id)
    {
        $id = intval($id);
        if($id) {
            $db = Db::getConnection();
            $result = $db->prepare('
            SELECT *  FROM product WHERE id = :id
            ');
            $result->execute(['id' => $id]);
            return $result->fetch();
        }
    }
    public static function getTotalProductsInCategory($categoryId)
    {
        $db = Db::getConnection();
        $result = $db->prepare('
            SELECT count(id) AS count FROM product WHERE status = "1" AND category_id = :categoryId
        ');
        $result->execute([
            'categoryId' => $categoryId
        ]);
        $row = $result->fetch();
        return $row['count'];
    }
    public static function getProductsByIds($idsArray)
    {
        $products = array();

        $db = Db::getConnection();

        $idsString = implode(',', $idsArray);

        $sql = "SELECT * FROM product WHERE status ='1' AND id IN ($idsString)";
        $result = $db->query($sql);
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $i= 0;
        while($row = $result->fetch()){
            $products[$i]['id'] = $row['id'];
            $products[$i]['code'] = $row['code'];
            $products[$i]['name'] = $row['name'];
            $products[$i]['price'] = $row['price'];
            $i++;
        }
        return $products;
    }
}