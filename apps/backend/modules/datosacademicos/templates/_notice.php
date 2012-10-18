<script type="text/javascript">
  jQuery(document).ready(function() { 
    jQuery.ajax({
      type:'GET',
      dataType:'html',
      data:jQuery(this).serialize(),
      success:function(data, textStatus){
       	jQuery('#mis-datos-academicos ').html(data);
   			jQuery("#mis-datos-academicos .colorbox").colorbox();
      },
      url: '<?php echo url_for('persona/actualizarDatosAcademicos?modulo='.$modulo.'&id='.$DatoAcademico->getPersonaId()) ?>'
    });
	});
</script>

<span> El registro se ha guardado satisfactoriamente.</span>
