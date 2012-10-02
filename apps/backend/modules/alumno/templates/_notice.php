<script type="text/javascript">
<?php if ($isNew == true) : ?>
	 setTimeout(function(){ document.location.href="<?php echo url_for('alumno/show?id='.$alumno->getId()) ?>";}, 1000);
<?php endif ?>

  jQuery(document).ready(function() { 
    jQuery.ajax({
      type:'GET',
      dataType:'html',
      data:jQuery(this).serialize(),
      success:function(data, textStatus){
       	jQuery('#sf_admin_content form').html(data);
   			jQuery("#sf_admin_content form .colorbox").colorbox();
      },
      url: '<?php echo url_for('alumno/listAjax') ?>'
    });
	});

</script>

<span> El registro se ha guardado satisfactoriamente.</span>
