<?php
include('../Database/Database.php');
include('Category.php');
class News
{
    public $id;
    public $title;
    public $image;
    public $date;
    public $details;
    public $category_id;
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

    public function addNews()
    {
        try {
            $query = $this->database->prepare("insert into news values(?,?,?,now(),?,?)");
            $query->execute([$this->id, $this->title, $this->image, $this->details, $this->category_id]);
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }

    public function updateNews($id)
    {
        $news = $this->getOneNews($id);
        ($this->title != null) ? $news->title =  $this->title : "";
        ($this->image != null) ? $news->image =  $this->image : "";
        ($this->details != null) ? $news->details =  $this->details : "";
        ($this->category_id != null) ? $news->category_id =  $this->category_id : "";
        try {
            $query = $this->database->prepare("UPDATE `news` SET `title`=?,`image`=?,
            `details`=?,`category_id`=? WHERE id = ?");
            $query->execute([$this->title, $this->image, $this->details, $this->category_id, $id]);
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }

    public function deleteNews($id)
    {
        try {
            $query = $this->database->prepare("delete from news where id=?");
            $query->execute([$id]);
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }
}
