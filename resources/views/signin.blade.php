<!DOCTYPE html>
<html lang="en">

<head>
    <title>Contract Generator</title>
    @include('layout.head')
</head>

<body class="hold-transition login-page">

    <div class="login-box">
        <div class="login-logo">
            <a><b>Contact Generator</b></a>
        </div>
        <!-- /.login-logo -->
        <div class="card">
            <div class="card-body login-card-body">
            <p class="login-box-msg">Sign in to start your session</p>

            <form action="../../index3.html" method="post">
                <div class="input-group mb-3">
                <input type="email" class="form-control user_email" placeholder="Email">
                <div class="input-group-append">
                    <div class="input-group-text">
                    <span class="fas fa-envelope"></span>
                    </div>
                </div>
                </div>
                <div class="input-group mb-3">
                <input type="password" class="form-control user_pwd" placeholder="Password">
                <div class="input-group-append">
                    <div class="input-group-text">
                    <span class="fas fa-lock"></span>
                    </div>
                </div>
                </div>
                <div class="row">
                <div class="col-8">
                    <div class="icheck-primary">
                    <input type="checkbox" id="remember">
                    <label for="remember">
                        Remember Me
                    </label>
                    </div>
                </div>
                <!-- /.col -->
                <div class="col-4">
                    <button type="button" class="btn btn-primary btn-signin">Sign In</button>
                </div>
                <!-- /.col -->
                </div>
            </form>

            <p class="mb-1">
                <a href="forgot-password">I forgot my password</a>
            </p>
            </div>
            <!-- /.login-card-body -->
        </div>
    </div>
    <!-- /.login-box -->

    <!-- Bootstrap core JavaScript-->
    <script>
        $(".btn-signin").click(function() {
            signIn();
        });
        $("#pwd").keypress(function() {
            if (event.keyCode==13) {
                signIn();
            }
        });

        function signIn() {
            var email = $(".user_email").val();
            var pwd = $(".user_pwd").val();
            location.href = 'users';
            // $.get(
            //     "signin/checkuser", {
            //         n: name, //name
            //         p: pwd //pwd
            //     },
            //     function(res) {
            //         if (res == "wrong user") {
            //             alert("The user name is wrong.");
            //             $("#username").focus();
            //         } else if (res == "wrong pwd") {
            //             alert("The password is wrong.");
            //             $("#pwd").focus();
            //         } else {
            //             sessionStorage.setItem("x-t", res);
            //             sessionStorage.setItem("user", name);
            //             location.href = 'cvlist';
            //         }
            //     }
            // );
        }
    </script>
</body>

</html>