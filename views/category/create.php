<?php

$GLOBALS['page'] = 'categories';

require_once '../../App/Classes/Category.php';

require_once '../../includes/head.php';

require_once '../../includes/sidebar.php';

?>

<main class="main-content">

    <?php require_once '../../includes/navbar.php' ?>

    <div class="container navbar-breadcrumb-pos-x navbar-breadcrumb-pos-y">
        <ol class="breadcrumb">

            <li class="breadcrumb-item">
                <a style="text-decoration: none;"
                   href="/views/main.php">

                    Главная

                </a>
            </li>

            <li class="breadcrumb-item">
                <a style="text-decoration: none;"
                   href="/views/category/index.php">

                    Категории

                </a>
            </li>

            <li class="breadcrumb-item active"
                aria-current="page">

                Добавить категорию

            </li>

        </ol>
    </div>

    <div class="container d-flex justify-content-between mt-3 mb-3">

        <a href="index.php"
           type="button"
           class="btn btn-primary">

            Назад

        </a>

    </div>

    <div class="container">

        <form action="/App/Http/Controllers/CategoryController/create.php" method="POST">

            <div class="row">
                <div class="col">

                    <label class="small fw-bold mt-2 mb-1"
                           for="input">

                        Название категории

                    </label>
                    <div class="d-flex">
                        <input placeholder="Название категории"
                               class="form-control"
                               name="name"
                               type="text"
                               id="input">

                        <input class="btn btn-outline-primary ms-2"
                               type="submit"
                               value="Добавить">

                    </div>
                </div>
            </div>

        </form>
    </div>
</main>

<?php require_once '../../includes/foot.php' ?>

