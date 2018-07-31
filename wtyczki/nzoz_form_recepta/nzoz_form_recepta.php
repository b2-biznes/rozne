<?php

/**
	Plugin Name: formularz recepta
	Description: formularz tworzenia nowej recepty 
	Version: 1.0
	Author: Artur Barzdo
*/





class Nzoz_form_recepta extends Wp_Widget {
    
    function __construct() {
        parent::__construct(
             'nzoz_form_recepta' ,
             'formularz',
             array('description'=>'formularz tworzenia nowej recepty')
        );
    }
    
    function widget( $args, $instance ){
        extract($args);
        echo $before_widget;
        
        
 
?>
<?= '<link rel="stylesheet" href="'.plugins_url( '/css/form.css', __FILE__ ).'" type="text/css" media="screen" />';?>
<div class="container"> 
    
  <form id="kontakt" action="<?= plugins_url( '/send.php', __FILE__ ) ?>" method="post">
    <p style="color:green;font-size: 18px;" id="wys"></p>
    <div class="success"><?= isset($_POST['value'])?$_POST['value']: "" ?></div>  
    <h3>Zamów receptę</h3>
    <h4>Zamów receptę online i odbierz ją w naszej placówce</h4>
    <fieldset>
      <input placeholder="Wpisz Imię" type="text" name="name" value="" tabindex="1" autofocus required/>
      <span id="ei" class="error"></span>
    </fieldset>
    <fieldset>
      <input placeholder="Wpisz Nazwisko" type="text" name="nazwisko" value="" tabindex="2" required/>
      <span id="en" class="error"></span>
    </fieldset>
    <fieldset>
      <input placeholder="Podaj PESEL" type="text" name="pesel" value="" tabindex="3" required/>
      <span id="ep" class="error"></span>
    </fieldset>
    <fieldset>
      <input placeholder="Nazwa leku" type="text" name="nazwa_leku[]" value="" tabindex="4" required/>
      <span id="enl" class="error"></span>
    </fieldset>
    <fieldset>
      <input placeholder="Ilość opakowań" type="number" name="ilosc_opakowan[]" value="" tabindex="5" required/>
      <span id="eio" class="error"></span>
    </fieldset>
    <span id="add_inp">
        <ul>
            
            <li>
            <button type="button" id="add">Dodaj kolejny lek</button> 
            </li>
        </ul>
    </span>
    <span>
      
    </fieldset>
    <fieldset>
      <input placeholder="Imie i Nazwisko Lekarza" type="text" name="lekarz" value="" tabindex="6" required/>
      <span id="el" class="error"></span>
    </fieldset>
    <span id="add_input"></span>
    <fieldset>
      <label><input type="checkbox" name="regulamin" value="<?= $regulamin ?>" tabindex="7" required/> Oznajmiam, że zapoznałem się z regulaminem i wyrażam zgodę na przetwarzanie moich danych osobowych w celu wypisania recepty. </label>
      <span class="error"></span>
      <p><a href="https://nzozcentrum.pl/regulamin/"> Regulamin </a> </p>
    </fieldset>
    <fieldset>
      <button name="submit" type="submit" id="contact-submit" data-submit="...Sending">Zamów receptę</button>
    </fieldset>
    
  </form>
    
</div>


<?= '<script src="'.plugins_url( 'js/jquery.js', __FILE__ ).'"></script>';?>	
<script>
    $(document).ready(function() {
    $("#add_inp ul").on("click", 'button.close', function() {
        
		$(this).parent("li").remove();
	});
    var pole = '<li><fieldset><input placeholder="Nazwa leku" type="text" name="nazwa_leku[]" value="" tabindex="4" required/><span class="error"></span></fieldset><fieldset><input placeholder="Ilość opakowań" type="number" name="ilosc_opakowan[]" value="" tabindex="5" required/><span class="error"></span></fieldset><button type="button" class="close" title="Usuń">Usuń powyższy lek</button></li>';
        $( "#add" ).click(function() {
        $("#add_inp ul").append(pole);
        
	});

   $('form').on('submit', function (e) {
 
          e.preventDefault();
 
          $.ajax({
            type: 'post',
            url: '<?= plugins_url( '/send.php', __FILE__ ) ?>',
            dataType : 'json',
            encode : true,
            data: $('form').serialize()
            
          })
          .done(function(json) {
              
              
              if(json['val']=='0'){
                  $('#ei').html(json['ei']);
                  $('#en').html(json['en']);
                  $('#ep').html(json['ep']);
                  $('#el').html(json['el']);
                  $('#elek').html(json['elek']);
                  $('#eio').html("<br/>"+json['eio']);
                 
                  
              }else{
            $('#kontakt')[0].reset();
            $('#wys').html("Zamówienie recepty zostało przesłane");
              }
            })
            .fail(function() {
         
            });
 
        });
         });
</script>
<?php   

 



      
        echo $after_widget;
    }
    
}
function formularz_load_widget(){
    register_widget('nzoz_form_recepta');
}
add_action('widgets_init', 'formularz_load_widget');