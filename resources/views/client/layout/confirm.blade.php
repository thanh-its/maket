<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{ asset('client/Css/confirm.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
</head>

<body>
    <div class="login__bg">
        <div class="login__container">
            <div class="login__body">
                <div class="login_title" style="text-align: center;">
                    <h3>Nhập mã xác nhận</h3>
                    <div class="icon-lock">
                        <i class="fas fa-lock"></i>
                    </div>
                </div>
                <form action="" method="POST" class="login__form" enctype="multipart/form-data">
                    @csrf
                    <div class="input__bag">
                        <input class="login__input" name="confirm" placeholder="Nhập mã xác nhận" type="text">
                        @error('confirm')
                        <span style="color:red"></span>
                        @enderror
                    </div>
                    <p class="resgister__rules">Hãy nhập mã xác nhận trong email <br> của bạn
                        <span class="home"><a href="">Freshio Organic Store</a></span>
                    </p>
                    <div class="btn_bag">
                        <a href="" class="btn__login-link">Trở lại</a>
                        <button class="btn__login">Xác nhận</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script>
    $(function() {
        <?php if (session()->exists('error')) { ?>

            Swal.fire({
                icon: 'warning',
                title: '<?= session('error') ?>',
                timer: 3000,

            })

        <?php
            session()->forget('error');
        } elseif (session()->exists('success')) { ?>
            Swal.fire({

                icon: 'success',
                title: '<?= session('success') ?>',
                showConfirmButton: false,
                timer: 1500

            })

        <?php session()->forget('success');
        }
        ?>
    });
</script>


</html>