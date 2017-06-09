<?php

return array(
    'user/signup' => 'user/signup',
    'user/signin' => 'user/signin',
    'user/logout' => 'user/logout',
    'catalog' => 'catalog/index', //actionIndex in CatalogController
    'product/([0-9]+)' => 'product/view/$1', //actionView in ProductCintroller
    'category/([0-9]+)/page-([0-9]+)' => 'catalog/category/$1/$2', // actionCategory in CatalogController
    'category/([0-9]+)' => 'catalog/category/$1', // actionCategory in CatalogController
    'cabinet' => 'cabinet/index',
    'cabinet/edit' => 'cabinet/edit',
    '' => 'site/index', //actionIndex in SiteController


);