<?php 
include('../Database/Database.php');
include('Category.php');
class News{
    public $id;
    public $title;
    public $image;
    public $date;
    public $details;
    private $database;


    function __construct()
    {
        $db = new Database();
        $this->database = $db->connect();        
    }

    public function getNews()
    {
        $query = $this->database->prepare("select id,title from news");
        $query->execute();
        $data = $query->fetchAll(PDO::FETCH_OBJ);
        return $data;
    }

    public function getNewsByCategory($category_id)
    {
        $query = $this->database->prepare("select id,title from news where category_id=?");
        $query->execute([$category_id]);
        $data = $query->fetchAll(PDO::FETCH_OBJ);
        return $data;
    }

    public function getOneNews($id)
    {
        $query = $this->database->prepare("select * from news where id=?");
        $query->execute([$id]);
        $data = $query->fetch(PDO::FETCH_OBJ);
        return $data;
    }

    public function getPoliticsNews()
    {
        $category = new Category();
        $category = $category->getCategoryByTitle("politics");
        return $this->getNewsByCategory($category->id);
    }

    public function getFootballNews()
    {
        $category = new Category();
        $category = $category->getCategoryBySubTitle("football");
        $data =  $this->getNewsByCategory($category->id);
        return $data;
    }

    public function getBasketballNews()
    {
        $category = new Category();
        $category = $category->getCategoryBySubTitle("basketball");
        return $this->getNewsByCategory($category->id);
    }

    public function getStrangersNews()
    {
        $category = new Category();
        $category = $category->getCategoryByTitle("strangers");
        return $this->getNewsByCategory($category->id);
    }

    public function addNews($data)
    {
        
    }

    public function updateNews($id)
    {
        
    }

    public function deleteNews($id)
    {
        
    }



}

?>