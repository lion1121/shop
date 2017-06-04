<?php
require_once(ROOT . '/components/Db.php');

class Category
{
    public static function getCategoriesList()
    {
        $db = Db::getConnection();
        $categoryList = array();
        $result = $db->query('SELECT id, name FROM category ORDER BY sort_order ASC');
        $result->fetch();
        foreach ($result as $category) {
            $categoryList[] = $category;
        }
        return $categoryList;
    }
}