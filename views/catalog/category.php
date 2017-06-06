<?php include(ROOT . '/layouts/header.php');
// Страница категории
?>
<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <div class="left-sidebar">
                    <h2>Каталог</h2>
                    <div class="panel-group category-products">
                        <?php foreach ($categories as $categoryItem):; ?>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title"><a class="<?php if($categoryId == $categoryItem['id']) echo 'active';?>" href="/category/<?php echo $categoryItem['id']; ?>">
                                            <?php echo $categoryItem['name']; ?></a></h4>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>

                </div>
            </div>

            <div class="col-sm-9 padding-right">
                <div class="features_items"><!--features_items-->
                    <h2 class="title text-center">Последние товары</h2>
                    <?php foreach ($categoryProducts as $product): ?>
                        <div class="col-sm-4">
                            <div class="product-image-wrapper">
                                <div class="single-products">
                                    <div class="productinfo text-center">
                                        <img src="/template/images/home/product1.jpg" alt=""/>
                                        <h2><?php echo $product['price']; ?></h2>
                                        <p><a href="/product/<?php echo $product['id']; ?>">
                                                ID:<?php echo $product['id'];?>
                                                <?php echo $product['name']; ?></a>
                                            <a href="#" class="btn btn-default add-to-cart"><i
                                                    class="fa fa-shopping-cart"></i>В
                                                корзину</a>
                                            <?php if($product['is_new'] == 1):;?>
                                                <img src="/template/images/home/new.png" class="new" alt="">
                                            <?php endif;?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                    <?php echo $pagination->get();?>
                </div><!--features_items-->


            </div>
        </div>
    </div>
<!--    <ul class="pagination">-->
<!--        <li><a href="/category/7/page-1">&lt;</a></li>-->
<!--        <li><a href="/category/7/page-1">1</a></li>-->
<!--        <li><a href="/category/7/page-2"></a>2</li>-->
<!--        <li><a href="/category/7/page-3"></a>3</li>-->
<!--        <li><a href="/category/7/page-4"></a>4</li>-->
<!--        <li><a href="/category/7/page-4"></a>&gt;</li>-->
<!--    </ul>-->
</section>

<?php include(ROOT . '/layouts/footer.php'); ?>
