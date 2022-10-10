<?php 
    require_once "../config/database.php";
    require_once "../control/llista_articles.php";
    require_once "../../model/article.php";

    if (!empty($_GET['offset']) && !empty($_GET['row_count'])) {
        LlistaArticles::read_articles($_GET['offset'], $_GET['row_count']);

        $llista_articles = LlistaArticles::getArticles();
    }

    echo json_encode($llista_articles);
?>