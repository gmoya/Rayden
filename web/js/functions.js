function sendingForm(id) {
	var elemento = jQuery(id);
	elemento.children().hide();
	elemento.append('<div class="sending-form"></form>');
	jQuery.colorbox.resize();
}
