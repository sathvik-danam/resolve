/*!
* Developer Name: Praveen Kumar | Nitin Kumar
* Author: Codingmstr.com | Trickuweb.Com
* Link1: https://codingmstr.com 
* Link2: https://trickuweb.com  
  */
$(document).ready(function(){
			$("#testimonial-slider").owlCarousel({
				items:1,
				itemsDesktop:[1000,1],
				itemsDesktopSmall:[979,1],
				itemsTablet:[768,1],
				pagination: true,
				autoPlay:false
			});
		});	

// Image 1
		$('.newbtn1').bind("click" , function () {
			$('#pic1').click();
	 });
	 
	  function readURL1(input) {
				if (input.files && input.files[0]) {
					var reader = new FileReader();
	
					reader.onload = function (e) {
						$('#blah1')
							.attr('src', e.target.result);
					};
	
					reader.readAsDataURL(input.files[0]);
				}
			}

 // Image 2			
		$('.newbtn2').bind("click" , function () {
			$('#pic2').click();
	 });

	  function readURL2(input) {
				if (input.files && input.files[0]) {
					var reader = new FileReader();
	
					reader.onload = function (e) {
						$('#blah2')
							.attr('src', e.target.result);
					};
	
					reader.readAsDataURL(input.files[0]);
				}
			}

 // Image 3			
		$('.newbtn3').bind("click" , function () {
			$('#pic3').click();
	 });
	 
	  function readURL3(input) {
				if (input.files && input.files[0]) {
					var reader = new FileReader();
	
					reader.onload = function (e) {
						$('#blah3')
							.attr('src', e.target.result);
					};
	
					reader.readAsDataURL(input.files[0]);
				}
			}
    
$(document).ready(function(){
		$('#country_name').keyup(function(){
			var query = $(this).val();
			if(query != '')
			{
				var _token = $('input[name="_token"]').val();
				$.ajax({
					url:"/autocomplete/fetch",
					method:"POST",
					data:{query:query, _token:_token},
					success:function(data){
						$('#countryList').fadeIn(); 
						$('#countryList').html(data);
						console.log(data);
					}
				})
			}
		});
		$(document).on('click', 'li', function(){
			$('#country_name').val($(this).text());
			$('#countryList').fadeOut();
		});
});


$(document).ready(function(){
	$('#country_name').keyup(function(){
		var query = $(this).val();
		if(query != '')
		{
			var _token = $('input[name="_token"]').val();
			$.ajax({
				url:"/autocomplete/fetch",
				method:"POST",
				data:{query:query, _token:_token},
				success:function(data){
					$('#countryList').fadeIn(); 
					$('#countryList').html(data);
					console.log(data);
				}
			})
		}
		else if (query == ''){
			$('#country_name').val($(this).text());
			$('#countryList').fadeOut();
		}
	});
	$(document).on('click', 'li', function(){
		$('#country_name').val($(this).text());
		$('#countryList').fadeOut();
	});

	var data =$('.edate').text();
	var arr = data.split('T');
	$(".edate").html(arr[0]);	
	

});

