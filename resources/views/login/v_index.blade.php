
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Login | Knowledge Management System</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ URL::asset('theme/adminlte305/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css') }}">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="{{ URL::asset('theme/adminlte305/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ URL::asset('theme/adminlte305/dist/css/adminlte.min.css') }}">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <link rel="shortcut icon" href="{{ URL::asset('favicon/favicon.ico') }}">
    <link rel="icon" sizes="16x16 32x32 64x64" href="{{ URL::asset('favicon/favicon.ico') }}">
    <link rel="icon" type="image/png" sizes="196x196" href="{{ URL::asset('favicon/favicon-192.png') }}">
    <link rel="icon" type="image/png" sizes="160x160" href="{{ URL::asset('favicon/favicon-160.png') }}">
    <link rel="icon" type="image/png" sizes="96x96" href="{{ URL::asset('favicon/favicon-96.png') }}">
    <link rel="icon" type="image/png" sizes="64x64" href="{{ URL::asset('favicon/favicon-64.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ URL::asset('favicon/favicon-32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ URL::asset('favicon/favicon-16.png') }}">
    <link rel="apple-touch-icon" href="{{ URL::asset('favicon/favicon-57.png') }}">
    <link rel="apple-touch-icon" sizes="114x114" href="{{ URL::asset('favicon/favicon-114.png') }}">
    <link rel="apple-touch-icon" sizes="72x72" href="{{ URL::asset('favicon/favicon-72.png') }}">
    <link rel="apple-touch-icon" sizes="144x144" href="{{ URL::asset('favicon/favicon-144.png') }}">
    <link rel="apple-touch-icon" sizes="60x60" href="{{ URL::asset('favicon/favicon-60.png') }}">
    <link rel="apple-touch-icon" sizes="120x120" href="{{ URL::asset('favicon/favicon-120.png') }}">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ URL::asset('favicon/favicon-76.png') }}">
    <link rel="apple-touch-icon" sizes="152x152" href="{{ URL::asset('favicon/favicon-152.png') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ URL::asset('favicon/favicon-180.png') }}">
    <meta name="msapplication-TileColor" content="#FFFFFF">
    <meta name="msapplication-TileImage" content="{{ URL::asset('favicon/favicon-144.png') }}">
    <meta name="msapplication-config" content="{{ URL::asset('favicon/browserconfig.xml') }}">
</head>
<body class="hold-transition login-page">
<div class="login-box">
    <div class="login-logo">
        <a href="#"><b>Knowledge Management System</b></a>
    </div>
    <!-- /.login-logo -->
    <div class="card">
            <div class="overlay" id="overlay-login" hidden>
                <i class="fas fa-2x fa-sync-alt fa-spin"></i>
            </div>
        <div class="card-body login-card-body">
            <p class="login-box-msg">Sign in to start an awesomeness ..</p>

            <form action="{{ route('login.validate') }}" method="post" id="form-login">
                @csrf
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="NIP or Email" name="txt_cred">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-user-alt"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input type="password" class="form-control" placeholder="Password" id="password" name="txt_password">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Captcha" name="txt_captcha" id="captcha">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-unlock-alt"></span>
                        </div>
                    </div>
                </div>
                <div class="mb-3 text-center">
                    <div id="captha-js">
                        {!! captcha_img('inverse') !!}
                    </div>
                </div>
                <div class="input-group mb-3">
                    <div class="col-4">
                        <button type="submit" class="btn btn-primary btn-block" id="btn-signin">Sign In</button>
                    </div>
                </div>
                <div class="row">
                    <!-- /.col -->

                    <!-- /.col -->
                </div>
            </form>
        </div>
        <!-- /.login-card-body -->
    </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="{{ URL::asset('theme/adminlte305/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ URL::asset('theme/adminlte305/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ URL::asset('theme/adminlte305/dist/js/adminlte.min.js') }}"></script>
<!-- AES -->
<script src="{{ asset('js/aes.js') }}"></script>
<script src="{{ asset('jquery-validator/jquery.form-validator.min.js') }}"></script>
<script>

    var CryptoJSAesJson = {
        stringify: function (cipherParams) {
            var j = {ct: cipherParams.ciphertext.toString(CryptoJS.enc.Base64)};
            if (cipherParams.iv) j.iv = cipherParams.iv.toString();
            if (cipherParams.salt) j.s = cipherParams.salt.toString();
            return JSON.stringify(j);
        },
        parse: function (jsonStr) {
            var j = JSON.parse(jsonStr);
            var cipherParams = CryptoJS.lib.CipherParams.create({ciphertext: CryptoJS.enc.Base64.parse(j.ct)});
            if (j.iv) cipherParams.iv = CryptoJS.enc.Hex.parse(j.iv)
            if (j.s) cipherParams.salt = CryptoJS.enc.Hex.parse(j.s)
            return cipherParams;
        }
    }

    // JQuery Validator
    $.validate();

    $(function () {
        $('#btn-signin').click(function () {
            var passphrase = 'dot-kms';
            var passw = document.getElementById('password').value;
            document.getElementById('password').value = CryptoJS.AES.encrypt(JSON.stringify(passw), passphrase, {format: CryptoJSAesJson}).toString();
            return true;
        });
    });
    $("#form-login").on("submit", function (event) {
        event.preventDefault();

        var url  = $("#form-login").attr('action');
        var cred = $("input[name=txt_cred]").val();

        if (cred == '') {
            alert('Credential cannot be empty ..');
        } else {
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url : url,
                type : 'POST',
                data : $("#form-login").serialize(),
                beforeSend : function () {
                    // add overlay
                    $("#overlay-login").removeAttr("hidden");
                },
                success : function(data) {
                    setTimeout(function(){
                        // Button loading reset
                        var obj = jQuery.parseJSON(JSON.stringify(data));

                        if (obj.status == 'error') {
                            $(document).Toasts('create', {
                                class: 'bg-danger',
                                title: obj.title,
                                position: 'bottomRight',
                                body: obj.message,
                                icon: 'fas fa-envelope fa-lg',
                                autohide: true,
                                delay: 10000,
                            });
                            $("#overlay-login").attr("hidden",true);
                            $("#password").val('');
                            $("#captcha").val('');
                            $("#captha-js").html(data.captcha);
                        }
                        else if (obj.status == 'errors') {
                            $(document).Toasts('create', {
                                class: 'bg-danger',
                                title: obj.title,
                                position: 'bottomRight',
                                body: obj.message,
                                icon: 'fas fa-envelope fa-lg',
                                autohide: true,
                                delay: 10000,
                            });
                            $("#overlay-login").attr("hidden",true);
                            $("#password").val('');
                            $("#captcha").val('');
                            $("#captha-js").html(data.captcha);
                        } else {
                            $(document).Toasts('create', {
                                class: 'bg-success',
                                title: obj.title,
                                position: 'bottomRight',
                                body: obj.message,
                                icon: 'fas fa-envelope fa-lg',
                                autohide: true,
                                delay: 10000,
                            });
                            $("#overlay-login").attr("hidden",true);
                            setTimeout(function () {
                                window.location = data.redirect;
                            }, 1500);
                        }
                    }, 500);
                },
                error: function(xhr) {
                    var xhr = JSON.parse(xhr.responseText);
                    var html = '';
                    for (var key in xhr.errors)
                    {
                        html += '<li>'+ xhr.errors[key][0] + '</li>'
                    }
                    $(document).Toasts('create', {
                        class: 'bg-danger',
                        title: xhr.message,
                        position: 'bottomRight',
                        body: html,
                        icon: 'fas fa-envelope fa-lg',
                        autohide: true,
                        delay: 10000,
                    });
                    $("#overlay-login").attr("hidden",true);
                }
            });
        }
    });
</script>

</body>
</html>
