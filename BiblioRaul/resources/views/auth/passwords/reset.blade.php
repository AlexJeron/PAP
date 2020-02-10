<!DOCTYPE html>
<html lang="en">

<head>
    <title>Redefinir Senha</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Font -->
    <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">

    <!-- Icons -->
    <link rel="icon" type="image/png" href="images/icons/favicon.ico" />

    <!-- Styles -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
    <link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
    <link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
    <link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
    <link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/login-util.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/login-main.css') }}">
</head>

<body>

    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100" style="padding: 50px 55px 15px 55px;">
                <form method="POST" action="{{ route('password.update') }}" class="login100-form validate-form">
                    @csrf

                    <input type="hidden" name="token" value="{{ $token }}">

                    <span class="login100-form-title p-b-26">
                        Redefinir Senha
                    </span>
                    <span class="login100-form-title p-b-48">
                        <img src="/img/Logo.png" alt="Logo" style="height:50px; width:43px;">
                    </span>

                    <div class="wrap-input100 validate-input" data-validate="Um email válido é: a@b.c">
                        <label for="email" class="lblLogin">Email</label>
                        <input id="email" type="email" class="input100 @error('email') is-invalid @enderror"
                            name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>

                        @error('email')
                        <span class="invalid-feedback" role="alert" style="position:absolute">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                        <span class="focus-input100"></span>
                    </div>

                    <div class="wrap-input100 validate-input" data-validate="Insira uma palavra-passe">
                        <label for="password" class="lblLogin">Nova Palavra-Passe</label>
                        <span class="btn-show-pass">
                            <i class="zmdi zmdi-eye" style="margin-top:25px"></i>
                        </span>
                        <input id="password" type="password" class="input100 @error('password') is-invalid @enderror"
                            name="password" required autocomplete="new-password">

                        @error('password')
                        <span class="invalid-feedback" role="alert" style="position:absolute">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror

                        <span class="focus-input100"></span>
                    </div>

                    <div class="wrap-input100 validate-input" data-validate="Insira uma palavra-passe">
                        <label for="password-confirm" class="lblLogin">Confirmar Nova Palavra-Passe</label>
                        <span class="btn-show-pass">
                            <i class="zmdi zmdi-eye" style="margin-top:25px"></i>
                        </span>
                        <input id="password-confirm" type="password" class="input100" name="password_confirmation"
                            required autocomplete="new-password">
                    </div>

                    <div class="container-login100-form-btn" style="margin-bottom:3rem">
                        <div class="wrap-login100-form-btn">
                            <div class="login100-form-bgbtn"></div>
                            <button type="submit" class="login100-form-btn">
                                Redefinir
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <div id="dropDownSelect1"></div>

    <!-- Scripts -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/animsition/js/animsition.min.js"></script>
    <script src="vendor/bootstrap/js/popper.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="vendor/select2/select2.min.js"></script>
    <script src="vendor/daterangepicker/moment.min.js"></script>
    <script src="vendor/daterangepicker/daterangepicker.js"></script>
    <script src="vendor/countdowntime/countdowntime.js"></script>
    <script src="{{ URL::asset('js/login-main.js') }}"></script>

</body>

</html>
