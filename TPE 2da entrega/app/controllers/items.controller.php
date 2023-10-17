<?php

require_once './app/views/items.view.php';
require_once './app/models/items.model.php';
require_once './app/models/category.model.php';
require_once './app/helpers/auth.helper.php';


class ItemsController
{

    private $view;
    private $model;

    function __construct()
    {
        AuthHelper::init();

        $this->view = new ItemsView();
        $this->model = new ItemsModel();
    }

    function showHome()
    {
        // obtiene los perifericos
        $perifericos = $this->model->getAllPerifericos();

        /*Aca instanciamos un category model en items, porque queremos hacer un select para agregar
        un periferico y si recorremos las categorias de la tabla perifericos, nos trae por ejemplo 6 veces "mouse"
        y creemos que esta mal a la hora de agregar un item tener el select que repite muchas veces
        la misma categoria */
        $categorias = new CategoryModel();
        // obtengo las categorias
        $cat = $categorias->getCategorys();

        // se los mando a la vista para que los imprima

        $this->view->showHome($perifericos, $cat);
    }

    function showItemsByFiltro() {
        $filtro = $_POST['categoria'];
        if (isset($filtro)) {
            $perifericos = $this->model->getPerifericosByCategoria($filtro);
            if (empty($perifericos)) {
                $this->view->showError('No existe items de dicha categoria');
            } else {
                $this->view->showItemsByFiltro($perifericos);
            }
        }
    }


    function agregarPeriferico()
    {
        AuthHelper::verify();

        $marca = $_POST['marca'];
        $precio = $_POST['precio'];
        $color = $_POST['color'];
        $categoria = $_POST['categoria'];


        if (empty($marca) || empty($precio) || empty($color) || empty($categoria)) {
            $this->view->showError("Faltan completar campos");
            return;
        }

        $id = $this->model->insertPeriferico($marca, $precio, $color, $categoria);

        if ($id) {
            header('Location: ' . BASE_URL);
        } else {
            $this->view->showError("Error al insertar en la DB");
        }
    }

    function eliminarPeriferico($id)
    {
        AuthHelper::verify();

        $this->model->eliminarPeriferico($id);
        header('Location: ' . BASE_URL);
    }


    function showEditForm($id)
    {
        AuthHelper::verify();

        $fila = $this->model->getPeriferico($id);

        $categorias = new CategoryModel();
        // obtengo las categorias
        $cat = $categorias->getCategorys();

        
        $this->view->showEditForm($id, $fila, $cat);
    }
    function editarPeriferico($id)
    {
        AuthHelper::verify();

        $marca = $_POST['marca'];
        $precio = $_POST['precio'];
        $color = $_POST['color'];
        $categoria = $_POST['categoria'];
        if (empty($marca) || empty($precio) || empty($color) || empty($categoria)) {
            $this->view->showError("Faltan completar campos");
            return;
        }

        $this->model->editarPeriferico($marca, $precio, $color, $categoria, $id);
        header("Location: " . BASE_URL);
    }

    function showEspecifico($id)
    {
        $fila = $this->model->getPeriferico($id);
        $this->view->showEspecifico($id, $fila);
    }
}
