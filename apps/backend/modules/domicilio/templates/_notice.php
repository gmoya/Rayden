<script type="text/javascript">
  jQuery(document).ready(function() { 
    jQuery.ajax({
      type:'GET',
      dataType:'html',
      data:jQuery(this).serialize(),
      success:function(data, textStatus){
       	jQuery('#mi-domicilio ').html(data);
   			jQuery("#mi-domicilio .colorbox").colorbox();
      },
      url: '<?php echo url_for('persona/actualizarDomicilio?modulo='.$modulo.'&id='.$Domicilio->getPersonaId()) ?>'
    });
	});
</script>

<span> El registro se ha guardado satisfactoriamente.</span>
