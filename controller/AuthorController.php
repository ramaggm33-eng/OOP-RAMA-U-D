<?php 

require_once "./model/Author.php";
class AuthorController extends Controller 
{
    static function index()
    {
        $author = Author::all();

        return self::view("./view/author.php", $author);
    }

    static function create()
    {
        return self::view("./view/author/create.php");
    }

    static function show($id) {
        return $id;
    }
    static function store($data)  
    {
        if($data == '') {
            $_SESSION['validation_name'] = "Name field required!";
            header("Location: /author/create");
            return;
        }

        Author::store($data);
    }
    static function edit($id)
    {
        if (isset($_POST['name'])) {
            $name = $_POST['name'];
            Author::update($id, $name);
            
            header("Location: /author");
            return;
        }

        return self::view("./view/author/edit.php");
    }
    static function delete($id) 
    {
        // Memanggil fungsi delete di Model
        Author::delete($id); 
        
        header("Location: /author");
        return;
    }
}