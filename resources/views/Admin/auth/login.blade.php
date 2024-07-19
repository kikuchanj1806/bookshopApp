<!DOCTYPE html>
<html>
<head>
    <title>Admin Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link href="{{ asset('assets/css/styleAdmin/login.css') }}" rel="stylesheet">
</head>
<body>
<section>
    <div class="page-header min-vh-100">
        <div class="container">
            <div class="row">
                <div class="col-xl-4 col-lg-5 col-md-7 d-flex flex-column mx-lg-0 mx-auto">
                    <div class="card card-plain">
                        <div class="card-header pb-0 text-start mb-2">
                            <h4 class="font-weight-bolder">Đăng nhập</h4>
                            <p class="mb-0">Nhập mã CTV và mật khẩu của bạn để đăng nhập</p>
                        </div>
                        <div class="card-body">
                            <form role="form" method="POST" action="{{ route('admin.login.post') }}">
                                @csrf
                                @method('post')
                                <div class="flex flex-col mb-3">
                                    <input type="text" name="username" class="form-control form-control-lg" value="{{ old('username') ?? '' }}" aria-label="Mã CTV" placeholder="Mã CTV">
                                    @include('Admin.partials.alert', ['type' => 'text', 'message' => Session::get('error')])
                                </div>
                                <div class="flex flex-col mb-3">
                                    <input type="password" name="password" class="form-control form-control-lg" aria-label="Mật khẩu" placeholder="Mật khẩu">
                                </div>
                                <div class="form-check form-switch">
                                    <input class="form-check-input" name="remember" type="checkbox" id="rememberMe">
                                    <label class="form-check-label" for="rememberMe">Ghi nhớ tôi</label>
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-lg btn-primary btn-lg w-100 mt-4 mb-0">Đăng nhập</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div
                    class="col-6 d-lg-flex d-none h-100 my-auto pe-0 position-absolute top-0 end-0 text-center justify-content-center flex-column">
                    <div class="position-relative bg-gradient-primary h-100 m-3 px-7 border-radius-lg d-flex flex-column justify-content-center overflow-hidden"
                         style="background-image: url('https://raw.githubusercontent.com/creativetimofficial/public-assets/master/argon-dashboard-pro/assets/img/signin-ill.jpg');
              background-size: cover;">
                        <span class="mask bg-gradient-primary opacity-6"></span>
                        <h4 class="mt-5 text-white font-weight-bolder position-relative">"Attention is the new
                            currency"</h4>
                        <p class="text-white position-relative">The more effortless the writing looks, the more
                            effort the writer actually put into the process.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
</body>
</html>
