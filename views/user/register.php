<?php include ROOT . '/layouts/header.php';?>

<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-4 col-sm-offset-4 padding-right">

                    <div class="signup-form">
                        <h2>Регистрация на сайте</h2>
                        <form action="#" method="POST">

                            <input type="text" name="name" placeholder="Имя" value="<?php echo $name?>">
                            <?php if (isset($errors) && is_array($errors)){ ?>
                                <?php if (array_key_exists('name', $errors)):;?>
                                    <p><?php echo $errors['name']?></p>
                                <?php endif;?>
                            <?php  };?>

                            <input type="email" name="email" placeholder="E-mail" value="<?php echo $email?>">
                            <?php if (isset($errors)  && is_array($errors)){ ?>
                                <?php if (array_key_exists('email', $errors)):;?>
                                    <p><?php echo $errors['email']?></p>
                                <?php endif;?>
                            <?php  };?>

                            <input type="password" name="password" placeholder="пароль" value="<?php echo $password?>">
                                <?php if (isset($errors) && is_array($errors)){ ?>
                                    <?php if (array_key_exists('password', $errors)):;?>
                                        <p><?php echo $errors['password']?></p>
                                    <?php endif;?>
                              <?php  };?>
                            <input type="submit" name="submit" class="btn btn-default" value="Регистрация">
                        </form>
                    </div>

            </div>
        </div>
    </div>
</section>
0<?php include ROOT . '/layouts/footer.php';?>
