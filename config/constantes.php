<?php
define('WEB_ROUTE','http://localhost:8000/');
define('HOST_BD','localhost');
//define('WEB_ROUTE','http://coudyly.alwaysdata.net/');
define('ROUTE_DIR',str_replace('public','',$_SERVER['DOCUMENT_ROOT']));
define('USER_BD', 'root');
define('PASSWORD_BD','coudylywane');
define('CHAINE_DE_CONNECTION','mysql:dbname=gestion_clinique;host='.HOST_BD);
define('UPLOAD_IMAGE',ROUTE_DIR.'public/img/uploods/');
define('NOMBRE_PAR_PAGE',3);
define('NOMBRE_PAR_PAGES',15);

?>