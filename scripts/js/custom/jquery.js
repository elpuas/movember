/* eslint-disable */
jQuery(document).ready(function ($) {
	const checkboxPilsen = $( 'input[name=pilsen]' );
	const checkboxFans = $( 'input[name=fans]' );
	const instagramPilsen = $('#plsn-instagram-pilsen');
	const instagramFans = $('#plsn-instagram-fans');
	const btnPilsen = $('#plsn-list');
	const btnFans = $('#fns-list');

	if( checkboxPilsen.length) {
		$(checkboxPilsen).attr('checked', 'checked');
		$(instagramPilsen).css('display', 'block');
		$(instagramFans).css('display', 'none');

		$(btnPilsen).on('click', function(){
			$(checkboxPilsen).attr('checked', 'checked');
			$(checkboxFans).removeAttr('checked');
			$(instagramPilsen).css('display', 'block');
			$(instagramFans).css('display', 'none');
		})

		$(btnFans).on('click', function(){
			$(checkboxFans).attr('checked', 'checked');
			$(checkboxPilsen).removeAttr('checked');
			$(instagramFans).css('display', 'block');
			$(instagramPilsen).css('display', 'none');
		})
	}
})


