<?php

class Category
{
    public static function getCategoriesList()
    {
        $db = Db::getConnection();
        $categoryList = array();
        $result = $db->prepare('SELECT id, name FROM category ORDER BY sort_order ASC');
        $result->execute();
        $result->fetch();
        foreach ($result as $category) {
            $categoryList[] = $category;
        }
        return $categoryList;
    }
}