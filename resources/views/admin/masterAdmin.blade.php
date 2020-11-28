<?php

$admin_id    = Session::get('admin_id');
$type        = Session::get('type');
      
if($admin_id == null && $type == null){
    return Redirect::to('/')->send();
    exit();
}

if($admin_id == null && $type != '1'){
    return Redirect::to('/')->send();
    exit();
}

if($admin_id != null && $type != '1'){
    return Redirect::to('/')->send();
    exit();
}

date_default_timezone_set('Asia/Dhaka');

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="initial-scale=1.0,maximum-scale=1.0,user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Remove Tap Highlight on Windows Phone IE -->
    <meta name="msapplication-tap-highlight" content="no"/>

    <link rel="icon" type="image/png" href="{{ URL::to('public/assets/img/favicon-16x16.png')}}" sizes="16x16">
    <link rel="icon" type="image/png" href="{{ URL::to('public/assets/img/favicon-32x32.png')}}" sizes="32x32">

    <title>Smart Typing || Admin Panel</title>
    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- additional styles for plugins -->
    <!-- weather icons -->
    <link rel="stylesheet" href="{{ URL::to('public/bower_components/weather-icons/css/weather-icons.min.css')}}" media="all">
    <!-- metrics graphics (charts) -->
    <link rel="stylesheet" href="{{ URL::to('public/bower_components/metrics-graphics/dist/metricsgraphics.css')}}">
    <!-- chartist -->
    <link rel="stylesheet" href="{{ URL::to('public/bower_components/chartist/dist/chartist.min.css')}}">
    
    <!-- uikit -->
    <link rel="stylesheet" href="{{ URL::to('public/bower_components/uikit/css/uikit.almost-flat.min.css')}}" media="all">

    <!-- flag icons -->
    <link rel="stylesheet" href="{{ URL::to('public/assets/icons/flags/flags.min.css')}}" media="all">

    <!-- altair admin -->
    <link rel="stylesheet" href="{{ URL::to('public/assets/css/main.min.css')}}" media="all">

    <!-- themes -->
    <link rel="stylesheet" href="{{ URL::to('public/assets/css/themes/themes_combined.min.css')}}" media="all">

    <!-- UIKit CSS -->
    <link id="data-uikit-theme" rel="stylesheet" href="{{ URL::to('public/uikit/uikit.docs.min.css') }}">
    <link rel="stylesheet" href="{{ URL::to('public/bower_components/uikit/css/uikit.almost-flat.min.css') }}"/>

    <!-- matchMedia polyfill for testing media queries in JS -->
    <!--[if lte IE 9]>
        <script type="text/javascript" src="bower_components/matchMedia/matchMedia.js"></script>
        <script type="text/javascript" src="bower_components/matchMedia/matchMedia.addListener.js"></script>
        <link rel="stylesheet" href="assets/css/ie.css" media="all">
    <![endif]-->

