<?php


class ProductController
{
    public function actionView($id)
    {
        require_once(ROOT . '/views/products/view.php');
        return true;
    }
}