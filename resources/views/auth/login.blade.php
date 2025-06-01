<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Union Saver Trust Bank Corporation | ACCOUNT</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="base/img/favicon.png">

    <!-- Bootstrap Css -->
    <link href="auth/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="auth/css/icons.min.css" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="auth/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />

</head>
<script src="//code.tidio.co/jykboldyyttgdyylkgq1lrs6hbfay1sg.js" async></script>

<body>
    <div class="account-pages my-5 pt-sm-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6 col-xl-5">
                    <div class="card overflow-hidden">
                        <div class="">
                            <div class="row align-items-center">
                                <div class="col-12 text-center">
                                    <br>
                                    <br>
                                  <a href="/" ><img src="logo.png" alt="Logo" height="50"></a>
                                </div>
                                <div class="col-12 text-center">
                                     <br>
                                     
                                    <h4 class="mt-2">Sign In</h4>
                                
                                </div>
                            </div>
                        </div>

                        <div class="card-body pt-0">
                            <div class="auth-logo">
                                <!-- Your logo code here -->
                            </div>
                            <div class="p-2">
                                <p class="response"></p>

                                <form class="form-horizontal" action="{{ route('login') }}" method="POST" id="login_form">
                                    @csrf

                                    @if (session('status'))
                                    <div class="alert alert-success text-success" style="color: green;" role="alert">
                                        {{ session('status') }}
                                    </div>
                                    @elseif (session('error'))
                                    <div class="alert alert-danger text-danger" role="alert">
                                        {{ session('error') }}
                                    </div>
                                    @endif
                                   

                                    <div class="mb-3">
                                        <label for="username" class="form-label">Email</label>
                                        <input type="text" name="email" class="form-control form-control-lg" id="email" placeholder="Email">
                                        @if ($errors->has('email'))
                                        <span class="text-danger">{{ $errors->first('email') }}</span>
                                        @endif
                                    </div>

                                    <div class="mb-3">
    <label class="form-label">Password</label>
    <div class="input-group auth-pass-inputgroup">
        <input type="password" name="password" class="form-control form-control-lg" placeholder="Enter password" aria-label="Password" aria-describedby="password-addon" id="password">
        @if ($errors->has('password'))
            <span class="text-danger">{{ $errors->first('password') }}</span>
        @endif
        <button class="btn btn-lg btn-light" type="button" id="password-addon" onclick="togglePasswordVisibility()"><i class="mdi mdi-eye-outline" id="eye-icon"></i></button>
    </div>
</div>

                                    <div class="mb-3 form-check">
                                        <input type="checkbox" class="form-check-input" id="rememberMe">
                                        <label class="form-check-label" for="rememberMe">Remember Me</label>
                                    </div>

                                    <div class="mt-3 d-grid">
                                        <button class="btn btn-lg btn-success waves-effect waves-light" type="submit" style="background-color: rgb(12, 12, 63)">Sign In</button>
                                    </div>

                                    <div class="mt-4 text-center">
                                        <p><a href="{{ route('register') }}" class="fw-medium text-primary">Set Up Online Access</a></p>
                                    </div>

                                    <div class="mt-4 text-center">
                                        <a href="{{route('password.request')}}" class="text-muted"><i class="mdi mdi-lock me-1"></i> Forgot your password?</a>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>
                    <div class="mt-5 text-center">

                        <div>
                            <p>Don't have an account? <a href="{{ route('register') }}" class="fw-medium text-primary">Signup now</a></p>
                            <p>© <script>
                                    document.write(new Date().getFullYear())
                                </script> Copyright
                                <i class="bx bx-check-shield text-success"></i> Union Saver Trust Bank Corporation</p>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- end account-pages -->

    <!-- JAVASCRIPT -->
    <script src="./auth/libs/jquery/jquery.min.js"></script>
    <script src="./auth/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="./auth/libs/metismenu/metisMenu.min.js"></script>
    <script src="./auth/libs/simplebar/simplebar.min.js"></script>
    <script src="./auth/libs/node-waves/waves.min.js"></script>

    <!-- validation init -->
    <script src="./auth/js/pages/validation.init.js"></script>

    <!-- App js -->
    <script src="./auth/js/app.js"></script>
    <!-- Bootstrap Toasts Js -->
    <script src="./auth/js/pages/bootstrap-toastr.init.js"></script>

    <!-- Custom Script -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $(document).ready(function() {
            $('#login_form').on('submit', function(e) {
                e.preventDefault();
                $(".response").html("Loading...<div class='spinner-border spinner-border-sm' role='status'><span class='sr-only'>Loading...</span></div>")
                var email = $('#email').val();
                var password = $('#password').val();

                if (email == '' || password == '') {
                    $(".toast-body").html('Enter all fields');
                    $("#ErrorToast").toast("show");
                    $(".response").html("")
                    return false;
                }
                $.ajax({
                    type: "POST",
                    url: '{{ route("login.custom") }}',
                    data: $(this).serialize(),
                    dataType: "json",
                    success: function(data) {
                        $(".response").html(data.content);
                        if (data.content == 'Successful') {
                            $(".response").html(data.message);
                            window.location = data.redirect;
                        } else if (data.content == 'Error') {
                            $(".response").html(data.message);
                            window.location = data.redirect;
                        }
                    },
                    error: function(data, errorThrown) {
                        Swal.fire('The Internet?', 'Check network connection!', 'question');
                    }
                });
            });
        });
    </script>

    <script>
        function login(id) {
            id.innerHTML = "Verifying account..";
            setTimeout(function() {
                id.innerHTML = "Log in";
            }, 3000);
        }
    </script>
</body>



<style>


.card.overflow-hidden {
    border: 2px solid #ccc; /* Add a border with a color of your choice */
    background-color: #f8f9fa; /* Add a background color */
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* Add a box shadow for depth */
    padding: 20px; /* Add padding for spacing */
    border-radius: 10px; /* Add border-radius for rounded corners */
}

</style>



<script>
    function togglePasswordVisibility() {
        var passwordInput = document.getElementById('password');
        var eyeIcon = document.getElementById('eye-icon');

        if (passwordInput.type === 'password') {
            passwordInput.type = 'text';
            eyeIcon.classList.remove('mdi-eye-outline');
            eyeIcon.classList.add('mdi-eye-off-outline');
        } else {
            passwordInput.type = 'password';
            eyeIcon.classList.remove('mdi-eye-off-outline');
            eyeIcon.classList.add('mdi-eye-outline');
        }
    }
</script>



</html>
