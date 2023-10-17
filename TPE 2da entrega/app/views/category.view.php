<?php

    require_once './app/controllers/category.controller.php';

    class CategoryView {



        function showCategorys($categorys) {
            require_once './templates/header.phtml';
            require_once './templates/categorys.phtml';
            require_once './templates/footer.phtml';
        }

        function showError($error) {
            require_once './templates/header.phtml';
            require_once './templates/error.phtml';
            require_once './templates/footer.phtml';

        }

        function showEditForm($tipo) {
            require_once './templates/header.phtml';
            require_once './templates/formEditCategoria.phtml';

            require_once './templates/footer.phtml';

        }
    }