<?php 

Class Recipes extends Db {
    public function getAllRecipes($offset) {
        $sql = "SELECT * FROM recipes ORDER BY name DESC LIMIT 10 OFFSET :offset";
        $stmt = $this->connection()->prepare($sql);
        $stmt->bindValue(":offset", $offset, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    

    public function getTrendingRecipes(){
        $sql = "SELECT * FROM recipes ORDER BY views DESC LIMIT 3";
        $stmt = $this->connection()->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getTableLength(){
        $sql = "SELECT id FROM recipes";
        $stmt = $this->connection()->prepare($sql);
        $stmt->execute();
        return $stmt->rowCount();
    }

}