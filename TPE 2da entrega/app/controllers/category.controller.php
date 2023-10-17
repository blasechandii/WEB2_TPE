<?php
require_once './app/models/category.model.php';
require_once './app/views/category.view.php';
require_once './app/helpers/auth.helper.php';


class CategoryController{
    private $view;
    private $model;

    function __construct() {
        AuthHelper::init();

        $this->view = new CategoryView();
        $this->model = new CategoryModel();
    }

    function showCategorys() {
        // obtiene las categorias

        $categorys = $this->model->getCategorys();

        // se las mando a la vista para imprimirlas

        $this->view->showCategorys($categorys);
    }

    function agregarCategoria() {
        AuthHelper::verify();

        $categoriaNueva = $_POST['categoria'];
        if (empty($categoriaNueva)) {
            $this->view->showError('Falta rellenar campo');
            return;
        }
        if($this->existeCategoria($categoriaNueva)) {
            $this->view->showError('Ya existe esta categoria');
            return;
        }

        $id = $this->model->insertCategory($categoriaNueva);

        if ($id) {
            header('Location: ' . BASE_URL . "/categorias");
        } else {
            $this->view->showError("Error al insertar en la DB");
        }
    }

    function eliminarCategoria($id) {
        AuthHelper::verify();

        try {           
            $this->model->eliminarCategoria($id);
            header('Location: ' . BASE_URL . "/categorias");
        } catch (PDOException) {
            $this->view->showError('Ha ocurrido un error al eliminar la categoria');
        }
    }


    function existeCategoria($categoriaNueva) {
        $categorys = $this->model->getCategorys();
        foreach ($categorys as $category) {
            if ($category->id_periferico == $categoriaNueva) {
                return true;
            }
        }
        return false;
    }

    function showEditFormCategoria($id) {
        AuthHelper::verify();
        
        $categoria = $this->model->getCategoryById($id);
        $this->view->showEditForm($categoria);
    }

    function editCategoria($id) {

        AuthHelper::verify();
        
        $categoria = $_POST['categoria'];
        if (empty($categoria)) {
            $this->view->showError("Faltan completar campos");
            return;   
        }          
        $this->model->editCategoria($id, $categoria);
        header('Location: ' . BASE_URL . "/categorias");
        
    }

}