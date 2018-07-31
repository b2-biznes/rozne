<?php

function nzoz_kal_connect(){
//	$dbname = "b2b1_crm_nzoz"; // nazwa bazy danych 
//    $host = "mariadb4.iq.pl"; // nazwa hosta 
//    $user = "b2b1_crm_nzoz"; // użytkownik
//    $pass = "Xu0U0IOmqa2KEITti9gX"; // hasło 

    $dbname = "bazacrm"; // nazwa bazy danych 
    $host = "localhost"; // nazwa hosta 
    $user = "root"; // użytkownik
    $pass = "121234"; // hasło 
    
try{
    $pdo = new PDO('mysql:host=' . $host . ';dbname=' . $dbname . ';', $user, $pass);
    $pdo->query('SET NAMES utf8');
    $pdo->query('SET CHARACTER_SET utf8_unicode_ci');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
	return $pdo;
}catch (Exception $ex) {
    echo "błąd połączenia z bazą danych ";
}
}

