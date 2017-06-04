<?php


class UnxepectedURI
{
    public function noUrl()
    {
        require_once(ROOT . '/views/404/index.php');
        return true;
    }
}