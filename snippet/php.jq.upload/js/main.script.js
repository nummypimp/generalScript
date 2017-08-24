/*
 * jQuery File Upload Plugin JS Example
 * https://github.com/blueimp/jQuery-File-Upload
 *
 * Copyright 2010, Sebastian Tschan
 * https://blueimp.net
 *
 * Licensed under the MIT license:
 * https://opensource.org/licenses/MIT
 */

/* global $, window */
var fdname;
 fdname=""!=$("#fdname").val()?$("#fdname").val():"files";
$(function () {
    'use strict';

		console.log(fdname);
    // Initialize the jQuery File Upload widget:
    $('#fileupload').fileupload({
        // Uncomment the following to send cross-domain cookies:
        //xhrFields: {withCredentials: true},
        url: seturl,
		formData: {foldername:fdname}
    });

    // Enable iframe cross-domain access via redirect option:
    $('#fileupload').fileupload(
        'option',
        'redirect',
        window.location.href.replace(
            /\/[^\/]*$/,
            '/cors/result.html?%s'
        )
    );

    if (window.location.hostname === 'blueimp.github.io') {
        // Demo settings:
        $('#fileupload').fileupload('option', {
            url: '//jquery-file-upload.appspot.com/',
			formData: {foldername:fdname},
            // Enable image resizing, except for Android and Opera,
            // which actually support image resizing, but fail to
            // send Blob objects via XHR requests:
            disableImageResize: /Android(?!.*Chrome)|Opera/
                .test(window.navigator.userAgent),
            maxFileSize: 999000,
            acceptFileTypes: /(\.|\/)(gif|jpe?g|png)$/i
        });
        // Upload server status check for browsers with CORS support:
        if ($.support.cors) {
            $.ajax({
                url: '//jquery-file-upload.appspot.com/',
                type: 'HEAD'
            }).fail(function () {
                $('<div class="alert alert-danger"/>')
                    .text('Upload server currently unavailable - ' +
                            new Date())
                    .appendTo('#fileupload');
            });
        }
    } else {
        // Load existing files:
        $('#fileupload').addClass('fileupload-processing');
        $.ajax({
            // Uncomment the following to send cross-domain cookies:
            // xhrFields: {withCredentials: true},
            url: $('#fileupload').fileupload('option', 'url'),
            dataType: 'json',
			data: {foldername:fdname},
			
            context: $('#fileupload')[0]
        }).always(function () {
			
            $(this).removeClass('fileupload-processing');
        }).done(function (result) {
			
            $(this).fileupload('option', 'done')
                .call(this, $.Event('done'), {result: result});
        });
    }


  selectfolder();
	$('#gonew').click(function(e) {
		var a = $('#fdname').val();
        newDoc(a);
    });
	
	
});


function selectfolder() {
 $('select[name^="f"]').change(function() {
			 var a='';
			  a = $('select[name="folderall"]>option:selected').val();
			newDoc(a);
	
 
});	
	
}

function newDoc(a) {
	var url = window.location.pathname +'?fdname='+a;
    window.location.assign(url);
}