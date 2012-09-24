<script>
  jQuery(document).ready(function() { 
    jQuery.ajax({
      type:'GET',
      dataType:'html',
      data:jQuery(this).serialize(),
      success:function(data, textStatus){
       	jQuery('#sf_admin_content form').html(data);
   			jQuery("#sf_admin_content form .colorbox").colorbox();
      },
      url: "<?php echo url_for('carrera/list') ?>"
    });
	});
</script>

<span> El registro se ha guardado satisfactoriamente.</span>
