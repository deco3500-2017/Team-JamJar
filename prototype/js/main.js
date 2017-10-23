
$(document).ready(function(){
    
    var  getMenuHeight = $(".header").height();
	//console.log(getMenuHeight);
    $(".content").css("padding-top", getMenuHeight);

    var  getFooterHeight = $(".footer").height();
	//console.log(getMenuHeight);
    $(".content").css("padding-bottom", getFooterHeight);

    console.log($(document).height());

    var getPageHeight = $(document).height();

    $(".login").css("padding-top", getPageHeight/10);

    $("div#card").on("click",function(){
    	$(this).next("div#detail").slideToggle();
	});

	/* 
	reference: http://thecodeplayer.com/walkthrough/jquery-multi-step-form-with-progress-bar 
	*/
	var current_fs, next_fs, previous_fs; //fieldsets
	var left, opacity, scale; //fieldset properties which we will animate
	var animating; //flag to prevent quick multi-click glitches

	$(".next").click(function() {
		if(animating) return false;
		animating = true;

		current_fs = $(this).parent().parent().parent();
		next_fs = $(this).parent().parent().parent().next();

		//activate next step on progressbar using the index of next_fs
		$("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");

		//show the next fieldset
		next_fs.show(); 
		//hide the current fieldset with style
		current_fs.animate({opacity: 0}, {
			step: function(now, mx) {
				//as the opacity of current_fs reduces to 0 - stored in "now"
				//1. scale current_fs down to 80%
				scale = 1 - (1 - now) * 0.2;
				//2. bring next_fs from the right(50%)
				left = (now * 50)+"%";
				//3. increase opacity of next_fs to 1 as it moves in
				opacity = 1 - now;
				current_fs.css({'transform': 'scale('+scale+')'});
				next_fs.css({'left': left, 'opacity': opacity});
			}, 
			duration: 800, 
			complete: function() {
				current_fs.hide();
				animating = false;
			},
			//this comes from the custom easing plugin
			easing: 'easeInOutBack'
		});
	});

  	$(".previous").click(function() {
		if(animating) return false;
		animating = true;
	
	    current_fs = $(this).parent().parent().parent();
	    previous_fs = $(this).parent().parent().parent().prev();
	
	    //de-activate current step on progressbar
	    $("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");
	
	    //show the previous fieldset
	    previous_fs.show(); 
	    //hide the current fieldset with style
	    current_fs.animate({opacity: 0}, {
		    step: function(now, mx) {
		   	    //as the opacity of current_fs reduces to 0 - stored in "now"
			    //1. scale previous_fs from 80% to 100%
			    scale = 0.8 + (1 - now) * 0.2;
			    //2. take current_fs to the right(50%) - from 0%
			    left = ((1-now) * 50)+"%";
				//3. increase opacity of previous_fs to 1 as it moves in
				opacity = 1 - now;
				current_fs.css({'left': left});
				previous_fs.css({'transform': 'scale('+scale+')', 'opacity': opacity});
		    }, 
		    duration: 800, 
		    complete: function(){
		  	    current_fs.hide();
		 	    animating = false;
		    },
		    easing: 'easeInOutBack'
	    });
    });


  	$('#textinput').keyup(function(){
  		var searchTerm = $(this).val().toUpperCase();
  		//console.log(searchTerm);
  		var list = $('.listofuser');
  		//console.log(list);

		$(list).find('p').each(function () {
		    var name = $(this).text();
		    console.log(name);

		    if (name.toUpperCase().indexOf(searchTerm) > -1) {
       		    $(this).parent().parent().css("display", "");
        	} else {
            	$(this).parent().parent().css("display", "none");
       		}
		});
  	});


/*	use croppie to crop image
	$uploadCrop = $('.picitem').croppie({
	    enableExif: true,
	    viewport: {
	        width: 500,
	        height: 500,
	        type: 'circle'
	    },
	    boundary: {
	        width: 600,
	        height: 600
	    }
	});

  	// reference: https://stackoverflow.com/questions/4459379/preview-an-image-before-it-is-uploaded
	
	function readURL(input) {

		if (input.files && input.files[0]) {
			var reader = new FileReader();

			reader.onload = function (e) {

				$uploadCrop.croppie('bind', {
       				url: event.target.result
      			});
				//$('.blah').attr('src', e.target.result);
				
				//$('.blah').css('width', '100%');
				//var picwidth = $("#blah").width();
				//$('.blah').css('height', picwidth);
				//$('.picframe').css('padding-top', '0');
			}
			reader.readAsDataURL(input.files[0]);
		}
	}

	$("#imgInp").change(function(){
	    readURL(this);
	});
*/

 /* run camera
   	// reference https://davidwalsh.name/browser-camera

	// Grab elements, create settings, etc.
	var video = document.getElementById('video');

	// Get access to the camera!
	if(navigator.mediaDevices && navigator.mediaDevices.getUserMedia) {
	    // Not adding `{ audio: true }` since we only want video now
	    navigator.mediaDevices.getUserMedia({ video: true }).then(function(stream) {
	        video.src = window.URL.createObjectURL(stream);
	        video.play();
	    });
	}

	/ * Legacy code below: getUserMedia 
	else if(navigator.getUserMedia) { // Standard
	    navigator.getUserMedia({ video: true }, function(stream) {
	        video.src = stream;
	        video.play();
	    }, errBack);
	} else if(navigator.webkitGetUserMedia) { // WebKit-prefixed
	    navigator.webkitGetUserMedia({ video: true }, function(stream){
	        video.src = window.webkitURL.createObjectURL(stream);
	        video.play();
	    }, errBack);
	} else if(navigator.mozGetUserMedia) { // Mozilla-prefixed
	    navigator.mozGetUserMedia({ video: true }, function(stream){
	        video.src = window.URL.createObjectURL(stream);
	        video.play();
	    }, errBack);
	}
	* /

	// Elements for taking the snapshot
	var canvas = document.getElementById('canvas');
	var context = canvas.getContext('2d');
	var video = document.getElementById('video');

	// Trigger photo take
	document.getElementById("snap").addEventListener("click", function() {
		context.drawImage(video, 0, 0, 640, 480);
	});

*/

});




