<?php

    require_once './app/models/models.php';

    class ItemsModel extends Model{
        
        function getAllPerifericos() {
            $query = $this->db->prepare('SELECT * FROM periferico ORDER BY id_periferico');
            $query->execute();

            $perifericos = $query->fetchAll(PDO::FETCH_OBJ);
            return $perifericos;
        }

        function getPerifericosByCategoria($categoria) {
            $query = $this->db->prepare('SELECT * FROM periferico WHERE id_periferico = ?');
            $query->execute([$categoria]);

            $perifericos = $query->fetchAll(PDO::FETCH_OBJ);
            return $perifericos;
        }


        function getPeriferico($id) {
            //Esta funcion trae solo 1 fila de la tabla perifericos

            $query = $this->db->prepare('SELECT * FROM periferico WHERE id = ?');
            $query->execute([$id]);

            $periferico = $query->fetch(PDO::FETCH_OBJ);
            return $periferico;
        }

        function insertPeriferico($marca, $precio, $color, $categoria) {
            $query = $this->db->prepare('INSERT INTO periferico (marca, precio, color, id_periferico) VALUES (?,?,?,?)');
            $query->execute([$marca, $precio, $color, $categoria]);

            return $this->db->lastInsertId();
        }

        function eliminarPeriferico($id) {
            $query = $this->db->prepare('DELETE FROM periferico WHERE id = ?');
            $query->execute([$id]);

        }

        function editarPeriferico($marca, $precio, $color, $categoria, $id) {
            $query = $this->db->prepare('UPDATE periferico SET marca=?, precio=?, color=?, id_periferico=? WHERE id=?');
            $query->execute([$marca, $precio, $color, $categoria, $id]);
        }
    }