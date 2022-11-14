@author Sergi Triadó <s.triado@sapalomera.cat>

*** IMPORTANT CANVIAR LA BASEURL DEL FITXER ENVIRONMENT.JSON A LA URL BASE DEL PROJECTE ***

Com a millores he fet la introducció de nous articles i s'afegeixen segons l'autor (usuari registrat), els posts per pàgina es poden 
modificar per veure la llista d'articles amb una paginació diferent

Sobretot a nivell de formularis, la majoria de millores possibles serien més senzilles de fer amb JavaScript, pero per falta de temps 
no he pogut implementar moltes de les coses

L'estructura de la aplicació es la següent

/environment/
        /environment.json   *** IMPORTANT CANVIAR EL VALOR DE LA BASEURL D'AQUEST FITXER PERQUE FUNCIONI

/model/                     *** model
            /user.php           *** Classe per crear objectes Usuari
            /article.php        *** Classe per crear objectes Article
            /http.request.php   *** Classe amb funcions estàtiques per fer peticions HTTP al Backend
            /Validator.php      *** Classe amb funcions estàtiques per validar formularis

/modules/                   *** Aquesta carpeta és el propi Backend
        /api/                   *** Entrada al Backend, cada fitxer s'encarrega d'una funció específica
            /article/
                /create.php 
                /delete.php
                /read.php
                /update.php
            /usuari/
                /read.php
                /update.php

        /config/                *** Fitxers amb les clases que pertanyen a la connexió a la BBDD
            /database.php

        /control/               *** Controlador
            /llista_articles.php    *** Controlador d'articles
            /control_usuaris.php    *** Controlador d'usuaris

/public/                    *** Fitxers HTML i PHP senzills que pertanyen a la VISTA
    /fontawesome/               *** Carpeta amb els fitxers necessaris per fer servir les utilities de FontAwesome
    /styles/                    *** Fitxers d'estils
    /navbar.php                 *** Barra de navegació

/templates/                 *** Fitxers de PHP i formularis més complexes que necessiten de més codi
    /articles/                  *** Fitxer que s'executa quan es clica al botó d'eliminar un usuari
        /articles.php           *** Fitxer que controla els articles
        /articles.vista.php     *** Fitxer amb la vista dels articles
        /delete.php             *** Fitxer que controla l'eliminació d'articles
        /update.php             *** Fitxer que controla l'actualització d'articles
        /update.view.php        *** Fitxer amb la vista del formulari per actualitzar un article

    /login/                 *** Fitxer que s'executa quan es clica al botó de crear un usuari, inclou el formulari amb les seves validacions
        /login.php              *** Fitxer que controla el login
        /login.view.php         *** Fitxer amb la vista del Login
        /signup.php             *** Fitxer que controla el registre
        /signup.view.php        *** Fitxer amb la vista del formulari de registre

/index.php                  ***