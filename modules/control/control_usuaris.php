<?php

    class ControlUsuaris {
        private static $llista_usuaris;

        public static function getUsuaris(){
            return self::$llista_usuaris;
        }

        public static function user_exists($username, $email){
            $query = "SELECT * FROM usuaris WHERE username = :username OR email = :email";

            $params = array(
                'username' => strtoupper($username),
                'email' => strtoupper($email)
            );

            Connexio::connect();

            $stmt = Connexio::execute($query, $params);

            if($stmt->rowCount() > 0){
                return true;
            } else {
                return false;
            }
        }

        public static function user_auth($id, $pwd){
            $query = "SELECT * FROM usuaris WHERE (username = :id OR email = :id) AND password = :pwd";

            $params = array(
                'id' => strtoupper($id),
                'pwd' => $pwd
            );

            Connexio::connect();

            $stmt = Connexio::execute($query, $params);

            if($stmt->rowCount() > 0){
                return true;
            } else {
                return false;
            }
        }
    }

?>