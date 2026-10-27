<?php

require_once "./config/database.php";

class Author
{
    private $id, $nama; 

    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->nama;
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

           $query = "INSERT INTO authors (nama) VALUES ('$name')";
        
           $pdo->exec($query);

           $_SESSION['success'] = "Menambahkan data author sukses!";

           header("Location: /author");

        } catch (PDOException $ex) {
            echo $query . "<br>" . $ex->getMessage();  
        }
    } 
    public static function update($id, $name)
    {
        global $pdo;
        
        // Query untuk mengubah data
        $query = "UPDATE authors SET nama = '$name' WHERE id = '$id'";
        
        $pdo->exec($query);
    }
    public static function delete($id)
    {
        global $pdo;
        
        // Query SQL untuk menghapus data berdasarkan ID
        $query = "DELETE FROM authors WHERE id = '$id'";
        
        $pdo->exec($query);
    }
             
}

