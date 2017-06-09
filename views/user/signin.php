<?php include ROOT . '/layouts/header.php'; ?>

<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-4 col-sm-offset-4 padding-right">

                <div class="signup-form">
                    <h2>Вход в личный кабинет</h2>
                    <?php if (!isset($_SESSION['username']) ):?>
                    <form action="#" method="POST">

                        <input required type="email" name="email" placeholder="E-mail" value="<?php echo $email ?>">

                        <input required type="password" name="password" placeholder="пароль" value="<?php echo $password ?>">

                            <?php if (isset($errors) && array_key_exists('access', $errors)):?>
                                <?php echo $errors['access']?>
                            <?php endif;?>
                        <?php if (isset($_SESSION['username'])):?>
                            <p><?php echo $_SESSION['username']?></p>
                        <?php endif;?>
                        <input type="submit" name="submit" class="btn btn-default" value="Регистрация">
                    </form>

                    <?php endif;?>
                </div>

            </div>
        </div>
    </div>
</section>
0<?php include ROOT . '/layouts/footer.php'; ?>
