<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="plugin/login-page/css/style.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.2/css/all.css">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>
    <section>
        <div class="imgBox">
            <img src="plugin/login-page/img/bg.jpg" alt="background">
        </div>
        <div class="contentBox">
            <div class="formBox">
                <h2>Login</h2>
				<form action="{!! route('admin.login') !!}" method="post">
					@csrf
                    <div class="inputBox">
                        <span>User Name</span>
                        <input class="form-input" type="text" name="user_name" required>
					</div>
					
					@if (Session::has('error_message'))
						<div class="alert show">
							<span class="fas fa-exclamation-circle"></span>
							<span class="msg">Error: {{Session::get('error_message')}}</span>
							<div class="close-btn">
								<span class="fas fa-times"></span>
							</div>
						</div>
					@endif

                    <div class="inputBox">
                        <span>Password</span>
                        <input class="form-input" type="password" name="password" required>
                    </div>
                    <div class="remember">
                        <label>
                            <input type="checkbox">
                            Remember Me
                        </label>
                    </div>
                    <div class="inputBox">
                        <input class="submit" type="submit" value="Log in" name="">
                    </div>
                    <div class="signUpBox">
                        <p>Don't have an account? <a href="signUp.html">Sign up</a></p>
                    </div>
                </form>

                <div class="mediaBox">
                    <h3>Login with social media</h3>
                    <ul>
                        <li>
                            <a href="#"><i class="fab fa-facebook-f"></i></a>
                        </li>
                        <li>
                            <a href="#"><i class="fab fa-twitter"></i></a>
                        </li>
                        <li>
                            <a href="#"><i class="fab fa-instagram"></i></a>
                        </li>
                    </ul>
                </div>
            </div>            
        </div>
	</section>
	
	<script>
		$('.close-btn').click(function(){
			$('.alert').removeClass("show");
			$('.alert').addClass("hide");
			$('.alert').addClass("hideAll");
      	});
	</script>
</body>
</html>