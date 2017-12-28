
function scroll_to_class(element_class, removed_height) {
	var scroll_to = $(element_class).offset().top - removed_height;
	if($(window).scrollTop() != scroll_to) {
		$('html, body').stop().animate({scrollTop: scroll_to}, 0);
	}
}

function bar_progress(progress_line_object, direction) {
	var number_of_steps = progress_line_object.data('number-of-steps');
	var now_value = progress_line_object.data('now-value');
	var new_value = 0;
	if(direction == 'right') {
		new_value = now_value + ( 100 / number_of_steps );
	}
	else if(direction == 'left') {
		new_value = now_value - ( 100 / number_of_steps );
	}
	progress_line_object.attr('style', 'width: ' + new_value + '%;').data('now-value', new_value);
}

jQuery(document).ready(function() {
	
    $('.f1-first-name').on("focusout", function(){
       
       if(/^[A-Za-z]+$/.test($(this).val())){
                //alert($(this).val());
                $(this).addClass('correct');
       
       }

       else{
        $(this).removeClass('correct');
        $(this).addClass('input-error');
       }

    });


    $('.f1-last-name').on("focusout", function(){
       
       if(/^[A-Za-z]+$/.test($(this).val())){
                //alert($(this).val());
                $(this).addClass('correct');
       
       }

       else{
        $(this).removeClass('correct');
        $(this).addClass('input-error');
       }

    });

    $('.f1-job-role').on("focusout", function(){
       
       if(/^[A-Za-z]+$/.test($(this).val())){
                //alert($(this).val());
                $(this).addClass('correct');
       
       }

       else{
        $(this).removeClass('correct');
        $(this).addClass('input-error');
       }

    });
    
    $('.f1-cmp-name').on("focusout", function(){
       
       if(/^[A-Za-z]+$/.test($(this).val())){
                //alert($(this).val());
                $(this).addClass('correct');
       
       }

       else{
        $(this).removeClass('correct');
        $(this).addClass('input-error');
       }

    });
    $('.f1-cmp-address').on("focusout", function(){
       
       if(/^[A-Za-z0-9.,:;-\s]+$/.test($(this).val())){
                //alert($(this).val());
                $(this).addClass('correct');
       
       }

       else{
        $(this).removeClass('correct');
        $(this).addClass('input-error');
       }

    });
    $('.f1-country').on("focusout", function(){
       
       if(/^[A-Za-z]+$/.test($(this).val())){
                //alert($(this).val());
                $(this).addClass('correct');
       
       }

       else{
        $(this).removeClass('correct');
        $(this).addClass('input-error');
       }

    });
 
    
    /*
        Form
    */
    $('.f1 fieldset:first').fadeIn('slow');
    
    $('.f1 input[type="text"], .f1 input[type="password"]').on('focus', function() {
    	$(this).removeClass('input-error');
    });
    
    // next step
    $('.f1 .btn-next').on('click', function() {
    	var parent_fieldset = $(this).parents('fieldset');
    	var next_step = true;
        
    	// navigation steps / progress steps
    	var current_active_step = $(this).parents('.f1').find('.f1-step.active');
    	var progress_line = $(this).parents('.f1').find('.f1-progress-line');
    	
    	// fields validation
    	parent_fieldset.find('input[type="text"], input[type="password"]').each(function() {
    		if( $(this).val() == "" ) {
    			$(this).addClass('input-error');
    			next_step = false;
    		}
            

    		else {
    			$(this).removeClass('input-error');
    		}
    	});

        parent_fieldset.find('.f1-first-name').each(function() {
            if( /^[A-Za-z]+$/.test($(this).val())){
                //alert("true1");
                //next_step = true;
                parent_fieldset.find('.f1-last-name').each(function() {
                   if( /^[A-Za-z]+$/.test($(this).val())){
                   //alert("true2");
                  parent_fieldset.find('.f1-job-role').each(function() {
                   if( /^[A-Za-z]+$/.test($(this).val())){
                    // alert($(this).val());
                     next_step = true;
                    // alert("true3");
                    }

                    else{
                        $(this).addClass('input-error');
                        next_step=false;
                    }
               
               });

                    }

                    else{
                        $(this).addClass('input-error');
                        next_step=false;
                    }
               
               });

            }
            else{
                //$(this).removeClass('correct')
                $(this).addClass('input-error');
                next_step = false;
            }
        });
        
          /*alert($(".f1-country").hasClass( "input-error"));
          if ($(".f1-country").hasClass( "input-error"))
          {
             next_step=false;
          }
          else{
                next_step=true;
          }*/


         parent_fieldset.find('.f1-cmp-name').each(function() {
            if( /^[A-Za-z]+$/.test($(this).val())){
                //alert("true1");
                //next_step = true;
                parent_fieldset.find('.f1-cmp-address').each(function() {
                   if( /^[A-Za-z0-9.,:;-\s]+$/.test($(this).val())){
                   //alert("true2");
                  parent_fieldset.find('.f1-country').each(function() {
                   if( /^[A-Za-z]+$/.test($(this).val())){
                    // alert($(this).val());
                     next_step = true;
                    // alert("true3");
                    }

                    else{
                        $(this).addClass('input-error');
                        next_step=false;
                    }
               
               });

                    }

                    else{
                        $(this).addClass('input-error');
                        next_step=false;
                    }
               
               });

            }
            else{
                //$(this).removeClass('correct')
                $(this).addClass('input-error');
                next_step = false;
            }
        });
        







       
    	// fields validation
    	//alert(next_step);
    	if( next_step) {
            /*window.setTimeout(function(){
                 // do whatever you want to do     
                  }, 6000); */
    		parent_fieldset.fadeOut(400, function() {
    			// change icons
    			current_active_step.removeClass('active').addClass('activated').next().addClass('active');
    			// progress bar
    			bar_progress(progress_line, 'right');
    			// show next step
	    		$(this).next().fadeIn();
                next_step=false;
	    		// scroll window to beginning of the form
    			scroll_to_class( $('.f1'), 20 );
	    	});
    	}
    	
    });
    
    // previous step
    $('.f1 .btn-previous').on('click', function() {
    	// navigation steps / progress steps
    	var current_active_step = $(this).parents('.f1').find('.f1-step.active');
    	var progress_line = $(this).parents('.f1').find('.f1-progress-line');
    	
    	$(this).parents('fieldset').fadeOut(400, function() {
    		// change icons
    		current_active_step.removeClass('active').prev().removeClass('activated').addClass('active');
    		// progress bar
    		bar_progress(progress_line, 'left');
    		// show previous step
    		$(this).prev().fadeIn();
    		// scroll window to beginning of the form
			scroll_to_class( $('.f1'), 20 );
    	});

       




    });
    
    // submit
    $('.f1').on('submit', function(e) {
    	
    	// fields validation
    	$(this).find('input[type="text"], input[type="password"]').each(function() {
    		if( $(this).val() == "" ) {
    			e.preventDefault();
    			$(this).addClass('input-error');
    		}
            if($(".f1-password").val()!= $(".f1-repeat-password").val())
            {
              e.preventDefault();  
              $(".f1-password").addClass('input-error');
              $(".f1-repeat-password").addClass('input-error');

            }
    		else {
    			$(this).removeClass('input-error');
    		}
    	});
    	// fields validation
    	
    });
    
    
});
