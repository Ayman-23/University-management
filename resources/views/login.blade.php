<!DOCTYPE html>
<html>

<head>

    <meta charset="UTF-8">

    <title>Login | PUAIS</title>

    <link rel="stylesheet" href="css/style.css" media="screen" type="text/css" />

</head>

<body>

    <html lang="en-US">

    <head>

        <meta charset="utf-8">

        <title>Login | PUAIS</title>

        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:400,700">

        <!--[if lt IE 9]>
  <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
 <![endif]-->

    </head>

    <body>

        <div class="container">

            <div id="login">
                <form action="/login" method="get">
                    {{csrf_field() }}
                    <fieldset class="clearfix">

                        <p><span class="fontawesome-user"></span><input type="text" name="Username" onBlur="if(this.value == '')"
                                onFocus="if(this.value == 'Username') this.value = ''" placeholder="Username" required
                                value="{{old('Username')}}"></p>
                        <!-- JS because of IE support; better: placeholder="Username" -->
                        <p><span class="fontawesome-lock"></span><input type="password" name="Password" onBlur="if(this.value == '')"
                                placeholder="********" onFocus="if(this.value == 'Password') this.value = ''" required></p>
                        <!-- JS because of IE support; better: placeholder="Password" -->
                        <p><input type="submit" value="Sign In"></p>

                    </fieldset>

                </form>

                <p>Not a member? <a href="/registration">Register now</a><span class="fontawesome-arrow-right"></span></p>

            </div> <!-- end login -->

        </div>
        @if(Session::has('error'))
            <div class="alert alert-danger">
                <ul style="text-align: center; color: red">
                    <li>{{ Session::get('error') }}</li>
                </ul>
            </div>
        @endif
    </body>

    </html>

</body>

</html>
