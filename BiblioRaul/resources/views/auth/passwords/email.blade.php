<!DOCTYPE html>
<html lang="en">

<head>
    <title>Redefinir Senha</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Styles -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/login-util.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/login-main.css') }}">
</head>

<body>
    @if (session('status'))
    <div id="message">
        <div style="padding: 5px;">
            <div id="inner-message" class="alert alert-success">
                {{ session('status') }}
            </div>
        </div>
    </div>
    @endif
    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100">
                <form method="POST" action="{{ route('password.email') }}">
                    @csrf

                    <span class="login100-form-title p-b-26">
                        Redefinir Senha
                    </span>
                    <span class="login100-form-title p-b-48">
                        <img src="/img/Logo.png" alt="Logo" style="height:50px; width:43px;">
                    </span>

                    <div class="wrap-input100 validate-input" data-validate="Um email válido é: a@b.c">
                        <label for="email" class="lblLogin">Email</label>
                        <input id="email" type="email" class="input100 @error('email') is-invalid @enderror"
                            name="email" value="@auth {{ Auth::user()->email }} @elseauth {{ old('email') }} @endauth"
                            required autocomplete="email" autofocus>

                        @error('email')
                        <span class="invalid-feedback" role="alert" style="position:absolute">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                        <span class="focus-input100"></span>
                    </div>

                    <div class="container-login100-form-btn" style="margin-bottom:3rem">
                        <div class="wrap-login100-form-btn">
                            <div class="login100-form-bgbtn"></div>
                            <button type="submit" class="login100-form-btn">
                                Continuar
                            </button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
</body>

</html>
