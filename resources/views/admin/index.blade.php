<!doctype html>
<!--[if lte IE 9]> <html class="lte-ie9" lang="en"> <![endif]-->
<!--[if gt IE 9]><!--> <html lang="en"> <!--<![endif]-->
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="initial-scale=1.0,maximum-scale=1.0,user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Remove Tap Highlight on Windows Phone IE -->
    <meta name="msapplication-tap-highlight" content="no"/>

    <link rel="icon" type="image/png" href="{{ URL::to('public/assets/img/favicon-16x16.png')}}" sizes="16x16">
    <link rel="icon" type="image/png" href="{{ URL::to('public/assets/img/favicon-32x32.png')}}" sizes="32x32">

    <title>Type Master || Login Page</title>

    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500" rel='stylesheet' type='text/css'>

    <!-- uikit -->
    <link rel="stylesheet" href="{{ URL::to('public/bower_components/uikit/css/uikit.almost-flat.min.css')}}"/>

    <!-- altair admin login page -->
    <link rel="stylesheet" href="{{ URL::to('public/assets/css/login_page.min.css')}}" />
    
    <!-- UIKit CSS -->
    <link id="data-uikit-theme" rel="stylesheet" href="{{ URL::to('public/uikit/uikit.docs.min.css') }}">
    <link rel="stylesheet" href="{{ URL::to('public/bower_components/uikit/css/uikit.almost-flat.min.css') }}"/>

