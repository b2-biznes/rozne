<?php 
	/*
	Plugin Name: tabela nzoz
	Description: Tabela z wyszukiwaniem i pginacją dla nzoz
	Version: 1.1
	Author: Artur Barzdo
	*/


add_action( 'widgets_init', 'mdw_register_first_widget' );

function mdw_register_first_widget() {
    register_widget( 'Nzoz_Widget');
}

class Nzoz_Widget extends WP_Widget {
    function  __construct() {
        // tablica opcji.
        $widget_ops = array(
            'classname' => 'Nzoz_widget', //nazwa klasy widgetu
            'description' => 'Nzoz_widget', //opis widoczny w panelu
        );
        //ładowanie
        parent::__construct( 'Nzoz_Widget', 'Nzoz Widget', $widget_ops );
    }
    function form($instance) {
        // Formularz w kokpicie administratora (tam gdzie przeciągamy widgety)
       
        ?>
       
            <label>tabela nzoz</label>
           
        <?php
    }
    function update($new_instance, $old_instance) {
        // zapis opcji widgetu
        $instance = $old_instance;
        $instance['tekst'] = strip_tags( $new_instance['tekst']);
        return $instance;
    }
    function widget( $args, $instance) {
        // Wyświetlanie widgetu uzytkownikowi
        extract($args);
        echo $before_widget;
       

?>

<head>
	 <?= '<link rel="stylesheet" href="'.plugins_url( '/public/css/bootstrap.min.css', __FILE__ ).'" type="text/css" media="screen" />';?>
	 <?= '<link rel="stylesheet" href="'.plugins_url( '/public/css/css/st.css', __FILE__ ).'" type="text/css" media="screen" />';?>
	 <?= '<link rel="stylesheet" href="'.plugins_url( '/public/css/tab.css', __FILE__ ).'" type="text/css" media="screen" />';?>
	 <?= '<link rel="stylesheet" href="'.plugins_url( '/public/css/ttt.css', __FILE__ ).'" type="text/css" media="screen" />';?>
	
</head>
	

<section>
	<div class="container">
		<div class="panel-group " id="according">
			
			
			<div class="panel panel-default naglowek">
				
				<div class="panel-heading naglowek row">
					<a href="#roz1" data-toggle="collapse" data-parent="#according">
						<h2>
							<div class="col-md-4 col-lg-4">
								<span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span>
							</div>
                            <div class="col-md-6 col-lg-6">
								Badanie Laboratoryjne
							</div>
						</h2>
					</a>
				</div>
            </div>	
				
			<div id="roz1" class="panel-cllapse collapse">
					<div class="panel-body">
						
						<table id="" class="table table-striped table-bordered display " style="width:99%">
        <thead>
                    <tr>
						<td  class="no-sort sorting_disabled"> Nazwa </td>
						<td class="no-sort"> Cena </td>
					</tr>
        </thead>
        <tbody>


<tr>
<td>17-HYDROKSYKORTYKOSTEROIDY W DZM</td>
<td>42,00 zł</td>
</tr>
<tr>
<td>17-HYDROKSYPROGESTERON</td>
<td>48,00 zł</td>
</tr>
<tr>
<td>17-KETOSTEROIDY W DZM</td>
<td>42,00 zł</td>
</tr>
<tr>
<td>ALBUMINA</td>
<td>8,00 zł</td>
</tr>
<tr>
<td>ALDOSTERON</td>
<td>42,00 zł</td>
</tr>
<tr>
<td>ALFAFETOPROTEINA (AFP)</td>
<td>30,00 zł</td>
</tr>
<tr>
<td>AMINOTRANSFERAZA ALANINOWA (ALT)</td>
<td>7,00 zł</td>
</tr>
<tr>
<td>AMINOTRANSFERAZA ASPARAGINIANOWA (AST)</td>
<td>7,00 zł</td>
</tr>
<tr>
<td>AMYLAZA</td>
<td>9,00 zł</td>
</tr>
<tr>
<td>ANDROSTENDION</td>
<td>42,00 zł</td>
</tr>
<tr>
<td>ANTY - TPO</td>
<td>25,00 zł</td>
</tr>
<tr>
<td>ANTYGEN KARCINEMBRIONALNY (CEA)</td>
<td>30,00 zł</td>
</tr>
<tr>
<td>ANTYTROMBINA III (AT III)</td>
<td>23,00 zł</td>
</tr>
<tr>
<td>ANTY-TYREOGLOBULINOWE LAB. (TG)</td>
<td>30,00 zł</td>
</tr>
<tr>
<td>BADANIE OGÓLNE - KAŁ</td>
<td>10,00 zł</td>
</tr>
<tr>
<td>BADANIE OGÓLNE MOCZU (PROFIL)</td>
<td>8,00 zł</td>
</tr>
<tr>
<td>BADANIE W KIERUNKU PRZECIWCIAŁ RH</td>
<td>35,00 zł</td>
</tr>
<tr>
<td>BETA-HCG</td>
<td>25,00 zł</td>
</tr>
<tr>
<td>BEZPOŚREDNI TEST ANTYGLOBULINOWY</td>
<td>12,00 zł</td>
</tr>
<tr>
<td>BIAŁKO C_1</td>
<td>95,00 zł</td>
</tr>
<tr>
<td>BIAŁKO CAŁKOWITE</td>
<td>7,00 zł</td>
</tr>
<tr>
<td>BIAŁKO C-REAKTYWNE (CRP)</td>
<td>10,00 zł</td>
</tr>
<tr>
<td>BIAŁKO S</td>
<td>95,00 zł</td>
</tr>
<tr>
<td>BIAŁKO W DZM</td>
<td>7,00 zł</td>
</tr>
<tr>
<td>BIAŁKO W MOCZU</td>
<td>7,00 zł</td>
</tr>
<tr>
<td>BILIRUBINA BEZPOŚREDNIA</td>
<td>7,00 zł</td>
</tr>
<tr>
<td>BILIRUBINA CAŁKOWITA</td>
<td>6,00 zł</td>
</tr>
<tr>
<td>BORELIOZA IGG</td>
<td>35,00 zł</td>
</tr>
<tr>
<td>BORELIOZA IGG MET. WESTERN-BLOT</td>
<td>120,00 zł</td>
</tr>
<tr>
<td>BORELIOZA IGM</td>
<td>35,00 zł</td>
</tr>
<tr>
<td>BORELIOZA IGM MET. WESTERN-BLOT</td>
<td>120,00 zł</td>
</tr>
<tr>
<td>CA 125</td>
<td>30,00 zł</td>
</tr>
<tr>
<td>CA 15-3</td>
<td>35,00 zł</td>
</tr>
<tr>
<td>CA 19-9</td>
<td>30,00 zł</td>
</tr>
<tr>
<td>CERULOPLAZMINA</td>
<td>90,00 zł</td>
</tr>
<tr>
<td>CHLAMYDIA PNEUMONIAE IGG</td>
<td>35,00 zł</td>
</tr>
<tr>
<td>CHLAMYDIA PNEUMONIAE IGM</td>
<td>35,00 zł</td>
</tr>
<tr>
<td>CHLAMYDIA TRACHOMATIS IGG</td>
<td>40,00 zł</td>
</tr>
<tr>
<td>CHLAMYDIA TRACHOMATIS IGM</td>
<td>40,00 zł</td>
</tr>
<tr>
<td>CHLOREK(CL)</td>
<td>7,00 zł</td>
</tr>
<tr>
<td>CHOLESTEROL CAŁKOWITY</td>
<td>8,00 zł</td>
</tr>
<tr>
<td>CHOLESTEROL HDL</td>
<td>9,00 zł</td>
</tr>
<tr>
<td>CHOLESTEROL LDL</td>
<td>5,00 zł</td>
</tr>
<tr>
<td>CK-MB</td>
<td>30,00 zł</td>
</tr>
<tr>
<td>CMV CYTOMEGALOVIRUS IGG</td>
<td>35,00 zł</td>
</tr>
<tr>
<td>CMV CYTOMEGALOVIRUS IGM</td>
<td>35,00 zł</td>
</tr>
<tr>
<td>C-PEPTYD</td>
<td>40,00 zł</td>
</tr>
<tr>
<td>CYNK (ZN)</td>
<td>66,00 zł</td>
</tr>
<tr>
<td>CZAS CZĘŚCIOWEJ TROMBOPLASTYNY PO AKTYWACJI (APTT)</td>
<td>10,00 zł</td>
</tr>
<tr>
<td>CZAS PROTROMBINOWY PT</td>
<td>10,00 zł</td>
</tr>
<tr>
<td>CZAS TROMBINOWY (TT)_1</td>
<td>15,00 zł</td>
</tr>
<tr>
<td>CZYNNIK REUMATOIDALNY (RF)</td>
<td>15,00 zł</td>
</tr>
<tr>
<td>D-DIMER</td>
<td>35,00 zł</td>
</tr>
<tr>
<td>DEHYDROGENAZA MLECZANOWA (LDH)</td>
<td>9,00 zł</td>
</tr>
<tr>
<td>DHEA</td>
<td>42,00 zł</td>
</tr>
<tr>
<td>DHEAS</td>
<td>25,00 zł</td>
</tr>
<tr>
<td>DOPEŁNIACZ, SKŁADOWA C-3C</td>
<td>95,00 zł</td>
</tr>
<tr>
<td>DOPEŁNIACZ, SKŁADOWA C-4</td>
<td>95,00 zł</td>
</tr>
<tr>
<td>EBV (EPSTEIN BARR VIRUS) IGG</td>
<td>65,00 zł</td>
</tr>
<tr>
<td>EOZYNA WYMAZ Z NOSA</td>
<td>24,00 zł</td>
</tr>
<tr>
<td>ESTERAZA CHOLINOWA SUROWICY(PSEUDOCHOLINOESTERAZA)</td>
<td>15,00 zł</td>
</tr>
<tr>
<td>ESTRADIOL</td>
<td>25,00 zł</td>
</tr>
<tr>
<td>ETYLOWY ALKOHOL</td>
<td>25,00 zł</td>
</tr>
<tr>
<td>FERRYTYNA</td>
<td>30,00 zł</td>
</tr>
<tr>
<td>FIBRYNOGEN (FIBR)</td>
<td>10,00 zł</td>
</tr>
<tr>
<td>FOSFATA KWAŚNA</td>
<td>15,00 zł</td>
</tr>
<tr>
<td>FOSFATA W DZM</td>
<td>7,00 zł</td>
</tr>
<tr>
<td>FOSFATA ZASADOWA</td>
<td>6,00 zł</td>
</tr>
<tr>
<td>FOSFATAZA ZASADOWA IZOENZYM KOSTNY</td>
<td>10,00 zł</td>
</tr>
<tr>
<td>FOSFORANY</td>
<td>7,00 zł</td>
</tr>
<tr>
<td>FSH</td>
<td>25,00 zł</td>
</tr>
<tr>
<td>FT3</td>
<td>20,00 zł</td>
</tr>
<tr>
<td>FT4</td>
<td>20,00 zł</td>
</tr>
<tr>
<td>GAZOMETRIA</td>
<td>33,00 zł</td>
</tr>
<tr>
<td>GGTP</td>
<td>9,00 zł</td>
</tr>
<tr>
<td>GLUKOZA NA CZCZO</td>
<td>7,00 zł</td>
</tr>
<tr>
<td>GLUKOZA TEST OBCIĄŻENIA 75G 2H</td>
<td>7,00 zł</td>
</tr>
<tr>
<td>GLUKOZA W MOCZU</td>
<td>7,00 zł</td>
</tr>
<tr>
<td>GRUPY KRWI - OZNACZENIE UKŁADU ABO I RH</td>
<td>30,00 zł</td>
</tr>
<tr>
<td>HAV PRZECIWCIAŁA CAŁKOWITE</td>
<td>65,00 zł</td>
</tr>
<tr>
<td>HAV PRZECIWCIAŁA IGM</td>
<td>35,00 zł</td>
</tr>
<tr>
<td>HBC PRZECIWCIAŁA</td>
<td>40,00 zł</td>
</tr>
<tr>
<td>HBE ANTYGEN</td>
<td>40,00 zł</td>
</tr>
<tr>
<td>HBS ANTYGEN</td>
<td>15,00 zł</td>
</tr>
<tr>
<td>HBS PRZECIWCIAŁA ILOŚCIOWO</td>
<td>25,00 zł</td>
</tr>
<tr>
<td>HBSAG TEST POTWIERDZENIA</td>
<td>40,00 zł</td>
</tr>
<tr>
<td>HCG</td>
<td>25,00 zł</td>
</tr>
<tr>
<td>HCV PRZECIWCIAŁA</td>
<td>35,00 zł</td>
</tr>
<tr>
<td>HE4</td>
<td>125,00 zł</td>
</tr>
<tr>
<td>HELICOBACTER PYLORI PRZECIWCIAŁA ILOŚCIOWO</td>
<td>40,00 zł</td>
</tr>
<tr>
<td>HELICOBACTER PYLORI-ANTYGEN [MATERIAŁ: KAŁ]</td>
<td>25,00 zł</td>
</tr>
<tr>
<td>HEMOGLOBINA GLIKOWANA HBA1C</td>
<td>20,00 zł</td>
</tr>
<tr>
<td>HIV AG/AB (COMBO)</td>
<td>30,00 zł</td>
</tr>
<tr>
<td>HOMOCYSTEINA</td>
<td>65,00 zł</td>
</tr>
<tr>
<td>HSV (HERPES SIMPLEX VIRUS) IGG</td>
<td>80,00 zł</td>
</tr>
<tr>
<td>HSV (HERPES SIMPLEX VIRUS) IGM</td>
<td>80,00 zł</td>
</tr>
<tr>
<td>IGE CAŁKOWITE</td>
<td>25,00 zł</td>
</tr>
<tr>
<td>IGE SP. F11 - GRYKA</td>
<td>45,00 zł</td>
</tr>
<tr>
<td>IMMUNOGLOBULINA IGA</td>
<td>18,00 zł</td>
</tr>
<tr>
<td>IMMUNOGLOBULINA IGG</td>
<td>18,00 zł</td>
</tr>
<tr>
<td>IMMUNOGLOBULINA IGM</td>
<td>18,00 zł</td>
</tr>
<tr>
<td>INSULINA</td>
<td>25,00 zł</td>
</tr>
<tr>
<td>KALCYTONINA</td>
<td>90,00 zł</td>
</tr>
<tr>
<td>KAŁ - GIARDIA LAMBLIA ANTYGEN (GIARDIA LAMBLIA ANTYGEN)</td>
<td>25,00 zł</td>
</tr>
<tr>
<td>KAŁ POSIEW BAD. BAKTER.</td>
<td>30,00 zł</td>
</tr>
<tr>
<td>KIŁA (TREPONEMA PALLIDUM ) WR (RPR CARBO)</td>
<td>15,00 zł</td>
</tr>
<tr>
<td>KINAZA KREATYNOWA</td>
<td>10,00 zł</td>
</tr>
<tr>
<td>KORTYZOL</td>
<td>30,00 zł</td>
</tr>
<tr>
<td>KREATYNINA</td>
<td>7,00 zł</td>
</tr>
<tr>
<td>KREATYNINA W DZM</td>
<td>7,00 zł</td>
</tr>
<tr>
<td>KREW UTAJONA W KALE</td>
<td>16,00 zł</td>
</tr>
<tr>
<td>KWAS DELTA-AMINOLEWULINOWY</td>
<td>40,00 zł</td>
</tr>
<tr>
<td>KWAS FOLIOWY</td>
<td>30,00 zł</td>
</tr>
<tr>
<td>KWAS MOCZOWY</td>
<td>8,00 zł</td>
</tr>
<tr>
<td>KWAS MOCZOWY W DZM</td>
<td>10,00 zł</td>
</tr>
<tr>
<td>LA ANTYKOAGULANT TOCZNIOWY</td>
<td>160,00 zł</td>
</tr>
<tr>
<td>LH HORMON LUTEINUZUJĄCY</td>
<td>25,00 zł</td>
</tr>
<tr>
<td>LIPAZA</td>
<td>10,00 zł</td>
</tr>
<tr>
<td>LIPIDOGRAM</td>
<td>30,00 zł</td>
</tr>
<tr>
<td>LIT</td>
<td>30,00 zł</td>
</tr>
<tr>
<td>MAGNEZ</td>
<td>8,00 zł</td>
</tr>
<tr>
<td>MAGNEZ W DZM</td>
<td>8,00 zł</td>
</tr>
<tr>
<td>MIEDŹ - ILOŚCIOWO [MATERIAŁ: KREW]</td>
<td>35,00 zł</td>
</tr>
<tr>
<td>MIOGLOBINA</td>
<td>10,00 zł</td>
</tr>
<tr>
<td>MOCZ - MIKROALBUMINURIA</td>
<td>36,00 zł</td>
</tr>
<tr>
<td>MOCZ POSIEW ( BAD. BAKTER.)</td>
<td>25,00 zł</td>
</tr>
<tr>
<td>MOCZ POSIEW ( BAD. MYKOL)</td>
<td>25,00 zł</td>
</tr>
<tr>
<td>MOCZNIK</td>
<td>7,00 zł</td>
</tr>
<tr>
<td>MOCZNIK W DZM</td>
<td>7,00 zł</td>
</tr>
<tr>
<td>MONONUKLEOZA ZAKAŹNA IGG (EBV IGG)</td>
<td>40,00 zł</td>
</tr>
<tr>
<td>MONONUKLEOZA ZAKAŹNA IGM (EBV IGG)</td>
<td>40,00 zł</td>
</tr>
<tr>
<td>MORFOLOGIA KRWI, Z PEŁNYM RÓŻNICOWANIEM GRANULOCYTÓW</td>
<td>8,00 zł</td>
</tr>
<tr>
<td>MYCOPLASMA PNEUMONIAE IGG</td>
<td>30,00 zł</td>
</tr>
<tr>
<td>MYCOPLASMA PNEUMONIAE IGM</td>
<td>30,00 zł</td>
</tr>
<tr>
<td>ODCZYN OPADANIA KRWINEK CZERWONYCH</td>
<td>6,00 zł</td>
</tr>
<tr>
<td>ODCZYN WAALERA # ROSEGO</td>
<td>8,00 zł</td>
</tr>
<tr>
<td>ODRA (MORBILLI VIRUS) IGG</td>
<td>85,00 zł</td>
</tr>
<tr>
<td>ODRA (MORBILLI VIRUS) IGM</td>
<td>85,00 zł</td>
</tr>
<tr>
<td>OŁÓW</td>
<td>70,00 zł</td>
</tr>
<tr>
<td>OSPA (VARICELLA ZOSTER VIRUS) IGG</td>
<td>80,00 zł</td>
</tr>
<tr>
<td>OSPA (VARICELLA ZOSTER VIRUS) IGM</td>
<td>80,00 zł</td>
</tr>
<tr>
<td>OSTEOKALCYNA</td>
<td>60,00 zł</td>
</tr>
<tr>
<td>P/C ANTY-CCP</td>
<td>60,00 zł</td>
</tr>
<tr>
<td>P/C PRZECIW RECEPTOROM TSH</td>
<td>95,00 zł</td>
</tr>
<tr>
<td>P/C. P. ANTYGENOM CYTOPLAZMY NEUTROFILÓW ANCA (PANCA I CANCA) MET. IIF</td>
<td>90,00 zł</td>
</tr>
<tr>
<td>P/C. P. BETA-2-GLIKOPROTEINIE I W KL. IGG I IGM (ŁĄCZNIE) MET. ELISA L</td>
<td>215,00 zł</td>
</tr>
<tr>
<td>P/C. P. BETA-2-GLIKOPROTEINIE I W KL. IGG MET. ELISA</td>
<td>120,00 zł</td>
</tr>
<tr>
<td>P/C. P. BETA-2-GLIKOPROTEINIE I W KL. IGM MET. ELISA</td>
<td>120,00 zł</td>
</tr>
<tr>
<td>P/C. P. DSDNA IGG MET. ELISA</td>
<td>65,00 zł</td>
</tr>
<tr>
<td>P/C. P. ENDOMYSIUM (EMA) W KL. IGA MET. IIF</td>
<td>5,00 zł</td>
</tr>
<tr>
<td>P/C. P. ENDOMYSIUM (EMA) W KL. IGG MET. IIF</td>
<td>57,00 zł</td>
</tr>
<tr>
<td>P/C. P. GLIADYNIE (AGA) W KL. IGA MET. IIF</td>
<td>60,00 zł</td>
</tr>
<tr>
<td>P/C. P. GLIADYNIE (AGA) W KL. IGG MET. IIF</td>
<td>60,00 zł</td>
</tr>
<tr>
<td>P/C. P. KOMÓRKOM OKŁADZINOWYM ŻOŁĄDKA (APCA) MET. IIF</td>
<td>130,00 zł</td>
</tr>
<tr>
<td>P/C. P. MIĘŚNIOM GŁADKIM (ASMA) MET. IIF</td>
<td>48,00 zł</td>
</tr>
<tr>
<td>P/C. P. MITOCHONDRIALNE (AMA) TYP M2 MET. IIF</td>
<td>115,00 zł</td>
</tr>
<tr>
<td>PANEL MIESZANY (20 ALERGENÓW) [MATERIAŁ: KREW ŻYLNA, SUROWICA]</td>
<td>180,00 zł</td>
</tr>
<tr>
<td>PANEL POKARMOWY (20 ALERGENÓW) [MATERIAŁ: KREW ŻYLNA, SUROWICA]</td>
<td>180,00 zł</td>
</tr>
<tr>
<td>PANEL WĄTROB. (ANTY-LKM, ANTY-LSP, ANTY-SLA) MET. IIF</td>
<td>55,00 zł</td>
</tr>
<tr>
<td>PANEL WĄTROB. PEŁNY (ANA2,AMA,ASMA,ANTY-LKM,ANTY-LSP,ANTY-SLA)</td>
<td>115,00 zł</td>
</tr>
<tr>
<td>PANEL WĄTROB. SPECJALISTYCZNY ( ANTY-LKM-1, ANTY-SLA/LP, AMA M2)</td>
<td>105,00 zł</td>
</tr>
<tr>
<td>PANEL WZIEWNY (20 ALERGENÓW) [MATERIAŁ: KREW ŻYLNA, SUROWICA]</td>
<td>180,00 zł</td>
</tr>
<tr>
<td>PARATHORMON</td>
<td>30,00 zł</td>
</tr>
<tr>
<td>PASOŻYTY/JAJA PASOŻYTÓW W KALE</td>
<td>12,00 zł</td>
</tr>
<tr>
<td>PŁYTKI KRWI ? LICZBA</td>
<td>8,00 zł</td>
</tr>
<tr>
<td>POTAS</td>
<td>7,00 zł</td>
</tr>
<tr>
<td>POTAS W DZM</td>
<td>7,00 zł</td>
</tr>
<tr>
<td>PROGESTERON</td>
<td>25,00 zł</td>
</tr>
<tr>
<td>PROLAKTYNA (PRL PO METOPL.)</td>
<td>25,00 zł</td>
</tr>
<tr>
<td>PROLAKTYNA (PRL)</td>
<td>25,00 zł</td>
</tr>
<tr>
<td>PROTEINOGRAM</td>
<td>15,00 zł</td>
</tr>
<tr>
<td>PSA</td>
<td>25,00 zł</td>
</tr>
<tr>
<td>PSA WOLNE</td>
<td>30,00 zł</td>
</tr>
<tr>
<td>RETIKULOCYTY</td>
<td>8,00 zł</td>
</tr>
<tr>
<td>ROZMAZ KRWI RĘCZNY</td>
<td>5,00 zł</td>
</tr>
<tr>
<td>RÓŻYCZKA (RUBELLA VIRUS) IGG</td>
<td>20,00 zł</td>
</tr>
<tr>
<td>RÓŻYCZKA (RUBELLA VIRUS) IGM</td>
<td>22,00 zł</td>
</tr>
<tr>
<td>SHBG</td>
<td>30,00 zł</td>
</tr>
<tr>
<td>SÓD</td>
<td>7,00 zł</td>
</tr>
<tr>
<td>SÓD W DZM</td>
<td>7,00 zł</td>
</tr>
<tr>
<td>STREPTOCOCCUS PYOGENES GR. A PRZECIWCIAŁA (ANTYSTREPTOLIZYNA O)</td>
<td>20,00 zł</td>
</tr>
<tr>
<td>ŚWINKA (MYXOVIRUS PAROTITIS) IGG</td>
<td>50,00 zł</td>
</tr>
<tr>
<td>ŚWINKA (MYXOVIRUS PAROTITIS) IGM</td>
<td>50,00 zł</td>
</tr>
<tr>
<td>T3 TRÓJJODOTYRONINA</td>
<td>20,00 zł</td>
</tr>
<tr>
<td>T4 TYROKSYNA</td>
<td>20,00 zł</td>
</tr>
<tr>
<td>TEST OBCIĄŻENIA GLUKOZĄ (2PKT, 50G 1H)</td>
<td>7,00 zł</td>
</tr>
<tr>
<td>TEST OBCIĄŻENIA GLUKOZĄ (3PKT, 75G 1H, 2H)</td>
<td>14,00 zł</td>
</tr>
<tr>
<td>TEST PAPP-A</td>
<td>66,00 zł</td>
</tr>
<tr>
<td>TESTOSTERON</td>
<td>25,00 zł</td>
</tr>
<tr>
<td>TIBC</td>
<td>10,00 zł</td>
</tr>
<tr>
<td>TOKSOKAROZA (TOXOCARA CANIS) IGG</td>
<td>70,00 zł</td>
</tr>
<tr>
<td>TOKSOPLAZMOZA IGG</td>
<td>20,00 zł</td>
</tr>
<tr>
<td>TOKSOPLAZMOZA IGG, AWIDNOŚĆ</td>
<td>85,00 zł</td>
</tr>
<tr>
<td>TOKSOPLAZMOZA IGM</td>
<td>22,00 zł</td>
</tr>
<tr>
<td>TRANSFERYNA</td>
<td>30,00 zł</td>
</tr>
<tr>
<td>TROPONINA</td>
<td>45,00 zł</td>
</tr>
<tr>
<td>TRÓJGLICERYDY</td>
<td>8,00 zł</td>
</tr>
<tr>
<td>TSH III GEN.</td>
<td>20,00 zł</td>
</tr>
<tr>
<td>TYREOGLOBULINA</td>
<td>40,00 zł</td>
</tr>
<tr>
<td>WAPŃ</td>
<td>7,00 zł</td>
</tr>
<tr>
<td>WAPŃ W DZM</td>
<td>8,00 zł</td>
</tr>
<tr>
<td>WITAMINA B12</td>
<td>30,00 zł</td>
</tr>
<tr>
<td>WITAMINA D3 25(OH)</td>
<td>95,00 zł</td>
</tr>
<tr>
<td>WYMAZ W KIERUNKU OWSIKÓW</td>
<td>15,00 zł</td>
</tr>
<tr>
<td>WYMAZ Z GARDŁA (BAD. MYKOL.)</td>
<td>30,00 zł</td>
</tr>
<tr>
<td>WYMAZ Z GARDŁA BAD. BAKT.</td>
<td>30,00 zł</td>
</tr>
<tr>
<td>WYMAZ Z NOSA (BAD. BAKTER.)</td>
<td>30,00 zł</td>
</tr>
<tr>
<td>WYMAZ Z NOSA (BAD. MYKOL.)</td>
<td>30,00 zł</td>
</tr>
<tr>
<td>WYMAZ Z PĘPKA (BAD. BAKTER.)</td>
<td>30,00 zł</td>
</tr>
<tr>
<td>WYMAZ Z RANY (BAD. BAKTER.)</td>
<td>30,00 zł</td>
</tr>
<tr>
<td>WYMAZ Z UCHA LEWEGO  (BAD. BAKTER.)</td>
<td>30,00 zł</td>
</tr>
<tr>
<td>WYMAZ Z UCHA PRAWEGO (BAD. BAKTER.)</td>
<td>30,00 zł</td>
</tr>
<tr>
<td>WYMAZ Z WORKA SPOJÓWKOWEGO OL (BAD. BAKTER.)</td>
<td>30,00 zł</td>
</tr>
<tr>
<td>WYMAZ Z WORKA SPOJÓWKOWEGO OL (BAD. MYKOL.)</td>
<td>30,00 zł</td>
</tr>
<tr>
<td>WYMAZ Z WORKA SPOJÓWKOWEGO OP (BAD. BAKTER.)</td>
<td>30,00 zł</td>
</tr>
<tr>
<td>WYMAZ Z WORKA SPOJÓWKOWEGO OP (BAD. MYKOL.)</td>
<td>30,00 zł</td>
</tr>
<tr>
<td>ŻELAZO</td>
<td>10,00 zł</td>
</tr>
<tr>
<td>POBRANIE KRWI</td>
<td>15,00 zł</td>
</tr>
			<tr>
					<td></td>
					<td></td>
					</tr>
        </tbody>

    </table>
					</div>
				</div>
			
			
			<div class="panel panel-default naglowek">
				
				<div class="panel-heading naglowek row">
					<a href="#roz5" data-toggle="collapse" data-parent="#according">
						<h2>
							<div class="col-md-4 col-lg-4">
								<span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span>
							</div>
                            <div class="col-md-6 col-lg-6">
								Szczepienia
							</div>
						</h2>
					</a>
				</div>
            </div>	
				
			<div id="roz5" class="panel-cllapse collapse">
					<div class="panel-body">
						
						<table id="" class="table table-striped table-bordered display" style="width:99% !important">
        <thead>
                    <tr>
						<td class="no-sort"> Nazwa </td>
						<td class="no-sort"> Cena </td>
					</tr>
        </thead>
        <tbody>


<tr>
										<td>ADACEL/BOOSTRIX</td>
										<td>120,00 zł</td>
										</tr>
										<tr>
										<td>BEXERO</td>
										<td>380,00 zł</td>
										</tr>
										<tr>
										<td>CERVARIX HPV</td>
										<td>320,00 zł</td>
										</tr>
										<tr>
										<td>ENGERIX 10MG</td>
										<td>60,00 zł</td>
										</tr>
										<tr>
										<td>ENGERIX 20MG</td>
										<td>70,00 zł</td>
										</tr>
										<tr>
										<td>FSME 0.5MG</td>
										<td>120,00 zł</td>
										</tr>
										<tr>
										<td>FSME JUNIOR</td>
										<td>110,00 zł</td>
										</tr>
										<tr>
										<td>HAVRIX ADULT</td>
										<td>190,00 zł</td>
										</tr>
										<tr>
										<td>HAVRIX JUNIOR</td>
										<td>120,00 zł</td>
										</tr>
										<tr>
										<td>HEPAVAX</td>
										<td>50,00 zł</td>
										</tr>
										<tr>
										<td>HEXACIMA</td>
										<td>180,00 zł</td>
										</tr>
										<tr>
										<td>INFANRIX HEXA</td>
										<td>210,00 zł</td>
										</tr>
										<tr>
										<td>INFANRIX IPV+HIB</td>
										<td>150,00 zł</td>
										</tr>
										<tr>
										<td>INFUVAC</td>
										<td>40,00 zł</td>
										</tr>
										<tr>
										<td>NEISVAC-C</td>
										<td>160,00 zł</td>
										</tr>
										<tr>
										<td>NIMENRIX</td>
										<td>200,00 zł</td>
										</tr>
										<tr>
										<td>PENTAXIM</td>
										<td>130,00 zł</td>
										</tr>
										<tr>
										<td>PNEUMO 23</td>
										<td>80,00 zł</td>
										</tr>
										<tr>
										<td>PREVENAR</td>
										<td>290,00 zł</td>
										</tr>
										<tr>
										<td>ROTARIX</td>
										<td>330,00 zł</td>
										</tr>
										<tr>
										<td>TWINRIX A+B ADULT</td>
										<td>210,00 zł</td>
										</tr>
										<tr>
										<td>TYPHIM VI (DUR BRZUSZNY)</td>
										<td>210,00 zł</td>
										</tr>
										<tr>
										<td>VARILIX</td>
										<td>220,00 zł</td>
										</tr>
										<tr>
										<td>VAXIGRIP TETRA</td>
										<td>50,00 zł</td>
										</tr>
			<tr>
					<td></td>
					<td></td>
					</tr>
        </tbody>

    </table>
					</div>
				</div>
			
			
			
			
			
		
			<div class="panel panel-default naglowek">
				
				<div class="panel-heading naglowek row">
					<a href="#rozz" data-toggle="collapse" data-parent="#according">
						<h2>
							<div class="col-md-4 col-lg-4">
								<span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span>
							</div>
                            <div class="col-md-6 col-lg-6">
								Konsultacje Lekarskie
							</div>
						</h2>
					</a>
				</div>
            </div>	
			
			<div id="rozz" class="panel-cllapse collapse">
									<div class="panel-body">
						
						<table id="" class="table table-striped table-bordered display" style="width:99%">
        <thead >
                    <tr>
						<td class="no-sort"> Nazwa </td>
						<td class="no-sort"> Cena </td>
					</tr>
        </thead>
        <tbody>

				

								
								<tr>
								<td>KONSULTACJA ALERGOLOGICZNA</td>
								<td>120,00 zł</td>
								</tr>
								<tr>
								<td>KONSULTACJA DERMATOLOGICZNA</td>
								<td>120,00 zł</td>
								</tr>
								<tr>
								<td>KONSULTACJA DIABETOLOGICZNA</td>
								<td>120,00 zł</td>
								</tr>
								<tr>
								<td>KONSULTACJA ENDOKRYNOLOGICZNA</td>
								<td>120,00 zł</td>
								</tr>
								<tr>
								<td>KONSULTACJA GINEKOLOGICZNA</td>
								<td>120,00 zł</td>
								</tr>
								<tr>
								<td>KONSULTACJA KARDIOLOGICZNA</td>
								<td>120,00 zł</td>
								</tr>
								<tr>
								<td>KONSULTACJA LEKARZA MEDYCYNY PRACY</td>
								<td>90,00 zł</td>
								</tr>
								<tr>
								<td>KONSULTACJA NEUROLOGICZNA</td>
								<td>120,00 zł</td>
								</tr>
								<tr>
								<td>KONSULTACJA OKULISTYCZNA</td>
								<td>120,00 zł</td>
								</tr>
								<tr>
								<td>KONSULTACJA OTOLARYNGOLOGICZNA</td>
								<td>120,00 zł</td>
								</tr>
								<tr>
								<td>KONSULTACJA SPECJALISTY MEDYCYNY RODZINNEJ</td>
								<td>100,00 zł</td>
								</tr>
								</tbody>
										</table>
							</div>
			
			
			</div>
			
				
				
			<div class="panel panel-default naglowek">
				
				<div class="panel-heading naglowek row">
					<a href="#roz2" data-toggle="collapse" data-parent="#according">
						<h2>
							<div class="col-md-4 col-lg-4">
								<span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span>
							</div>
                            <div class="col-md-6 col-lg-6">
								Inne
							</div>
						</h2>
					</a>
				</div>
            </div>	
			
			<div id="roz2" class="panel-cllapse collapse">
									<div class="panel-body">
						
						<table id="" class="table table-striped table-bordered display" style="width:100%">
        <thead>
                    <tr>
						<td class="no-sort"> Nazwa </td>
						<td class="no-sort"> Cena </td>
					</tr>
        </thead>
        <tbody>

				
					<tr>
						<td>AUDIOMETRIA</td>
						<td>40,00 zł</td>
						</tr>
						<tr>
						<td>BIOPSJA TARCZYCY</td>
						<td>250,00 zł</td>
						</tr>
						<tr>
						<td>CYTOLOGIA</td>
						<td>40,00 zł</td>
						</tr>
						<tr>
						<td>ECHO SERCA</td>
						<td>130,00 zł</td>
						</tr>
						<tr>
						<td>EKG BEZ OPISU</td>
						<td>30,00 zł</td>
						</tr>
						<tr>
						<td>EKG WYSIŁKOWE</td>
						<td>120,00 zł</td>
						</tr>
						<tr>
						<td>EKG Z OPISEM</td>
						<td>45,00 zł</td>
						</tr>
						<tr>
						<td>HOLTER ABP</td>
						<td>100,00 zł</td>
						</tr>
						<tr>
						<td>HOLTER EKG</td>
						<td>120,00 zł</td>
						</tr>
						<tr>
						<td>NEBULIZACJA</td>
						<td>30,00 zł</td>
						</tr>
						<tr>
						<td>SPIROMETRIA</td>
						<td>40,00 zł</td>
						</tr>
						<tr>
						<td>USG GINEKOLOGICZNE</td>
						<td>110,00 zł</td>
						</tr>
						<tr>
						<td>USG JAMY BRZUSZNEJ</td>
						<td>100,00 zł</td>
						</tr>
						<tr>
						<td>USG PIERSI</td>
						<td>120,00 zł</td>
						</tr>
						<tr>
						<td>USG PŁODU</td>
						<td>130,00 zł</td>
						</tr>
						<tr>
						<td>USG TARCZYCY</td>
						<td>110,00 zł</td>
						</tr>
						<tr>
						<td>ZASTRZYK DOMIĘŚNIOWY</td>
						<td>25,00 zł</td>
						</tr>
						<tr>
						<td>ZASTRZYK DOŻYLNY</td>
						<td>35,00 zł</td>
						</tr>
						<tr>
						<td>ZDJĘCIE SZWÓW+OPATRUNEK</td>
						<td>40,00 zł</td>
						</tr>
						<tr>
						<td>ZMIANA OPATRUNKU</td>
						<td>20,00 zł</td>
						</tr>
								</tbody>
										</table>
							</div>
			
			
			</div>
			
			
			
			</div>
			
			
			
			
		</div>
	
	
	
</section>
   			<?= '<script src="'.plugins_url( '/public/js/npm.js', __FILE__ ).'"></script>';?>
   			<?= '<script src="'.plugins_url( '/public/js/bootstrap.min.js', __FILE__ ).'"></script>';?>
   			<?= '<script src="'.plugins_url( '/public/js/jqtab.js', __FILE__ ).'"></script>';?>		
   			<?= '<script src="'.plugins_url( '/public/js/ttt.js', __FILE__ ).'"></script>';?>
   			<?= '<script src="'.plugins_url( '/public/js/tab22.js', __FILE__ ).'"></script>';?>
	
			
			

	 </body>		
</html>


		<?php
        echo $after_widget;

    }
}

?>

