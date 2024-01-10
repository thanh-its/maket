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
        <section class="register" style="margin-bottom:150px;">
            <div class="container">
              <div class="row">
                  <div class="col-md-3"></div>
                  <div class="col-md-6">
                  <form action="" method="POST" enctype="multipart/form-data">
                    <div class="text-center title-login" style="margin-bottom: 15px;margin-top:50px;">
                      <p class="lead fw-normal mb-0 me-3">Đăng ký</p>
                    </div>
                    <div class="form-outline mb-4" style="margin-bottom:15px;">
                        <label class="form-label" for="form3Example3">Họ tên</label>
                        <input type="text" id="form3Example3" class="form-control form-control-lg"
                        placeholder="Điền họ tên" />
                    </div>
                    <div class="input-bg" style="margin-bottom: 15px;">
                        <label class="choose-imge" for="choose-image">Chọn ảnh</label>
                        <input name="img" id="choose-image" type="file">
                        @error('img')
                        <span style="color:red">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-outline mb-4" style="margin-bottom:15px;">
                        <label class="form-label" for="form3Example3">Email</label>
                        <input type="email" id="form3Example3" class="form-control form-control-lg"
                        placeholder="Điền email" />
                    </div>
                    <div class="form-outline mb-4" style="margin-bottom:15px;">
                        <label class="form-label" for="form3Example3">Mật khẩu</label>
                        <input type="password" id="form3Example3" class="form-control form-control-lg"
                        placeholder="Điền mật khẩu" />
                    </div>
                    <div class="form-outline mb-4" style="margin-bottom:15px;">
                        <label class="form-label" for="form3Example3">Địa chỉ</label>
                        <input type="text" id="form3Example3" class="form-control form-control-lg"
                        placeholder="Điền địa chỉ" />
                    </div>
                    <div class="form-outline mb-4" style="margin-bottom:15px;">
                        <label class="form-label" for="form3Example3">Số điện thoại</label>
                        <input type="text" id="form3Example3" class="form-control form-control-lg"
                        placeholder="Điền số điện thoại" />
                    </div>
                    <div class="text-center text-lg-start mt-4 pt-2">
                      <button type="button" class="btn btn-primary btn-lg"
                        style="padding-left: 2.5rem; padding-right: 2.5rem; margin-bottom:10px; margin-top:15px;">Đăng ký</button>
                        <br>
                        <h4 class="small fw-bold mt-2 pt-1 mb-0">Hoặc đăng nhập bằng</h4>
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
          
                  </form>
                </div>
                <div class="col-md-3"></div>
                </div>
            </div>
          </section>
        @include('client.divide.footer')
</body>
</html>