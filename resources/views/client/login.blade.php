<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Hurricane&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="{{asset('client/css/base.css')}}">
	<link rel="stylesheet" href="{{asset('client/css/login.css')}}">

</head>
<body>
        @include('client.divide.header')
        <section class="login">
            <div class="container">
              <div class="row">
                  <div class="col-md-3"></div>
                  <div class="col-md-6">
                  <form action="" method="POST" enctype="multipart/form-data">
                    <div class="text-center title-login" style="margin-bottom: 15px;">
                      <p class="lead fw-normal mb-0 me-3">Đăng nhập</p>
                      <button type="button" class="btn btn-primary btn-floating mx-1">
                        <i class="fab fa-facebook-f"></i>
                      </button>
          
                      <button type="button" class="btn btn-primary btn-floating mx-1">
                        <i class="fab fa-twitter"></i>
                      </button>
          
                      <button type="button" class="btn btn-primary btn-floating mx-1">
                        <i class="fab fa-linkedin-in"></i>
                      </button>
                    </div>
          
                    <!-- Email input -->
                    <div class="form-outline mb-4" style="margin-bottom:15px;">
                        <label class="form-label" for="form3Example3">Email address</label>
                        <input type="email" id="form3Example3" class="form-control form-control-lg"
                        placeholder="Enter a valid email address" />
                    </div>
          
                    <!-- Password input -->
                    <div class="form-outline mb-3" style="margin-bottom:15px;">
                        <label class="form-label" for="form3Example4">Password</label>
                        <input type="password" id="form3Example4" class="form-control form-control-lg"
                        placeholder="Enter password" />
                    </div>
          
                    <div class="d-flex justify-content-between align-items-center">
                      <!-- Checkbox -->
                      <div class="form-check mb-0">
                        <input class="form-check-input me-2" type="checkbox" value="" id="form2Example3" />
                        <label class="form-check-label" for="form2Example3">
                          Remember me
                        </label>
                      </div>
                      <a href="#!" class="text-body">Forgot password?</a>
                    </div>
          
                    <div class="text-center text-lg-start mt-4 pt-2">
                      <button type="button" class="btn btn-primary btn-lg"
                        style="padding-left: 2.5rem; padding-right: 2.5rem; margin-bottom:10px; margin-top:15px;">Login</button>
                      <p class="small fw-bold mt-2 pt-1 mb-0">Don't have an account? <a href="#!"
                          class="link-danger">Register</a></p>
                    </div>
          
                  </form>
                </div>
                <div class="col-md-3"></div>
                </div>
            </div>
          </section>
        @include('client.divide.footer')
</body>
</html>