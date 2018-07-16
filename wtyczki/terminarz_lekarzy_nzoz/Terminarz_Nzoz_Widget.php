
<?php
/**
	Plugin Name: terminarz_nzoz
	Description: harmonogram przyjęć lekarzy 
	Version: 1.0
	Author: Artur Barzdo
*/

function nzoz_kal_connect(){
    $dbname = "nzoz_b2b1_crm"; // nazwa bazy danych 
    $host = "mariadb2.iq.pl"; // nazwa hosta 
    $user = "nzoz_b2b1_crm"; // użytkownik
    $pass = "Xu0U0IOmqa2KEITti9gX"; // hasło 

//    $dbname = "bazacrm"; // nazwa bazy danych 
//    $host = "localhost"; // nazwa hosta 
//    $user = "root"; // użytkownik
//    $pass = "121234"; // hasło 
    
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


class DbData{
	
	public $res;
	private $dstart;
	private $dstop;
	private $clause;
	
	public function show_cal($id_l,$id_d){
		
            $id_departament = " ";
            $link = "";
                $id_lekarz = "AND (uid =".$id_l.")";
                    if($id_l == 0){
                        $link = "kal_wpisy.id_departament";
                        if($id_d==1){
                        $id_departament = "AND (`id_departament`>=2) AND (`id_departament`<4 )";    
                        }

                        else if($id_d==4){
                        $id_departament = "AND (`id_departament`>=4) AND (`id_departament`<13 )";    
                        }
                        else if($id_d==14){
                        $id_departament = " ";    
                        }
                        else{
                        $id_departament = "AND (id_departament =".$id_d.")";
                        }
                    }else{
                        $id_lekarz = "AND (uid =".$id_l.")";
                        $link = "us.uid";
                    }
        
		$this->dstart=date("Y-m-d", strtotime('monday this week'));
		$this->dstop=date("Y-m-d", strtotime('friday this week'));
		$pdo = nzoz_kal_connect();
		
		try {
			$sql = "Select  us.uid,data,godzina_r,godzina_z,us.fname,us.lname, 
                        dp.nazwa_departamentu, usl.link as link1, dep.link as link2 
                        from kal_wpisy
			left join users as us ON user_id = us.uid
			left join kal_zdarzenia ON zdarzenie_id = kal_zdarzenia.id_zdarzenie								 
			left join kal_departamenty as dp ON kal_wpisy.id_departament = dp.id_dep
                         left join kal_linki as usl ON kal_wpisy.user_id= usl.id_link 
                         left join kal_linki as dep ON kal_wpisy.id_departament= dep.id_link
			 WHERE (`data` BETWEEN '{$this->dstart}' AND '{$this->dstop}' )
                         AND (`zdarzenie_id` = 10)
                         AND (`dzial` = 40)";
                         ($id_l!=0)?",".$sql.=$id_lekarz : " ";
			 
                         ($id_d!=0)?",".$sql.=$id_departament :" ";
                         $sql.="ORDER BY `lname`,`data` ASC";
			
            $result = $pdo->query($sql); 
			$result->execute();
            $this->res = $result->fetchAll(PDO::FETCH_ASSOC);
//            echo $sql;
          
			
        } catch (PDOException $e) {
            echo "Error: " . $e;
        }
		
		return $this->res;
	}
        
        function getDepart($x){
            $pdo = nzoz_kal_connect();
            if($x < 4 || $x==0){
                $y = 1;
                $z = 4;
            }
            if($x>3 && $x < 13){
               $y = 4;
               $z = 13; 
            }
            if($x == 13){
               $y = 13;
               $z = 13; 
            }
            if($x == 14){
               $y = 14;
               $z = 14; 
            }
            try {
			$sql = "SELECT * FROM `kal_departamenty` WHERE (`id_dep`>='{$y}') AND (`id_dep`<'{$z}' )";
    
                         
			
            $result = $pdo->query($sql); 
			$result->execute();
            $this->res = $result->fetchAll(PDO::FETCH_ASSOC);
          
			
        } catch (PDOException $e) {
            echo "Error: " . $e;
        }
            
            
        }
        function showDepart($x){
            $pdo = nzoz_kal_connect();
            if($x == 0){
                $x=1;
            }
            try {
			$sql = "SELECT * FROM `kal_departamenty`"
                                . "WHERE id_dep = '{$x}'";
                        
                         
			
            $result = $pdo->query($sql); 
			$result->execute();
            $this->res = $result->fetchAll(PDO::FETCH_ASSOC);
          
			
        } catch (PDOException $e) {
            echo "Error: " . $e;
        }
            
            
        }
        function getDoktor(){
            $pdo = nzoz_kal_connect();
            
            try {
			$sql = "SELECT uid, fname, lname  FROM `users` WHERE dzial = 40";
                       
	
            $result = $pdo->query($sql); 
			$result->execute();
            $this->res = $result->fetchAll(PDO::FETCH_ASSOC);
          
            return $this->res;
        } catch (PDOException $e) {
            echo "Error: " . $e;
        }
            
            
        }
        }



class Terminarz_widget extends Wp_Widget {
    
    function __construct() {
        parent::__construct(
             'terminarz_widget' ,
             'Terminarz przyjęć',
             array('description'=>'pokaż terminarz przyjęć na stronie')
        );
    }
    
    function widget( $args, $instance ){
        extract($args);
        echo $before_widget;
  
        $id = isset($_GET['id'])?$_GET['id']:0;
        $idl = isset($_GET['idl'])?$_GET['idl']:0;
        $data1 = new Dbdata();
        $data1-> show_cal($idl, $id);
        
        $data2 = new Dbdata();
        $data2->showDepart($id);
        $data3 = new DbData();
        $data3->getDepart(1);
        $data3a = new DbData();
        $data3a->getDepart(4);
        $data4 = new DbData();
        $data4 ->getDoktor();
        ?>
<head>
	 <?= '<link rel="stylesheet" href="'.plugins_url( '/public/css/bootstrap.min.css', __FILE__ ).'" type="text/css" media="screen" />';?>
	 <?= '<link rel="stylesheet" href="'.plugins_url( '/public/css/st.css', __FILE__ ).'" type="text/css" media="screen" />';?>	
</head>
	

<section>
	<?php
//        echo "<pre>";
//          print_r($data1); 
//        echo "</pre>";
        ?>
            <div class="col-xs-12">
                <div class="row">
                    <div class="col-xs-2">
                    
                       
                        <div data-toggle="collapse" data-target="#demo" class="btn btn-primary btn-block">
                            <strong style="font-size:25px;color:white;">+</strong>  Podstawowa opieka<br/> zdrowotna</div>
                        
                   
                        <ul class="nav nav-pills nav-stacked">   
                        <div id="demo" class="collapse">
                                    <?php foreach($data3->res as $key=>$p){ ?>
                                    <li class="mrgli"><a href="?id=<?= $p['id_dep'] ?>&nz=<?= str_replace(" ", "-",$p['nazwa_departamentu']) ?>">
                                    <?= $p['nazwa_departamentu'] ?></a></li>
                                   
                                
                            

                                    <?php 
                                       }

                                    ?>
                        </div> 
                        
                            
                        
                        <div data-toggle="collapse" data-target="#demo1" class="btn btn-primary btn-block ">
                            <div calss="row">
                           <strong style="font-size:25px;color:white">+</strong>  Poradnie<br/> Specjalistyczne</div>
                            </div>
                         <div id="demo1" class="collapse">
                                    <?php foreach($data3a->res as $key=>$p){ ?>
                                    <li class="mrgli"><a href="?id=<?= $p['id_dep'] ?>&nz=<?= str_replace(" ", "-",$p['nazwa_departamentu']) ?>">
                                    <?= $p['nazwa_departamentu'] ?></a></li>
                                   
                                
                            

                                    <?php 
                                       }

                                    ?>
                        </div>
                        
                         
                        
                        <div data-toggle="collapse" data-target="#demo2" class="btn btn-primary btn-block">
                            <strong style="font-size:25px;color:white">+</strong>  Medycyna Pracy </div>
                        
                         <div id="demo2" class="collapse">
                                   <li class="mrgli"><a href="?id=13&nz=Medycyna-Pracy">Medycyna Pracy</a></li>   
                        </div>
                        
                         
                        
                        <div data-toggle="collapse" data-target="#demo3" class="btn btn-primary btn-block">
                            <strong style="font-size:25px;color:white">+</strong>  Grafik Lekarzy<br/>NZOZ Centrum </div>
                        
                         <div id="demo3" class="collapse">
                                    <li class="mrgli"><a href="?id=14&nz=Grafik-Lekarzy">Grafik Lekarzy NZOZ Centrum</a></li>
                                <?php foreach($data4->res as $key=>$p){ ?>
                                    <li class="mrgli"><a href="?id=14&idl=<?= $p['uid'] ?>&nz=<?= str_replace(" ", "-",$p['lname'])."-".$p['fname'] ?>">
                                    <?= $p['lname']." ".$p['fname'] ?></a></li>
                                   
                                
                            

                                    <?php 
                                       }

                                    ?>
                         </div>
                          
                        </ul>
                    </div>
                        
                   
                    <div class="col-xs-10">
		<div class="table">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <td class="col-sm-6 col-md-2 dnitygodnia"></td>
                                <td class="col-sm-6 col-md-2 dnitygodnia">Poniedziałek</td>
                                <td class="col-sm-6 col-md-2 dnitygodnia">Wtorek</td>
                                <td class="col-sm-6 col-md-2 dnitygodnia">Środa</td>
                                <td class="col-sm-6 col-md-2 dnitygodnia">Czwartek</td>
                                <td class="col-sm-6 col-md-2 dnitygodnia">Piątek</td>
                            </tr>
                            <?php 
                            
                            
                            
                                
                            $k = 0;  
                            $i = 0; 
                            $flaga = " ";
                            $tablica=[];
                            foreach($data1->res as $key=>$p){
                                
                                
                                if($p['uid']==$flaga){
                                    
                                    array_push($tablica,array($p['data']=>array($p['godzina_r'],$p['godzina_z'],$p['nazwa_departamentu'],$p['link2'])));
                                    $k = 0;   
                                }
                                
                                
                            if($k!=0){    
                            ?>
                             <tr>
                                <td class="col-sm-6 col-md-2 <?= ($i%2==0)? "lekarznazwa2" : "lekarznazwa1" ?>">
                                    
                                    <a class='link_a' href="<?= $tablica[2] ?>"><?= $tablica[0]." ".$tablica[1]; ?></a>
                                   
                                    
                                </td>
                                
                                <td class="col-sm-6 col-md-2 <?= ($i%2==0)? "lekarz1" : "lekarz2" ?>">
                                    <?php $pn = date("Y-m-d", strtotime('monday this week'));
                                    foreach($tablica as $val ){
                                    if(isset($val[$pn])) {
                                        echo "<a class='link_b'  href='".$val[$pn][3]."'>".$val[$pn][2]."</a><br/><br/>";
                                        echo '<p class="godziny">'.substr($val[$pn][0],0,5)." - ".substr($val[$pn][1],0,5).'</p>';
                                        
                                    }
                                    }
                                        
                                    ?>
                                </td> 
                                
                                 <td class="col-sm-6 col-md-2 <?= ($i%2==0)? "lekarz1" : "lekarz2" ?>">
                                   <?php $wt = date("Y-m-d", strtotime('tuesday this week'));
                                   foreach($tablica as $val ){
                                    if(isset($val[$wt])) {
                                        echo "<a class='link_b'  href='".$val[$wt][3]."'>".$val[$wt][2]."</a><br/><br/>";
                                        echo '<p class="godziny">'.substr($val[$wt][0],0,5)." - ".substr($val[$wt][1],0,5).'</p>';
                                        
                                    }
                                    }
                                        
                                    ?>
                                </td> 
                                
                                <td class="col-sm-6 col-md-2 <?= ($i%2==0)? "lekarz1" : "lekarz2" ?>">
                                    <?php $sr = date("Y-m-d", strtotime('wednesday this week'));
                                    
                                   foreach($tablica as $val ){
                                    if(isset($val[$sr])) {
                                        echo "<a class='link_b'  href='".$val[$sr][3]."'>".$val[$sr][2]."</a><br/><br/>";
                                        echo '<p class="godziny">'.substr($val[$sr][0],0,5)." - ".substr($val[$sr][1],0,5).'</p>';
                                        
                                    }
                                    }
                                        
                                    ?>
                                </td>     
                                    
                                <td class="col-sm-6 col-md-2 <?= ($i%2==0)? "lekarz1" : "lekarz2" ?>">
                                   <?php $cz = date("Y-m-d", strtotime('thursday this week'));
                                     foreach($tablica as $val ){
                                    if(isset($val[$cz])) {
                                        echo "<a class='link_b'  href='".$val[$cz][3]."'>".$val[$cz][2]."</a><br/><br/>";
                                        echo '<p class="godziny">'.substr($val[$cz][0],0,5)." - ".substr($val[$cz][1],0,5).'</p>';
                                        
                                    }
                                    }
                                        
                                    ?>
                                </td>     
                                    
                                <td class="col-sm-6 col-md-2 <?= ($i%2==0)? "lekarz1" : "lekarz2" ?>">
                                    <?php $pt = date("Y-m-d", strtotime('friday this week'));
                                    foreach($tablica as $val ){
                                    if(isset($val[$pt])) {
                                        echo "<a class='link_b'  href='".$val[$pt][3]."'>".$val[$pt][2]."</a><br/><br/>";
                                        echo '<p class="godziny">'.substr($val[$pt][0],0,5)." - ".substr($val[$pt][1],0,5).'</p>';
                               
                                     
                                    }
                                    }
                                    ?>
                                </td> 
                            </tr>
                            
                            
                            <?php
                            $i++;
                            }
                                
                                
                                
                                
                                
                                if($p['uid']!=$flaga){
                                   $tablica=array($p['lname'],$p['fname'],$p['link1']);
                                   array_push($tablica,array($p['data']=>array($p['godzina_r'],$p['godzina_z'],$p['nazwa_departamentu'],$p['link2']))); 
                                   $flaga=$p['uid'];
                                   

                            }
                            $k++;
//                            echo "<pre>";
//                                    print_r($tablica); 
//                            echo "</pre>";
                            }
                            
                            
//                        
                            ?>
                            
                              <tr>
                                <td class="col-sm-6 col-md-2 <?= ($i%2==0)? "lekarznazwa2" : "lekarznazwa1" ?>">
                                    
                                <?= $tablica[0]." ".$tablica[1]; ?>
                                   
                                    
                                </td>
                                
                                <td class="col-sm-6 col-md-2 <?= ($i%2==0)? "lekarz1" : "lekarz2" ?>">
                                    <?php $pn = date("Y-m-d", strtotime('monday this week'));
                                    foreach($tablica as $val ){
                                    if(isset($val[$pn])) {
                                        echo "<a class='link_b'  href='".$val[$pn][3]."'>".$val[$pn][2]."</a><br/><br/>";
                                        echo '<p class="godziny">'.substr($val[$pn][0],0,5)." - ".substr($val[$pn][1],0,5).'</p>';
                                        
                                    }
                                    }
                                        
                                    ?>
                                </td> 
                                
                                 <td class="col-sm-6 col-md-2 <?= ($i%2==0)? "lekarz1" : "lekarz2" ?>">
                                   <?php $wt = date("Y-m-d", strtotime('tuesday this week'));
                                   foreach($tablica as $val ){
                                    if(isset($val[$wt])) {
                                        echo "<a class='link_b'  href='".$val[$wt][3]."'>".$val[$wt][2]."</a><br/><br/>";
                                        echo '<p class="godziny">'.substr($val[$wt][0],0,5)." - ".substr($val[$wt][1],0,5).'</p>';
                                        
                                    }
                                    }
                                        
                                    ?>
                                </td> 
                                
                                <td class="col-sm-6 col-md-2 <?= ($i%2==0)? "lekarz1" : "lekarz2" ?>">
                                    <?php $sr = date("Y-m-d", strtotime('wednesday this week'));
                                    
                                   foreach($tablica as $val ){
                                    if(isset($val[$sr])) {
                                        echo "<a class='link_b'  href='".$val[$sr][3]."'>".$val[$sr][2]."</a><br/><br/>";
                                        echo '<p class="godziny">'.substr($val[$sr][0],0,5)." - ".substr($val[$sr][1],0,5).'</p>';
                                        
                                    }
                                    }
                                        
                                    ?>
                                </td>     
                                    
                                <td class="col-sm-6 col-md-2 <?= ($i%2==0)? "lekarz1" : "lekarz2" ?>">
                                   <?php $cz = date("Y-m-d", strtotime('thursday this week'));
                                     foreach($tablica as $val ){
                                    if(isset($val[$cz])) {
                                        echo "<a class='link_b'  href='".$val[$cz][3]."'>".$val[$cz][2]."</a><br/><br/>";
                                        echo '<p class="godziny">'.substr($val[$cz][0],0,5)." - ".substr($val[$cz][1],0,5).'</p>';
                                        
                                    }
                                    }
                                        
                                    ?>
                                </td>     
                                    
                                <td class="col-sm-6 col-md-2 <?= ($i%2==0)? "lekarz1" : "lekarz2" ?>">
                                    <?php $pt = date("Y-m-d", strtotime('friday this week'));
                                    foreach($tablica as $val ){
                                    if(isset($val[$pt])) {
                                        echo "<a class='link_b'  href='".$val[$pt][3]."'>".$val[$pt][2]."</a><br/><br/>";
                                        echo '<p class="godziny">'.substr($val[$pt][0],0,5)." - ".substr($val[$pt][1],0,5).'</p>';
                               
                                     
                                    }
                                    }
                                    ?>
                                </td> 
                            </tr>
                            
                        </thead>
                    </table>
                </div>
			
		</div>	
		</div>	
	</div>		
	</div>
	
	
	
</section>
   			
   			<?= '<script src="'.plugins_url( '/public/js/bootstrap.min.js', __FILE__ ).'"></script>';?>	
   		
	
			
			

	 </body>
        
        
<?php       
        echo $after_widget;
    }
    
}
function terminarz_load_widget(){
    register_widget('terminarz_widget');
}
add_action('widgets_init', 'terminarz_load_widget');