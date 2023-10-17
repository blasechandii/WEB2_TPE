<?php

    require_once './app/models/models.php';
    require_once './app/controllers/category.controller.php';


class CategoryModel extends Model{

        function getCategorys() {
            $query = $this->db->prepare('SELECT * FROM tipo_periferico');
            $query->execute();

            $categorys = $query->fetchAll(PDO::FETCH_OBJ);
            return $categorys;
        }

        function insertCategory($categoria) {
            $query = $this->db->prepare('INSERT INTO tipo_periferico (id_periferico) VALUES (?)');
            $query->execute([$categoria]);

            return $this->db->lastInsertId();
        }

        function eliminarCategoria($tipo) {
            $query = $this->db->prepare('DELETE FROM tipo_periferico WHERE id_periferico = ?');
            $query->execute([$tipo]);
        }

        function getCategoryById($id) {
            $query = $this->db->prepare('SELECT * FROM tipo_periferico WHERE id = ?');
            $query->execute([$id]);

            $categoria = $query->fetch(PDO::FETCH_OBJ);

            return $categoria;
        }

        function editCategoria($id, $categoria) {
            $query = $this->db->prepare('UPDATE tipo_periferico SET id_periferico=? WHERE id =?');
            $query->execute([$categoria, $id]);
        }
}