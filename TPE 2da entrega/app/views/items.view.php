<?php


class ItemsView {



    function showHome($perifericos, $categorys) {
        require_once './templates/header.phtml';
        require_once './templates/inicio.phtml';
        require_once './templates/footer.phtml';

    }

    function showError($error) {
        require_once './templates/header.phtml';
        require_once './templates/error.phtml';
        require_once './templates/footer.phtml';

    }

    function showEditForm($id, $fila, $categorys) {
        require_once './templates/header.phtml';
        require_once './templates/formEditPeriferico.phtml';
        require_once './templates/footer.phtml';

    }
   

    function showEspecifico($id, $fila) {
        require_once './templates/header.phtml';
        require_once './templates/filaPeriferico.phtml';
        require_once './templates/footer.phtml';

    }

    function showItemsByFiltro($perifericos) {
        require_once './templates/header.phtml';
        require_once './templates/filtroItems.phtml';
        require_once './templates/footer.phtml';
    }

}