</head>
<body class="disable_transitions sidebar_main_open sidebar_main_swipe">
    <!-- main header -->
    <header id="header_main">
        <div class="header_main_content">
            <nav class="uk-navbar">
                                
                <!-- main sidebar switch -->
                <a href="#" id="sidebar_main_toggle" class="sSwitch sSwitch_left">
                    <span class="sSwitchIcon"></span>
                </a>
                
                <!-- secondary sidebar switch -->
                <a href="#" id="sidebar_secondary_toggle" class="sSwitch sSwitch_right sidebar_secondary_check">
                    <span class="sSwitchIcon"></span>
                </a>
                
                <div class="uk-navbar-flip">
                    <ul class="uk-navbar-nav user_actions">
                        <li><a href="#" id="full_screen_toggle" class="user_action_icon uk-visible-large"><i class="material-icons md-24 md-light">fullscreen</i></a></li>
                        <li style="margin-top: 15px;color:#fff;"><?php echo Session::get('admin_name'); ?></li>
                        <li data-uk-dropdown="{mode:'click',pos:'bottom-right'}" style="display: none;">
                            <a href="#" class="user_action_icon"><i class="material-icons md-24 md-light">&#xE7F4;</i><span class="uk-badge">16</span></a>
                            <div class="uk-dropdown uk-dropdown-xlarge">
                                <div class="md-card-content">
                                    <ul class="uk-tab uk-tab-grid" data-uk-tab="{connect:'#header_alerts',animation:'slide-horizontal'}">
                                        <li class="uk-width-1-2 uk-active"><a href="#" class="js-uk-prevent uk-text-small">Messages (12)</a></li>
                                        <li class="uk-width-1-2"><a href="#" class="js-uk-prevent uk-text-small">Alerts (4)</a></li>
                                    </ul>
                                    <ul id="header_alerts" class="uk-switcher uk-margin">
                                        <li>
                                            <ul class="md-list md-list-addon">
                                                <li>
                                                    <div class="md-list-addon-element">
                                                        <span class="md-user-letters md-bg-cyan">tz</span>
                                                    </div>
                                                    <div class="md-list-content">
                                                        <span class="md-list-heading"><a href="page_mailbox.html">At eum.</a></span>
                                                        <span class="uk-text-small uk-text-muted">A nostrum deleniti sit nihil cumque.</span>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="md-list-addon-element">
                                                        <img class="md-user-image md-list-addon-avatar" src="{{ URL::to('public/assets/img/avatars/avatar_07_tn.png')}}" alt=""/>
                                                    </div>
                                                    <div class="md-list-content">
                                                        <span class="md-list-heading"><a href="page_mailbox.html">Aliquid temporibus.</a></span>
                                                        <span class="uk-text-small uk-text-muted">Molestias in non expedita suscipit illum nam.</span>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="md-list-addon-element">
                                                        <span class="md-user-letters md-bg-light-green">cx</span>
                                                    </div>
                                                    <div class="md-list-content">
                                                        <span class="md-list-heading"><a href="page_mailbox.html">Non nisi asperiores.</a></span>
                                                        <span class="uk-text-small uk-text-muted">Nobis voluptatem nesciunt voluptates et ratione.</span>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="md-list-addon-element">
                                                        <img class="md-user-image md-list-addon-avatar" src="{{ URL::to('public/assets/img/avatars/avatar_02_tn.png')}}" alt=""/>
                                                    </div>
                                                    <div class="md-list-content">
                                                        <span class="md-list-heading"><a href="page_mailbox.html">Molestiae doloribus.</a></span>
                                                        <span class="uk-text-small uk-text-muted">Asperiores saepe velit sit est sed veniam.</span>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="md-list-addon-element">
                                                        <img class="md-user-image md-list-addon-avatar" src="{{ URL::to('public/assets/img/avatars/avatar_09_tn.png')}}" alt=""/>
                                                    </div>
                                                    <div class="md-list-content">
                                                        <span class="md-list-heading"><a href="page_mailbox.html">Explicabo animi.</a></span>
                                                        <span class="uk-text-small uk-text-muted">Fugit et rerum nihil cupiditate laudantium eligendi id delectus iste laudantium.</span>
                                                    </div>
                                                </li>
                                            </ul>
                                            <div class="uk-text-center uk-margin-top uk-margin-small-bottom">
                                                <a href="page_mailbox.html" class="md-btn md-btn-flat md-btn-flat-primary js-uk-prevent">Show All</a>
                                            </div>
                                        </li>
                                        <li>
                                            <ul class="md-list md-list-addon">
                                                <li>
                                                    <div class="md-list-addon-element">
                                                        <i class="md-list-addon-icon material-icons uk-text-warning">&#xE8B2;</i>
                                                    </div>
                                                    <div class="md-list-content">
                                                        <span class="md-list-heading">Itaque enim repudiandae.</span>
                                                        <span class="uk-text-small uk-text-muted uk-text-truncate">Eveniet sed voluptas beatae distinctio amet est quod.</span>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="md-list-addon-element">
                                                        <i class="md-list-addon-icon material-icons uk-text-success">&#xE88F;</i>
                                                    </div>
                                                    <div class="md-list-content">
                                                        <span class="md-list-heading">Aliquid placeat recusandae.</span>
                                                        <span class="uk-text-small uk-text-muted uk-text-truncate">Maiores adipisci saepe neque voluptatem.</span>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="md-list-addon-element">
                                                        <i class="md-list-addon-icon material-icons uk-text-danger">&#xE001;</i>
                                                    </div>
                                                    <div class="md-list-content">
                                                        <span class="md-list-heading">Ut autem magni.</span>
                                                        <span class="uk-text-small uk-text-muted uk-text-truncate">Dignissimos molestiae qui itaque quod saepe.</span>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="md-list-addon-element">
                                                        <i class="md-list-addon-icon material-icons uk-text-primary">&#xE8FD;</i>
                                                    </div>
                                                    <div class="md-list-content">
                                                        <span class="md-list-heading">Corrupti qui est.</span>
                                                        <span class="uk-text-small uk-text-muted uk-text-truncate">Sit accusantium mollitia eum dignissimos quae doloribus sit.</span>
                                                    </div>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </li>
                        <li data-uk-dropdown="{mode:'click',pos:'bottom-right'}">
                            <a href="#" class="user_action_image">
                            <?php if(Session::get('photo') == ''){ ?>
                            <img class="md-user-image" src="{{ URL::to('public/images/user/avatar.jpg')}}" alt=""/>
                            <?php }else{ ?>
                            <img class="md-user-image" src="{{ URL::to('public/images/user')}}/{{ Session::get('photo') }}" alt=""/></a>
                            <?php } ?>
                            <div class="uk-dropdown uk-dropdown-small">
                                <ul class="uk-nav js-uk-prevent">
                                    <!-- <li><a href="{{URL::to('updateProfile')}}">My Profile</a></li> -->
                                    <li><a href="{{URL::to('changePassword')}}">Change Password</a></li>
                                    <li><a href="{{URL::to('adminLogout')}}">LogOut</a></li>
                                </ul>
                            </div>
                        </li>
                        <li style="margin-top: 15px;color:#fff;cursor: pointer;" data-uk-dropdown="{mode:'click',pos:'bottom-right'}"><i class="fa fa-angle-down" aria-hidden="true"></i>
                        <div class="uk-dropdown uk-dropdown-small">
                            <ul class="uk-nav js-uk-prevent">
                                <li><a href="{{URL::to('userProfileUpdate')}}">My Profile</a></li>
                                <li><a href="{{URL::to('userChangePassword')}}">Change Password</a></li>
                                <li><a href="{{URL::to('userLogout')}}">LogOut</a></li>
                            </ul>
                        </div>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
        
    </header><!-- main header end -->
    <!-- main sidebar -->
    <aside id="sidebar_main">
        
        <div class="sidebar_main_header">
            <div class="sidebar_logo">
                <h3 style="padding: 20px;color:#000;margin-left:12px;font-size: 25px;font-weight: bolder;font-family: tahoma;">Smart Typing</h3>
            </div>
            <div class="sidebar_actions" style="display: none;">
                <select id="lang_switcher" name="lang_switcher">
                    <option value="gb" selected>English</option>
                </select>
            </div>
        </div>
        
        <div class="menu_section">
            <ul>

                <li class="current_section" title="Dashboard">
                    <a href="{{ URL::to('adminDashboard') }}">
                        <span class="menu_icon"><i class="material-icons">&#xE871;</i></span>
                        <span class="menu_title">Dashboard</span>
                    </a>
                    
                </li>

                <li title="Mailbox" style="display:none;">
                    <a href="page_mailbox.html">
                        <span class="menu_icon"><i class="material-icons">&#xE158;</i></span>
                        <span class="menu_title">Mailbox</span>
                    </a>
                </li>

                <li title="Invoices" style="display:none;">
                    <a href="{{ URL::to('adminDashboard') }}">
                        <span class="menu_icon"><i class="material-icons">&#xE53E;</i></span>
                        <span class="menu_title">Invoices</span>
                    </a>
                </li>

                <li title="Chats">
                    <a href="#">
                        <span class="menu_icon"><i class="material-icons">&#xE871;</i></span>
                        <span class="menu_title">User</span>
                    </a>
                    <ul>
                        <li><a href="{{ URL::to('unapprovedUser') }}">Unapproved User</a></li>
                        <li><a href="{{ URL::to('approvedUser') }}">Approved User</a></li>
                        <li><a href="{{ URL::to('rejectUserlist') }}">Reject User</a></li>
                    </ul>
                </li>

                <li title="Chats">
                    <a href="#">
                        <span class="menu_icon"><i class="material-icons">&#xE871;</i></span>
                        <span class="menu_title">Paragraph</span>
                    </a>
                    <ul>
                        <li><a href="{{ URL::to('addParagraph') }}">Add Paragraph</a></li>
                        <li><a href="{{ URL::to('manageParagraph') }}">Manage Paragraph</a></li>
                    </ul>
                </li>

                <li title="Chats">
                    <a href="#">
                        <span class="menu_icon"><i class="material-icons">&#xE871;</i></span>
                        <span class="menu_title">Session</span>
                    </a>
                    <ul>
                        <li><a href="{{ URL::to('addStep') }}">Add Session</a></li>
                        <li><a href="{{ URL::to('manageStep') }}">Manage Session</a></li>
                    </ul>
                </li>

                <li title="Chats">
                    <a href="#">
                        <span class="menu_icon"><i class="material-icons">&#xE871;</i></span>
                        <span class="menu_title">Exam Fee</span>
                    </a>
                    <ul>
                        <li><a href="{{ URL::to('unapprovedExamFee') }}">Unapproved Exam Fee</a></li>
                        <li><a href="{{ URL::to('approvedExamFee') }}">Approved Exam Fee</a></li>
                        <li><a href="{{ URL::to('rejectedExamFee') }}">Rejected Exam Fee</a></li>
                    </ul>
                </li>

                <li title="Chats">
                    <a href="#">
                        <span class="menu_icon"><i class="material-icons">&#xE871;</i></span>
                        <span class="menu_title">Slider</span>
                    </a>
                    <ul>
                        <li><a href="{{ URL::to('addSlider') }}">Add Slider</a></li>
                        <li><a href="{{ URL::to('manageSlider') }}">Manage Slider</a></li>
                    </ul>
                </li>

                <li title="Chats">
                    <a href="#">
                        <span class="menu_icon"><i class="material-icons">&#xE871;</i></span>
                        <span class="menu_title">Group</span>
                    </a>
                    <ul>
                        <li><a href="{{ URL::to('addGroup') }}">Add Group</a></li>
                        <li><a href="{{ URL::to('manageGroup') }}">Manage Group</a></li>
                    </ul>
                </li>

                <li title="Chats">
                    <a href="#">
                        <span class="menu_icon"><i class="material-icons">&#xE871;</i></span>
                        <span class="menu_title">Contact</span>
                    </a>
                    <ul>
                        <li><a href="{{ URL::to('addContact') }}">Add Contact</a></li>
                        <li><a href="{{ URL::to('manageContact') }}">Manage Contact</a></li>
                    </ul>
                </li>

                <li title="Chats">
                    <a href="#">
                        <span class="menu_icon"><i class="material-icons">&#xE871;</i></span>
                        <span class="menu_title">Settings</span>
                    </a>
                    <ul>
                        <li><a href="{{ URL::to('changeExamFee') }}">Change Registration Fee</a></li>
                    </ul>
                </li>

                <li title="Invoices">
                    <a href="{{ URL::to('allSessions') }}">
                        <span class="menu_icon"><i class="material-icons">&#xE53E;</i></span>
                        <span class="menu_title">Report</span>
                    </a>
                </li>

            </ul>
        </div>
    </aside><!-- main sidebar end -->

    @yield('content')

    <!-- google web fonts -->
    <script>
        WebFontConfig = {
            google: {
                families: [
                    'Source+Code+Pro:400,700:latin',
                    'Roboto:400,300,500,700,400italic:latin'
                ]
            }
        };
        (function() {
            var wf = document.createElement('script');
            wf.src = ('https:' == document.location.protocol ? 'https' : 'http') +
            '://ajax.googleapis.com/ajax/libs/webfont/1/webfont.js';
            wf.type = 'text/javascript';
            wf.async = 'true';
            var s = document.getElementsByTagName('script')[0];
            s.parentNode.insertBefore(wf, s);
        })();
    </script>

    <!-- common functions -->
    <script src="{{ URL::to('public/assets/js/common.min.js')}}"></script>
    <!-- uikit functions -->
    <script src="{{ URL::to('public/assets/js/uikit_custom.min.js')}}"></script>
    <!-- altair common functions/helpers -->
    <script src="{{ URL::to('public/assets/js/altair_admin_common.min.js')}}"></script>

    <!-- page specific plugins -->
        <!-- d3 -->
        <script src="{{ URL::to('public/bower_components/d3/d3.min.js')}}"></script>
        <!-- metrics graphics (charts) -->
        <script src="{{ URL::to('public/bower_components/metrics-graphics/dist/metricsgraphics.min.js')}}"></script>
        <!-- chartist (charts) -->
        <script src="{{ URL::to('public/bower_components/chartist/dist/chartist.min.js')}}"></script>
        <!-- maplace (google maps) -->
        <script src="https://maps.google.com/maps/api/js?key=AIzaSyC2FodI8g-iCz1KHRFE7_4r8MFLA7Zbyhk"></script>
        <script src="{{ URL::to('public/bower_components/maplace-js/dist/maplace.min.js')}}"></script>
        <!-- peity (small charts) -->
        <script src="{{ URL::to('public/bower_components/peity/jquery.peity.min.js')}}"></script>
        <!-- easy-pie-chart (circular statistics) -->
        <script src="{{ URL::to('public/bower_components/jquery.easy-pie-chart/dist/jquery.easypiechart.min.js')}}"></script>
        <!-- countUp -->
        <script src="{{ URL::to('public/bower_components/countUp.js/dist/countUp.min.js')}}"></script>
        <!-- handlebars.js -->
        <script src="{{ URL::to('public/bower_components/handlebars/handlebars.min.js')}}"></script>
        <script src="{{ URL::to('public/assets/js/custom/handlebars_helpers.min.js')}}"></script>
        <!-- CLNDR -->
        <script src="{{ URL::to('public/bower_components/clndr/clndr.min.js')}}"></script>

        <!--  dashbord functions -->
        <script src="{{ URL::to('public/assets/js/pages/dashboard.min.js')}}"></script>

        <!-- datatables -->
        <script src="{{ URL::to('public/bower_components/datatables/media/js/jquery.dataTables.min.js')}}"></script>
        <!-- datatables colVis-->
        <script src="{{ URL::to('public/bower_components/datatables/dataTables.colVis.js')}}"></script>
        <!-- datatables tableTools-->
        <script src="{{ URL::to('public/bower_components/datatables/dataTables.tableTools.js')}}"></script>
        <!-- datatables custom integration -->
        <script src="{{ URL::to('public/assets/js/custom/datatables/datatables.uikit.min.js')}}"></script>
        <!-- datatables functions -->
        <script src="{{ URL::to('public/assets/js/pages/plugins_datatables.min.js')}}"></script>
        
        <script src="{{ URL::to('public/assets/js/pages/page_sticky_notes.min.js') }}"></script>

        <!-- UIKit Javascript -->
        <script src="{{ URL::to('public/uikit/uikit.min.js') }}"></script>
        <script src="{{ URL::to('public/uikit/notify.js') }}"></script>

        <!-- Tiny MCE -->
        <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>

        <script>
      tinymce.init({
        selector: '#mytextarea'
      });
    </script>


    <script>
        $(function() {
            if(isHighDensity()) {
                $.getScript( "{{ URL::to('public/assets/js/custom/dense.min.js')}}", function(data) {
                    // enable hires images
                    altair_helpers.retina_images();
                });
            }
            if(Modernizr.touch) {
                // fastClick (touch devices)
                FastClick.attach(document.body);
            }
        });
        $window.load(function() {
            // ie fixes
            altair_helpers.ie_fix();
        });
    </script>

    <script>
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
                (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
            m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','../www.google-analytics.com/analytics.js','ga');
        ga('create', 'UA-65191727-1', 'auto');
        ga('send', 'pageview');
    </script>
    @yield ('js')
</body>
</html>