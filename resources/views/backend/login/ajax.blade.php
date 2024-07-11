$(document).ready(function(){
	$("#password").keyup(function(e){
		var code = e.which;
		if(code==13)e.preventDefault();
		if(code==32||code==13||code==188||code==186){
			$(".goLogin").click();
		}
	});
	$(".goLogin").click(function(e){
		$('.form-group').removeClass('has-error');
		var password = $("#password").val();
		var username = $("#username").val();
		var capca = $("#g-recaptcha-response").val();
		var _token = $("[name='_token']").val();
		var dataString = { 'username': username.replace(/\s/g, ''), 'password': $.base64.encode(password), '_token': _token, 'g-recaptcha-response':capca};
		$.ajax({
			type: "POST",
			url: "{{ url('pengguna/masuk') }}",
			data: dataString,
			dataType: 'json',
			cache: false,
			beforeSend: function(){
				$(".username,.password,.goLogin").prop("disabled", "disabled");
				$(".goLogin").val('Connecting...');
                $(".loading").show();
                $(".fa-sign-in").hide();
			},
			success: function(data){
                $(".loading").hide();
				if(data.status == true){
					$(".form-masuk").hide();
					$(".pesan,.fa-sign-in").show();
					$(".pesan").html('<div class="alert alert-success" role="alert"><i class="fa fa-check-circle"></i> Berhasil login, Harap tunggu...</div>');
					setTimeout(function() {
						location.href="{{ url('/home') }}";
					},1000);
				}else{
					$(".pesan,.fa-sign-in").show();
					$(".username,.password,.goLogin").prop("disabled", false);
					$.each(data.pesan, function(i, item) {
						$('#'+i).closest('.form-group').addClass('has-error').shake();
						$('#'+i).focus();
						$(".pesan").html('<div class="alert alert-danger" role="alert"><i class="fa fa-ban"></i> '+ item +'</div>');
						setTimeout(function() {
							$(".pesan,.fa-sign-in").hide();
						},5000);
					});
				}
				$(".goLogin").val('Log In');
			},error:function(x, e){
                $(".loading").hide();
				$(".pesan,.fa-sign-in").show();
				$(".goLogin").prop("disabled", false);
				$(".pesan").html('<div class="alert alert-danger" role="alert"><i class="fa fa-ban"></i> Terjadi kesalahan. Error '+ x.status +'</div>');
				$(".goLogin").val('Log In');
			}
		});
		return false;
	});
});
