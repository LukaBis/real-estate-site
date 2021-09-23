<!doctype html>
<html lang="en">
  <head>
  	<title>EstateAgency</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

	<link rel="stylesheet" href="/css/loginStyle.css">

	</head>
	<body>
	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-7 col-lg-5">
					<div class="login-wrap p-4 p-md-5">
		      	<div class="d-flex">
		      		<div class="w-100">
		      			<h3 class="mb-4">Sign In</h3>
		      		</div>
		      	</div>
						<form action="/login" method="POST" class="login-form">
              @csrf
		      		<div class="form-group">
		      			<div class="icon d-flex align-items-center justify-content-center"><span class="fa fa-user"></span></div>
		      			<input name="email" type="text" class="form-control rounded-left" placeholder="Email" required>
		      		</div>
	            <div class="form-group">
	            	<div class="icon d-flex align-items-center justify-content-center"><span class="fa fa-lock"></span></div>
	              <input name="password" type="password" class="form-control rounded-left" placeholder="Password" required>
	            </div>
              <div class="w-100">
                <label class="checkbox-wrap checkbox-primary mb-0">Remember me
                  <input type="checkbox" name="remember" checked>
                  <span class="checkmark"></span>
                </label>
              </div>
	            <div class="form-group d-flex align-items-center">
								<div class="w-100 d-flex justify-content-end">
		            	<button type="submit" class="btn btn-primary rounded submit">Login</button>
	            	</div>
	            </div>
	          </form>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
	        </div>
				</div>
			</div>
		</div>
	</section>

  <script src="/lib/jquery/jquery.min.js"></script>
  <script src="/lib/bootstrap/js/bootstrap.min.js"></script>

	</body>
</html>
