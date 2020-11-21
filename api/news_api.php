<?php
include('../models/News.php');
$news = new News();
$method = $_SERVER['REQUEST_MERHOD'];
//post
if (isset($_POST) && !empty($_POST)) {
    $news->id = $_POST['id'];
    $news->title = $_POST['title'];
    $news->image = $_POST['image'];
    $news->details = $_POST['details'];
    $news->category_id = $_POST['category_id'];

    if ($news->addNews()) {
        echo "news added successfuly ^_9";
    } else {
        echo "filed to add news !!";
    }
    //get  
} elseif ($method === 'PUT') {
    if ($news->updateNews($_PUT['id'])) {
        echo "news updated successfuly ^_9";
    } else {
        echo "filed to update news !!";
    }
}
elseif ($method === 'DELETE') {
    if ($news->deleteNews($_DELETE['id'])) {
        echo "news updated successfuly ^_9";
    } else {
        echo "filed to update news !!";
    }
} else {
    if (isset($_GET['id'])) {
        $data = $news->getOneNews($_GET['id']);
    } else {
        $data = $news->getNews();
    }
    echo json_encode($data);
}
//$news->id;
//all methods are working well <:)|=
// $data = $news->getPoliticsNews();
// $data = $news->getFootballNews();
// $data = $news->getBasketballNews();
// $data = $news->getStrangersNews();
