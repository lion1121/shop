<?php include ROOT . '/layouts/header.php';?>

<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-4 col-sm-offset-4 padding-right">
                <?php if (isset($errors) && is_array($errors)){
                    foreach ($errors as $error) {
                        echo $error;
                    }
                }?>


                    <div class="signup-form">
                        <h2>Регистрация на сайте</h2>
                        <form action="#" method="POST">
                            <input type="text" name="name" placeholder="Имя" value="<?php echo $name?>">
                            <p>

                            </p>
                            <input type="email" name="email" placeholder="E-mail" value="<?php echo $email?>">
                            <p>

                            </p>
                            <input type="password" name="password" placeholder="пароль" value="<?php echo $password?>">
                            <p>

                            </p>
                            <input type="submit" class="btn btn-default" value="Регистрация">
                        </form>
                    </div>

            </div>
        </div>
    </div>
</section>
<?php include ROOT . '/layouts/footer.php';?>
