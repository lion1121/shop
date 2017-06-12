<?php

return array(
    'user/signup' => 'user/signup',
    'user/signin' => 'user/signin',
    'user/logout' => 'user/logout',
    'catalog' => 'catalog/index', //actionIndex in CatalogController
    'product/([0-9]+)' => 'product/view/$1', //actionView in ProductCintroller
    'category/([0-9]+)/page-([0-9]+)' => 'catalog/category/$1/$2', // actionCategory in CatalogController
    'category/([0-9]+)' => 'catalog/category/$1', // actionCategory in CatalogController
    'cart' => 'cart/index',

    'cart/add/([0-9]+)' => 'cart/add/$1',
    'cart/addAjax/([0-9]+)' => 'cart/addAjax/$1',

    'cabinet' => 'cabinet/index',
    'cabinet/edit' => 'cabinet/edit',
    'contacts' => 'site/index',
    '' => 'site/index', //actionIndex in SiteController


);