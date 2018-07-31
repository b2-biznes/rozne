<?php

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
                         ($id_l!=" ")?",":" ";
			 $sql.=$id_lekarz;
                         ($id_d!=" ")?",":" ";
                         $sql.=$id_departament;
			
            $result = $pdo->query($sql); 
			$result->execute();
            $this->res = $result->fetchAll(PDO::FETCH_ASSOC);
            
			
        } catch (PDOException $e) {
            echo "Error: " . $e;
        }
		
		return $this->res;
	}
}
