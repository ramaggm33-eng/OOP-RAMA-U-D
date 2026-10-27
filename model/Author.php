<?php

require_once "./config/database.php";

class Author
{
    private $id, $name; 

    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

    public static function all()
    {
        global $pdo;

        $query = $pdo->query("SELECT * FROM authors");

        return $query->fetchAll(PDO::FETCH_CLASS, 'Author');
    }

    public static function store($name)   
    {
        try{
           global $pdo;

           $query = "INSERT INTO authors (name) VALUES (:name)";
        
           $pdo->exec($query);

           $_SESSION['success'] = "Menambahkan data author sukses!";

           header("Location: /author");

        } catch (PDOException $ex) {
            echo $query . "<br>" . $ex->getMessage();  
        }
    } 
             
}

