<?php 

Class Recipes extends Db {
    public function getAllRecipes($from, $to) {
        $sql = "SELECT * FROM recipes ORDER BY name DESC LIMIT :page_1, :per_page";
        $stmt = $this->connection()->prepare($sql);
        $stmt->bindValue(":page_1", $from, PDO::PARAM_INT);
        $stmt->bindValue(":per_page", $to, PDO::PARAM_INT);
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