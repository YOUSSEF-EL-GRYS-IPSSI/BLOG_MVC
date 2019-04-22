<?php
require_once '././model/ModelDB.php';

class  Category_model extends ModelDB {
    public function categorys_list(){
        $db = $this->db_connect();

        //récupération de la liste des catégories pour générer le menu
        $query = $db->query('SELECT  name ,id FROM category ');
        $categoriesList = $query->fetchAll();

        return $categoriesList;
    }
}