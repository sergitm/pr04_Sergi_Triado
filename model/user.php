<?php
/**
*
* @author: Sergi Triadó <s.triado@sapalomera.cat>
*
*/
    class Usuari implements JsonSerializable {
        
        // PROPERTIES
        private $id;
        private $username;
        private $pwd;

        // CONSTRUCTOR
        public function __construct($username, $pwd, $id = null){
            $this->id = $id;
            $this->username = $username;
            $this->pwd = $pwd;
        }

        // GETTERS
        public function getId(){
            return $this->id;
        }
        public function getUsername(){
            return $this->username;
        }
        public function getPwd(){
            return $this->pwd;
        }

        // SETTERS
        public function setId($id){
            $this->id = $id;
        }
        public function setUsername($username){
            $this->username = $username;
        }
        public function setPwd($pwd){
            $this->pwd = $pwd;
        }

        // METHODS
        /**
         * create
         *
         * @return boolean
         * 
         * Métode per introduir un usuari a la BBDD
         */
        public function create(){
            $query = "INSERT INTO articles (id, username, pwd)
                        VALUES (:id, :username, :pwd)";

            $params = array(':id' => $this->getId(),
                            ':username' => strtoupper($this->getUsername()),
                            ':pwd' => strtoupper($this->getPwd()), 
            );

            Connexio::connect();
            $stmt = Connexio::execute($query,$params);

            if ($stmt) {
                return TRUE;
            } else {
                return FALSE;
            }
        }
        
        /**
         * delete
         *
         * @return void
         * 
         * Métode per eliminar un usuari de la BBDD
         */
        public function delete(){
            $query = "DELETE FROM usuaris WHERE id = :id";

            $params = array(':id' => $this->getId());

            Connexio::connect();
            $stmt = Connexio::execute($query, $params);
            Connexio::close();

            return $stmt;
        }
        
        /**
         * update
         *
         * @return void
         * 
         * Métode per modificar un usuari de la BBDD
         */
        public function update(){
            $query = "UPDATE usuaris SET username = :username, pwd = :pwd WHERE id = :id";

            $params = array(':username' => $this->getUsername(), ':pwd' => $this->getPwd(), ':id' => $this->getId());

            Connexio::connect();
            $stmt = Connexio::execute($query, $params);
            Connexio::close();
            
            return $stmt;
        }


        /**
         * jsonSerialize
         *
         * @return JSONObject
         * 
         * Métode de la interfície JsonSerializable que indica la seva estructura quan es converteixi a JSON
         */
        public function jsonSerialize(){
            return [
                'username' => $this->getUsername(),
                'pwd' => $this->getPwd(),
                'id' => $this->getId()
            ];
        }
    }
?>