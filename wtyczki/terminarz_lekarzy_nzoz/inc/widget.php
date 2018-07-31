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



class DbData{
	
	public $res;
	private $dstart;
	private $dstop;
	private $clause;
	
	public function show_cal($id_l,$id_d){
		
                $id_lekarz = "(AND idu =".$id_l.")";
                $id_departament = $id_d;
            
		$this->dstart=date("Y-m-d", strtotime('monday this week'));
		$this->dstop=date("Y-m-d", strtotime('friday this week'));
		$pdo = nzoz_kal_connect();
		
		try {
			$sql = "Select idu, data,godzina_r,godzina_z,fname,lname, zdarzenie_id  from kal_wpisy
			left join users ON kal_wpisy.user_id = users.id
			left join kal_zdarzenia ON kal_wpisy.zdarzenie_id = kal_zdarzenia.id_zdarzenie								 
											 
			 WHERE (`data` BETWEEN '{$this->dstart}' AND '{$this->dstop}' )
                         AND (`zdarzenie_id` = 10)
                         AND (`dzial` = 40)";
//                         ($id_l!=" ")?",":" ";
//			 $sql.=$id_lekarz;
//                         ($id_d!=" ")?",":" ";
//                         $sql.=$id_departament;
			
            $result = $pdo->query($sql); 
			$result->execute();
            $this->res = $result->fetchAll(PDO::FETCH_ASSOC);
            return "$sql";
			
        } catch (PDOException $e) {
            echo "Error: " . $e;
        }
		
		return $this->res;
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
  
        ?>
<head>
	 <?= '<link rel="stylesheet" href="'.plugins_url( '/public/css/bootstrap.min.css', __FILE__ ).'" type="text/css" media="screen" />';?>
	 <?= '<link rel="stylesheet" href="'.plugins_url( '/public/css/st.css', __FILE__ ).'" type="text/css" media="screen" />';?>	
</head>
	

<section>
	
            <div class="col-xs-12">
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
                            
                           
                            
//                            $data1 = new Dbdata();
//                            $data1-> show_cal(" "," ");
                            
                            for($i = 0 ; $i<10 ; $i++){
                            ?>
                             <tr>
                                <td class="col-sm-6 col-md-2 <?= ($i%2==0)? "lekarznazwa2" : "lekarznazwa1" ?>">
                                    
                                    Kral-Bętkowska Miranda
                                
                                </td>
                                <td class="col-sm-6 col-md-2 <?= ($i%2==0)? "lekarz1" : "lekarz2" ?>">
                                    Podstawowa opieka zdrowotna<br/><br/>
                                    <p class="godziny">08.00 - 14.00</p></td>
                                 <td class="col-sm-6 col-md-2 <?= ($i%2==0)? "lekarz1" : "lekarz2" ?>">
                                    Podstawowa opieka zdrowotna<br/><br/>
                                    <p class="godziny">08.00 - 14.00</p></td>
                                <td class="col-sm-6 col-md-2 <?= ($i%2==0)? "lekarz1" : "lekarz2" ?>">
                                    Podstawowa opieka zdrowotna<br/><br/>
                                    <p class="godziny">08.00 - 14.00</p></td>
                                <td class="col-sm-6 col-md-2 <?= ($i%2==0)? "lekarz1" : "lekarz2" ?>">
                                    Podstawowa opieka zdrowotna<br/><br/>
                                    <p class="godziny">08.00 - 14.00</p></td>
                                <td class="col-sm-6 col-md-2 <?= ($i%2==0)? "lekarz1" : "lekarz2" ?>">
                                    Podstawowa opieka zdrowotna<br/><br/>
                                    <p class="godziny">08.00 - 14.00</p></td>
                            </tr>
                            
                            <?php 
                            }
                            ?>
                        </thead>
                    </table>
                </div>
			
			
			
	</div>		
	</div>
	
	
	
</section>
   			
   			<?= '<script src="'.plugins_url( '/public/js/bootstrap.min.js', __FILE__ ).'"></script>';?>	
   		
	
			
			

	 </body>
        
        
<?php       
        $args['after_widget'];
    }
    
}
function terminarz_load_widget(){
    register_widget('terminarz_widget');
}
add_action('widgets_init', 'terminarz_load_widget');