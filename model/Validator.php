<?php
/**
*
* @author: Sergi Triadó <s.triado@sapalomera.cat>
*
*/
    require_once "http.request.php";

    class Validator{

        public static function usernameExists($username){
            $http = new HttpRequest("../../environment/environment.json");
            $environment = $http->getEnvironment();

            $url = $environment->protocol . $environment->baseUrl . $environment->dir->modules->api->usuari->read;
            $data = array('username' => $username, 'check' => true);
            $res = $http->makePostRequest($url, $data);
            if ($res) {
                return true;
            } else {
                return false;
            }
        }

        public static function emailExists($email){
            $http = new HttpRequest("../../environment/environment.json");
            $environment = $http->getEnvironment();

            $url = $environment->protocol . $environment->baseUrl . $environment->dir->modules->api->usuari->read;
            $data = array('email' => $email, 'check' => true);
            $res = $http->makePostRequest($url, $data);
            if ($res) {
                return true;
            } else {
                return false;
            }
        }

        public static function pwdValidation($pwd){
            
        }

    }
?>