<?php
    class LlistaArticles {

        private static $llista_articles;

        //GETTER
        public static function getArticles(){
            return self::$llista_articles;
        }

        public static function read_articles($offset, $row_count){
            $query = "SELECT * FROM articles LIMIT :offset, :row_count";
            $params = array(':offset' => $offset, ':row_count' => $row_count);

            Connexio::connect();
            $stmt = Connexio::execute($query, $params);

            $result = $stmt->fetchAll();
            $num = count($result);

            if ($num > 0) {
                foreach ($result as $row) {
                    extract($row);
                    
                    $article = new Article($row['article'], $row['nom'], $row['id']);

                    array_push(self::$llista_articles, $article);
                }
            }
            Connexio::close();
        }
    }
?>