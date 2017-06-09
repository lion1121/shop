<?php include ROOT . '/layouts/header.php';?>
<section>
    <div class="container">
        <div class="row">
            <h3>Добро пожаловать <?php echo $user['name'];?></h3>

            <h2>Кабинет пользователя</h2>
            <ul>
                <li><a href="/user/edit">Редактировать данные</a></li>
                <li><a href="/user/history">Список покупок </a></li>
            </ul>
        </div>
    </div>
</section>
<?php include ROOT . '/layouts/footer.php';?>
