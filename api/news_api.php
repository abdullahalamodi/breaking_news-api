<?php
include('../models/News.php');
$news = new News();
//$news->id;
//all methods are working well <:)|=
$data = $news->getNews();
// $data = $news->getOneNews(2);
// $data = $news->getPoliticsNews();
// $data = $news->getFootballNews();
// $data = $news->getBasketballNews();
// $data = $news->getStrangersNews();
echo json_encode($data);
