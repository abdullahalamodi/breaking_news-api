<?php 
// include('../Database/Database.php');  //it's incloded in news file ^_^
class Category{

    public $id;
    public $title;
    public $sub_title;
    private $database;


    function __construct()
    {
        $db = new Database();
        $this->database = $db->connect();
    }

    public function getCategories()
    {
        $query = $this->database->prepare("select * from categories");
        $query->execute();
        $data = $query->fetchAll(PDO::FETCH_OBJ);
        return $data;
    }

    public function getCategoryById($id)
    {
        $query = $this->database->prepare("select * from categories where id=?");
        $query->execute([$id]);
        $data = $query->fetchAll(PDO::FETCH_OBJ);
        return $data;
    }

    public function getCategoryByTitle($title)
    {
        $query = $this->database->prepare("select * from categories where title like ?");
        $query->execute([$title]);
        $data = $query->fetch(PDO::FETCH_OBJ);
        return $data;
    }

    public function getCategoryBySubTitle($sub_title)
    {
        $query = $this->database->prepare("select * from categories where sub_title like ?");
        $query->execute([$sub_title]);
        $data = $query->fetch(PDO::FETCH_OBJ);
        return $data;
    }

    public function addCategory($data)
    {
        
    }

    public function updateCategory($id)
    {
        
    }

    public function deleteCategory($id)
    {
        
    }
}

// $s = new Category();
// $data = $s->getCategoryByTitle("politics");
// echo json_encode($data)
?>