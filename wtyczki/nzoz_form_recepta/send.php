
<?php

// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';



$error = [];

$imie = $_POST['name'];
$nazwisko = $_POST['nazwisko'];
$pesel = $_POST['pesel'];
$lek = $_POST['nazwa_leku'];
$ile = $_POST['ilosc_opakowan'];
$lekarz = $_POST['lekarz'];
$valid = "1";
$e_imie = "";$e_nazwisko = ""; $e_pesel = ""; $e_lekarz = "";$e_lek="";$e_io="";
 if (!preg_match('/^[\pL \'-]*$/u', $imie)){
     $e_imie = 'imię musi składć się z minimum 2 liter i zawierać wyłącznie litery';
     $valid = "0";
     
 }
 if(strlen($imie) < 2){
     $e_imie = 'imię musi składć się z minimum 2 liter i zawierać wyłącznie litery';
     $valid = "0";
 }
 if(empty($imie)){
     $e_imie = 'proszę wpisać swoje imię';
     $valid = "0";
 } 


 if (!preg_match('/^[\pL \'-]*$/u', $nazwisko)){
     $e_nazwisko = 'nazwisko musi składć się z minimum 2 liter i zawierać wyłącznie litery';
     $valid = "0";
 }
 if(empty($nazwisko)){
     $e_nazwisko = 'proszę wpisać swoje nazwisko';
     $valid = "0";
 } 
 if(strlen($nazwisko) < 2){
     $e_nazwisko = 'nazwisko musi składć się z minimum 2 liter i zawierać wyłącznie litery';
     $valid = "0";
 }

 if (!preg_match('/^[0-9]{11}$/', $pesel)){
     $e_pesel = 'pesel musi się składać z tylko z 11 cyfr';
     $valid = "0";
 }
 if(empty($pesel)){
     $e_pesel = 'proszę wpisać swój pesel';
     $valid = "0";
 } 



 if (!preg_match('/^[\pL \'-]*$/u', $lekarz)){
     $e_lekarz = 'imię i nazwisko lekarza musi składć się z minimum 5 liter imię i nazwisko powinno być oddzielone spacją ';
     $valid = "0";
 }
 if(empty($lekarz)){
     $e_lekarz = 'proszę wpisać imię i nazwisko lekarza';
     $valid = "0";
 } 

 if(strlen($lekarz) < 5){
     $e_nazwisko = 'imię i nazwisko lekarza musi składć się z minimum 5 liter imię i nazwisko powinno być oddzielone spacją';
     $valid = "0";
 }


$tab=[];
foreach($_POST['nazwa_leku'] as $val => $ln){
    $nazwa = $ln;
    
    if(empty($nazwa)){
     $e_lek = 'nazwa leku nie może być pusta';
     $valid = "0";
 }
    
    foreach($_POST['ilosc_opakowan'] as $v => $li){
        if($val == $v){
            
          if ((!is_numeric($li)) || $li<=0){
            $e_io = 'ilość opakowań musi być cyfrą i nie może być ujemna';
            $valid = "0";
            }    
            
            
            $nazwa .= " - ".$li." szt.";
        }
    }
    $tab[]=$nazwa;
    
}

if($valid == "1"){


$mail = new PHPMailer(true);                              // Passing `true` enables exceptions

    //Server settings
    $mail->SMTPDebug = 0;                                 // Enable verbose debug output
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'smtp.iq.pl';                           // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'recepta@nzozcentrum.pl';                 // SMTP username
    $mail->Password = '8yXqYlYuYNBwcHkVhTsN';                           // SMTP password
    $mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 465;                                    // TCP port to connect to

    //Recipients
    $mail->setFrom('recepta@nzozcentrum.pl', 'Zamówienie recepty');
    $mail->addAddress('medycyna@nzozcentrum.pl', '');     // Add a recipient
//    $mail->addBCC('abarzdo@b2-biznes.pl');
    $mail->CharSet = "utf-8";
    

    //Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Zamówienie recepty przez formularz na stonie' ;
    
    $mail->Body    = '<p>imię i nazwisko pacjenta: <strong>'.$imie." ".$_POST['nazwisko'] .'</strong></p><hr>';
    $mail->Body   .= '<p>Pesel: <strong>'.$_POST['pesel'].'</strong></p><hr>';
    $mail->Body   .= '<p>Nazwa leku i ilość opakowań:</p><hr>';
    foreach($tab as $tab){
    $mail->Body   .= '<p>'.$tab.'</p><hr>';
    }
    $mail->Body   .= '<p>imię i nazwisko lekarza: <strong>'.$_POST['lekarz'].'</strong></p><hr>';
    
    
    if(!$mail->Send()) {
     echo "Mailer Error: " . $mail->ErrorInfo;
    }
    $mail->ClearAddresses();
    $mail->ClearAttachments();
   
   
}
    
    $form = array("val"=>$valid,"ei"=>$e_imie,"en"=>$e_nazwisko,"ep"=>$e_pesel,"el"=>$e_lekarz,'elek'=>$e_lek, "eio"=>$e_io);
    echo json_encode($form);


   



