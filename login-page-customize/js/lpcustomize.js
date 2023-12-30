/**
 * @package Login Page Customize
 * 
 * Login Page Customize Scripts
 */

(function($){
    'use strict';
    jQuery(document).ready(function($){

        /* =========================
			Background Image  
		========================== */
        let bgimgUploader;
        jQuery('.lpcustomize-option .bgimg-section #lpc-bgimg').on('click', function(e){
            e.preventDefault();

            // If bgimgUploader has then open
			if (bgimgUploader) {
				bgimgUploader.open();
				return;
			};
            // Media upload box title and choose button text & only one image allow
			bgimgUploader = wp.media.frames.file_frame = wp.media({
				title: 'Choose Background Image',   
				button: {
					text: 'Choose Image'          
				},
				multiple: false,                   
			});
            // select image & convert to json & get image url
			bgimgUploader.on('select', function(){
				let bgattachment = bgimgUploader.state().get('selection').first().toJSON();
				jQuery('.lpcustomize-option #lpcbgimg-input').val(bgattachment.url); //For input
				jQuery('.lpcustomize-option .bgimg-section .lpc-bgimage').css("background-image", 'url(' + bgattachment.url + ')');  //For Background Image
			});
            // Open uploader dialog/box
			bgimgUploader.open();

        });
        // for remove image
		jQuery('.lpcustomize-option #remove-lpcbgimg').click(function(e) {
			jQuery('.lpcustomize-option #lpcbgimg-input').val(' ');
			jQuery('.lpcustomize-option .bgimg-section .lpc-bgimage').css("background-image", 'url()');
		});


        /* =========================
			Logo Image  
		========================== */
        let logoImgUploader;
        jQuery('.lpcustomize-option .logo-section #lpc-logoimg').on('click', function(e){
            e.preventDefault();

            // If logoImgUploader has then open
			if (logoImgUploader) {
				logoImgUploader.open();
				return;
			};
            // Media upload box title and choose button text & only one image allow
			logoImgUploader = wp.media.frames.file_frame = wp.media({
				title: 'Choose Logo Image',   
				button: {
					text: 'Choose Image'          
				},
				multiple: false,                   
			});
            // select image & convert to json & get image url
			logoImgUploader.on('select', function(){
				let bgattachment = logoImgUploader.state().get('selection').first().toJSON();
				jQuery('.lpcustomize-option #lpclogoimg-input').val(bgattachment.url); //For input
				jQuery('.lpcustomize-option .logo-section .lpc-logoimage').css("background-image", 'url(' + bgattachment.url + ')');  //For Background Image
			});
            // Open uploader dialog/box
			logoImgUploader.open();

        });
        // for remove image
		jQuery('.lpcustomize-option #remove-lpclogoimg').click(function(e) {
			jQuery('.lpcustomize-option #lpclogoimg-input').val(' ');
			jQuery('.lpcustomize-option .logo-section .lpc-logoimage').css("background-image", 'url()');
		});

		
		/* =================
		   Tab Script
		================= */
		jQuery('#lpcustomize-tab').tabs();


    });
}(jQuery));