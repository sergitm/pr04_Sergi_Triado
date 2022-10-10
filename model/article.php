<?php
    class Article {

        //
        private $id;
        private $article;
        private $nom; 

        // CONSTRUCT
        public function __construct($article, $nom, $id = null)
        {
            $this->article = $article;
            $this->nom = $nom;
            $this->id = $id;
        }

        // GETTERS
        public function getArticle(){
            return $this->article;
        }
        public function getNom(){
            return $this->nom;
        }
        public function getId(){
            return $this->id;
        }

        // SETTERS
        public function setArticle($article){
            $this->article = $article;
        }
        public function setNom($nom){
            $this->nom = $nom;
        }
        public function setId($id){
            $this->id = $id;
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
            $query = "INSERT INTO articles (id, article, nom)
                        VALUES (:id, :article, :nom)";

            $params = array(':id' => $this->getId(),
                            ':article' => strtoupper($this->getArticle()),
                            ':nom' => strtoupper($this->getNom()), 
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
            $query = "UPDATE usuaris SET nom = :nom, article = :article WHERE id = :id";

            $params = array(':nom' => $this->getNom(), ':article' => $this->getArticle(), ':id' => $this->getId());

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
         * Métode de la interfícia JsonSerializable que indica la seva estructura quan es converteixi a JSON
         */
        public function jsonSerialize(){
            return [
                'article' => $this->getArticle(),
                'id' => $this->getId(),
                'nom' => $this->getNom()
            ];
        }
}
?>