/**
 *
 * HTML5 Image uploader with Jcrop
 *
 * Licensed under the MIT license.
 * http://www.opensource.org/licenses/mit-license.php
 * 
 * Copyright 2012, Script Tutorials
 * http://www.script-tutorials.com/
 */
var selectImgWidth,selectImgHeight,jcrop_api, boundx, boundy,isError=false;
// convert bytes into friendly format
 var boxSize = 300;
 
function bytesToSize(bytes) {
    var sizes = ['Bytes', 'KB', 'MB'];
    if (bytes == 0) return 'n/a';
    var i = parseInt(Math.floor(Math.log(bytes) / Math.log(1024)));
    return (bytes / Math.pow(1024, i)).toFixed(1) + ' ' + sizes[i];
};

// check for selected crop region



	function checkForm() {
		if (!$('#image_file').val()=='') {
    if (parseInt($('#w').val())) return true;
    $('.error').html('Please select a crop region and then press Upload').show();
    return false;
	}
};
	


// clear info by cropping (onRelease event handler)
function clearInfo() {
    $('.info #w').val('');
    $('.info #h').val('');
};

function fileSelectHandler() {

	// preview element
    var previewId = document.getElementById('preview');
	previewId.src = '';
	$('.step2').hide();

    // get selected file
    var selectedImg = $('#image_file')[0].files[0];

    // hide all errors
    $('.error').hide();

    // check for image type (jpg and png are allowed)
    var rFilter = /^(image\/jpeg|image\/png)$/i;
    if (! rFilter.test(selectedImg.type)) {
        $('.error').html('Please select a valid image file (jpg and png are allowed)').show();
        return;
    }

    // check for file size
    if (selectedImg.size >  2500 * 5024) {
        $('.error').html('You have selected too big file, please select a one smaller image file').show();
        return;
    }

    
	    // Preview the selected image with object of HTML5 FileReader class
		// prepare HTML5 FileReader
		var oReader = new FileReader();
        oReader.onload = function(e) {

        // e.target.result contains the DataURL which we can use as a source of the image
        previewId.src = e.target.result;
        previewId.onload = function () { // onload event handler

            // display step 2
            $('.step2').fadeIn(500);

            // display some basic image info
            //var sResultFileSize = bytesToSize(selectedImg.size);
            //$('#filesize').val(sResultFileSize);
            //$('#filetype').val(selectedImg.type);
            //$('#filedim').val(previewId.naturalWidth + ' x ' + previewId.naturalHeight);

            // Create variables (in this scope) to hold the Jcrop API and image size
           

            // destroy Jcrop if it is existed
            if (typeof jcrop_api != 'undefined') 
                jcrop_api.destroy();

            // initialize Jcrop
            $('#preview').Jcrop({
                minSize: [100, 100], // min crop size
                aspectRatio : 1, // keep aspect ratio 1:1
                bgFade: true, // use fade effect
                bgOpacity: .3, // fade opacity
                onChange: updateInfo,
                onSelect: updateInfo,
                onRelease: clearInfo,
				boxWidth: boxSize,
				boxHeight: boxSize,
				setSelect: [0, 0, 200, 200]
            }, function(){

                // use the Jcrop API to get the real image size
                var bounds = this.getBounds();
                boundx = bounds[0];
                boundy = bounds[1];

                // Store the Jcrop API in the jcrop_api variable
                jcrop_api = this;
            });
        };
    };

    // read selected file as DataURL
    oReader.readAsDataURL(selectedImg);
}

// update info by cropping (onChange and onSelect events handler)
function updateInfo(e) {
    $('#x1').val(e.x);
    $('#y1').val(e.y);
    $('#x2').val(e.x2);
    $('#y2').val(e.y2);
    $('#w').val(e.w);
    $('#h').val(e.h);
};

function validateForm(){
	if ($('#image_file').val()=='') {
        $('.error').html('Please select an image').fadeIn(500);
        return false;
    }else if(isError){
    	return false;
    }else {
    	return true;
    }
}