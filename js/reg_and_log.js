	$(function(){
		var url = window.location.href.replace('http://louisdickinson.com/smartcube/','');
		if(url == '#signin'){
			$('.register').show();
			$('#login input[name="email"]').focus();
		}

		$('.user_form,.fa-close').click(function() {
			if(!url) $('#toggleSlide').trigger("click");
			$('.register').fadeToggle(function() {
				$('#login input[name="username"]').focus();
			});
		});
		
		$('#login button').click(function(){
			var u = $('#login input[name="username"]').val();
			var p = $('#login input[name="password"]').val();
			$.ajax({
				type : "POST",
				url : 'http://smartcubewebservice.appspot.com/api/authenticateuser',
				data : '[{ "Email" : "' + u + '", "Password" : "' + p + '"}]',
				success : function(data) {
					data = jQuery.parseJSON(data);
					if(data.Email == u){
						localStorage.email = data.Email;
						localStorage.forename = data.Forename;
						
 						window.location.href = "dashboard"; 
					}else{
						$('#login input[name="password"]').val('');
						alert('Wrong Email or password');
					}   
				},error : function(data) {
					console.log('ERROR: ' + data);
				}
			});
			return false;
		});
	});

	$('#login input').keypress(function(e){
        if(e.which == 13){//Enter key pressed
            $('#login button').click();//Trigger search button click event
        }
    });

	//Validate Function
	//VALIDATE EMAIL WITH REG EXP AND DATABASE GET REQUEST
	function validateEmail(email){
		var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
		var val = re.test(email);
		if(val){
			$.get('./server/check_user.php',{checkEmail: email}).done(function(data){
				if(data != 0){
					//user already in database
					val = 'exists';
				}	
			});
		}
		return val;
	}

	$('.register .wrap').on("submit","#code",function() { // catch the form's submit event
		var pass1 = $('input[name="pass"]').val();
		var pass2 = $('input[name="conPass"]').val();
		console.log('Submit');
		if(pass1 === pass2){
			$.ajax({ // create an AJAX call...
				data: $(this).serialize(), // get the form data
				type: $(this).attr('method'), // GET or POST
				url: $(this).attr('action'), // the file to call
				success: function(response) { // on success..
					if(response.length > 30){
						location.replace('http://louisdickinson.com/smartcube/#signin');
					}
				}
			});
		}
		return false; // cancel original event to prevent form submitting
	});

	//         ______                                      
	//        /      \                                     
	//       /$$$$$$  |                                    
	//       $$ ___$$ |                                    
	//         /   $$<                                     
	//        _$$$$$  |                                    
	//       /  \__$$ |                                    
	//       $$    $$/                                     
	//        $$$$$$/  
	//
	//    SUMBUT EMAIL AND SHOW CODE INPUT FIELD.

	var thread2 = null;

	function checkCode(c){
		$.post('./server/verify.php',{code: c}).done(function(data){
			if(data){
				$('#code input[name="code"],.register .wrap p,.fa-envelope').remove();
				$('#code').html('<span>Code Verified</span>' + 
				'<input name="code" type="hidden" value="' + c + '" required/>' + 
				'<input name="pass" placeholder="Enter new password" type="password" required/>' + 
				'<input name="conPass" placeholder="Confirm password" type="password" required/>' + 
				'<button type="submit"><i class="fa fa-arrow-right"></i></button>');
				$('#code').css('margin-top','15px');
				$('.register .wrap').css('height','200px');
				$('#code input[name="pass"]').focus();
			}else{
				$('.fa-envelope').addClass('codeError');
			}
		});
	}

	$('.register .wrap').on('keyup','#code input[name="code"]',function() {
		clearTimeout(thread2);
		var val = $(this).val();
		if(val.length > 5){
			thread2 = setTimeout(function(){
				$('.fa-envelope').removeClass('codeError');
				checkCode(val);
			}, 200);
		}
	});



	//         ______                                
	//        /      \                               
	//       /$$$$$$  |                              
	//       $$____$$ |                              
	//        /    $$/                               
	//       /$$$$$$/                                
	//       $$ |_____                               
	//       $$       |                              
	//       $$$$$$$$/ 
	//
	//    SUMBUT EMAIL AND SHOW CODE INPUT FIELD.

	$('.register .wrap').on('click','#register_button',function() {
		var val = $('#register').val();
		if(val.length > 4){
			$('.register .wrap').html('<div class="spinner big"><div class="bounce1"></div>' + 
				'<div class="bounce2"></div><div class="bounce3"></div></div>');
			$.post('./server/verify.php',{email: val}).done(function(response){
				if(response){
					$('.register .wrap').html('<i class="fa fa-envelope"></i><p>We have emailed you a verifcation code,' + 
					' please enter below.</p><form id="code" action="server/register_account.php" method="POST">' + 
					'<input name="code" placeholder="Enter 6 didit code" required /></form>');
					$('.register .wrap').css('height','205px');
					$('#code input[name="code"]').focus();
				}
			});
		}
	});

	//          __                                    
	//        _/  |                                   
	//       / $$ |                                   
	//       $$$$ |                                   
	//         $$ |                                   
	//         $$ |                                   
	//        _$$ |_                                  
	//       / $$   |                                 
	//       $$$$$$/   
	//
	//    CHECK TYPED EMAIL WITH JAVASCRIPT VALIDATE FUNCTION
	//    AND DATABASE, PRINT ERROR OR SUBMIT BUTTON.

	var thread = null;

	function regEmail(i) {
		$('#register').removeClass('input_invalid');
		$('#register_button').hide();
		$('.email_message').html('');
		$('.spinner').hide();
		if(i){
			var result = validateEmail(i);
			if(result){
				console.log('Load:' + i);
				if(result == 'exists'){
					$('.email_message').html(i + ' already exists').show();
					$('#register').addClass('input_invalid');
					$('#register_button').hide();
				}else{
					$('.email_message').html(i + ' is valid').show();
					$('#register_button').show();
				}
			}else{
				$('#register_button').hide();
				$('.email_message').html(i + ' is invalid').show();
				$('#register').addClass('input_invalid');
			}
		}
	}

	$('#register').keyup(function() {
		clearTimeout(thread);
		var val = $(this).val();
		$('.mobile_vector span').css('top','490px');
		$('.spinner').show();
		$('.email_message').hide();
		thread = setTimeout(function() {
			regEmail(val);
		}, 200);
	});