</head>
<body class="login_page">

    <div class="login_page_wrapper">
        <div class="md-card" id="login_card">
            <div class="md-card-content large-padding" id="login_form">
                <div class="login_heading">
                    <div class="user_avatar"></div>
                </div>
                    
                  <?php if(Session::get('password_change') != null) { ?>
                  <div class="alert alert-info alert-dismissible" role="alert">
                  <a href="#" class="fa fa-times" data-dismiss="alert" aria-label="close"></a>
                  <strong><?php echo Session::get('password_change') ;  ?></strong>
                  <?php Session::put('password_change',null) ;  ?>
                  </div>
                  <?php } ?>

                    <form class="lock-form pull-left" method="post" id="loginProcess">
                    <div class="uk-form-row">
                        <label for="login_username">Username (E-mail Address)</label>
                        <input class="md-input" type="email" id="login_username" name="email" />
                    </div>
                    <div class="uk-form-row">
                        <label for="login_password">Password</label>
                        <input class="md-input" type="password" id="login_password" name="password" />
                    </div>
                    <div class="uk-margin-medium-top">
                        <button type="submit" class="md-btn md-btn-primary md-btn-block md-btn-large">Sign In</button>
                    </div>
                    <div class="uk-grid uk-grid-width-1-3 uk-grid-small uk-margin-top" style="display: none;">
                        <div><a href="#" class="md-btn md-btn-block md-btn-facebook" data-uk-tooltip="{pos:'bottom'}" title="Sign in with Facebook"><i class="uk-icon-facebook uk-margin-remove"></i></a></div>
                        <div><a href="#" class="md-btn md-btn-block md-btn-twitter" data-uk-tooltip="{pos:'bottom'}" title="Sign in with Twitter"><i class="uk-icon-twitter uk-margin-remove"></i></a></div>
                        <div><a href="#" class="md-btn md-btn-block md-btn-gplus" data-uk-tooltip="{pos:'bottom'}" title="Sign in with Google+"><i class="uk-icon-google-plus uk-margin-remove"></i></a></div>
                    </div>
                    <div class="uk-margin-top" style="display: none;">
                        <a href="#" id="login_help_show" class="uk-float-right">Need help?</a>
                        <span class="icheck-inline">
                            <input type="checkbox" name="login_page_stay_signed" id="login_page_stay_signed" data-md-icheck />
                            <label for="login_page_stay_signed" class="inline-label">Stay signed in</label>
                        </span>
                    </div>
                    </form>
            </div>
            <div class="md-card-content large-padding uk-position-relative" id="login_help" style="display: none">
                <button type="button" class="uk-position-top-right uk-close uk-margin-right uk-margin-top back_to_login"></button>
                <h2 class="heading_b uk-text-success">Can't log in?</h2>
                <p>Here’s the info to get you back in to your account as quickly as possible.</p>
                <p>First, try the easiest thing: if you remember your password but it isn’t working, make sure that Caps Lock is turned off, and that your username is spelled correctly, and then try again.</p>
                <p>If your password still isn’t working, it’s time to <a href="#" id="password_reset_show">reset your password</a>.</p>
            </div>
            <div class="md-card-content large-padding" id="login_password_reset" style="display: none">
                <button type="button" class="uk-position-top-right uk-close uk-margin-right uk-margin-top back_to_login"></button>
                <h2 class="heading_a uk-margin-large-bottom">Reset password</h2>
                <form>
                    <div class="uk-form-row">
                        <label for="login_email_reset">Your email address</label>
                        <input class="md-input" type="text" id="login_email_reset" name="login_email_reset" />
                    </div>
                    <div class="uk-margin-medium-top">
                        <a href="index.html" class="md-btn md-btn-primary md-btn-block">Reset password</a>
                    </div>
                </form>
            </div>
            <div class="md-card-content large-padding" id="register_form" style="display: none">
                <button type="button" class="uk-position-top-right uk-close uk-margin-right uk-margin-top back_to_login"></button>
                <h2 class="heading_a uk-margin-medium-bottom">Create an account</h2>
                <form>
                    <div class="uk-form-row">
                        <label for="register_username">Username</label>
                        <input class="md-input" type="text" id="register_username" name="register_username" />
                    </div>
                    <div class="uk-form-row">
                        <label for="register_password">Password</label>
                        <input class="md-input" type="password" id="register_password" name="register_password" />
                    </div>
                    <div class="uk-form-row">
                        <label for="register_password_repeat">Repeat Password</label>
                        <input class="md-input" type="password" id="register_password_repeat" name="register_password_repeat" />
                    </div>
                    <div class="uk-form-row">
                        <label for="register_email">E-mail</label>
                        <input class="md-input" type="text" id="register_email" name="register_email" />
                    </div>
                    <div class="uk-margin-medium-top">
                        <a href="index.html" class="md-btn md-btn-primary md-btn-block md-btn-large">Sign Up</a>
                    </div>
                </form>
            </div>
        </div>
        <div class="uk-margin-top uk-text-center">
            <a href="{{ URL::to('userSignUp') }}">Sign Up</a>
        </div>
    </div>

    <!-- common functions -->
    <script src="{{ URL::to('public/assets/js/common.min.js')}}"></script>
    <!-- uikit functions -->
    <script src="{{ URL::to('public/assets/js/uikit_custom.min.js')}}"></script>
    <!-- altair core functions -->
    <script src="{{ URL::to('public/assets/js/altair_admin_common.min.js')}}"></script>

    <!-- altair login page functions -->
    <script src="{{ URL::to('public/assets/js/pages/login.min.js')}}"></script>

    <!-- UIKit Javascript -->
    <script src="{{ URL::to('public/uikit/uikit.min.js') }}"></script>
    <script src="{{ URL::to('public/uikit/notify.js') }}"></script>

    <script>
        // check for theme
        if (typeof(Storage) !== "undefined") {
            var root = document.getElementsByTagName( 'html' )[0],
                theme = localStorage.getItem("altair_theme");
            if(theme == 'app_theme_dark' || root.classList.contains('app_theme_dark')) {
                root.className += ' app_theme_dark';
            }
        }
    </script>

    <script>
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
                (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
            m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','../www.google-analytics.com/analytics.js','ga');
        ga('create', 'UA-65191727-1', 'auto');
        ga('send', 'pageview');
    </script>

    <script>

    $(document).ready(function(){
        $("#loginProcess").on('submit',function(e){
            e.preventDefault();
            
            var login_username = $("#login_username").val();
            var login_password = $("#login_password").val();

            // alert('Okkkk');
            // return false;

            $.ajaxSetup({
                headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
            });

            $.ajax({
                'url':"{{ url('/loginProcess') }}",
                'type':'post',
                'dataType':'text',
                data:{login_username:login_username,login_password:login_password},
                success:function(data)
                {

                    // alert(data);
                    // return false;

                    if(data == "e"){
                        UIkit.notify({
                            message : 'Please Provide Username !',
                            status  : 'danger',
                            timeout : 5000,
                            pos     : 'bottom-center'
                        });
                        return false;
                    }

                    if(data == "p"){
                        UIkit.notify({
                            message : 'Please Provide Password !',
                            status  : 'warning',
                            timeout : 5000,
                            pos     : 'bottom-center'
                        });
                        return false;
                    }

                    if(data =='69'){
                        UIkit.notify({
                            message : 'Username & password does not match. Try again.',
                            status  : 'danger',
                            timeout : 5000,
                            pos     : 'bottom-center'
                        });
                        return false;
                    }

                    if(data =='1'){
                        location.href = "{{ url('/adminDashboard') }}";
                    }else{
                        location.href = "{{ url('/entrepreneurDashboard') }}";
                    }

                }
            });

        });        
    })        
    </script>

</body>
</html>