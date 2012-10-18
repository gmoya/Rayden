<script type="text/javascript">
  jQuery(document).ready(function() { 
    jQuery.ajax({
      type:'GET',
      dataType:'html',
      data:jQuery(this).serialize(),
      success:function(data, textStatus){
       	jQuery('#mis-empleos ').html(data);
   			jQuery("#mis-empleos .colorbox").colorbox();
      },
      url: '<?php echo url_for('persona/actualizarEmpleos?modulo='.$modulo.'&id='.$Empleo->getPersonaId()) ?>'
    });
	});
</script>

<span> El registro se ha guardado satisfactoriamente.</span>
