<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Rumah Sakit - Admin</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-touch-fullscreen" content="yes">
    <meta name="description" content="Paper - Material Admin Theme">
    <meta name="author" content="KaijuThemes">

    <link rel="shortcut icon" href="{{ url('assets') }}/img/logo-icon-dark.png">

    <link type='text/css' href='https://fonts.googleapis.com/css?family=Roboto:300,400,400italic,500' rel='stylesheet'>
    <link href="{{ url('assets') }}/icons/material-icons.css" type="text/css" rel="stylesheet">

    <link href="{{ url('assets') }}/fonts/font-awesome/css/font-awesome.min.css" type="text/css" rel="stylesheet">        <!-- Font Awesome -->
    <link href="{{ url('assets') }}/css/styles.css" type="text/css" rel="stylesheet">                                     <!-- Core CSS with all styles -->

    <link href="{{ url('assets') }}/plugins/codeprettifier/prettify.css" type="text/css" rel="stylesheet">                <!-- Code Prettifier -->

    <link href="{{ url('assets') }}/plugins/dropdown.js/jquery.dropdown.css" type="text/css" rel="stylesheet">            <!-- iCheck -->
    <link href="{{ url('assets') }}/plugins/progress-skylo/skylo.css" type="text/css" rel="stylesheet">                   <!-- Skylo -->

    <!--[if lt IE 10]>
    <script src="{{ url('assets') }}/js/media.match.min.js"></script>
    <script src="{{ url('assets') }}/js/respond.min.js"></script>
    <script src="{{ url('assets') }}/js/placeholder.min.js"></script>
    <![endif]-->
    <!-- The following CSS are included as plugins and can be removed if unused-->

    @stack('plugin_css')

</head>

<body class="animated-content infobar-overlay">


<header id="topnav" class="navbar navbar-default navbar-fixed-top navbar-cyan" role="banner">
    <!-- <div id="page-progress-loader" class="show"></div> -->

    <div class="logo-area">
        <a class="navbar-brand navbar-brand-info " href="{{ url('admin') }}">
            <img class="show-on-collapse img-logo-white" alt="Paper" src="{{ url('assets') }}/img/logo-icon-white.png">
            <img class="show-on-collapse img-logo-dark" alt="Paper" src="{{ url('assets') }}/img/logo-icon-dark.png">
            <img class="img-white" alt="Paper" src="{{ url('assets') }}/images/logo.png">
            <img class="img-dark" alt="Paper" src="{{ url('assets') }}/images/logo.png">
        </a>

        <span id="trigger-sidebar" class="toolbar-trigger toolbar-icon-bg stay-on-search">
			<a data-toggle="tooltips" data-placement="right" title="Toggle Sidebar">
				<span class="icon-bg">
					<i class="material-icons">menu</i>
				</span>
			</a>
		</span>
    </div><!-- logo-area -->

    <ul class="nav navbar-nav toolbar pull-right">

        <li class="toolbar-icon-bg appear-on-search ov-h" id="trigger-search-close">
            <a class="toggle-fullscreen"><span class="icon-bg">
	        	<i class="material-icons">close</i>
	        </span></i></a>
        </li>
        <li class="toolbar-icon-bg hidden-xs" id="trigger-fullscreen">
            <a href="#" class="toggle-fullscreen"><span class="icon-bg">
	        	<i class="material-icons">fullscreen</i>
	        </span></i></a>
        </li>
    </ul>

</header>

<div id="wrapper">
    <div id="layout-static">
        <div class="static-sidebar-wrapper sidebar-cyan">
            <div class="static-sidebar">
                <div class="sidebar">
                    <div class="widget" id="widget-profileinfo">
                        <div class="widget-body">
                            <div class="userinfo ">
                                <div class="avatar pull-left">
                                    @if(Auth::user()->hospital->status == \App\Models\Hospital::STATUS_ACTIVE)
                                        <img src="{{ url('images/hospital/'.Auth::user()->hospital->image) }}" class="img-responsive img-circle">
                                    @else
                                        <img src="{{ url('assets') }}/demo/avatar/avatar_15.png" class="img-responsive img-circle">
                                    @endif
                                </div>
                                <div class="info">
                                    <span class="username">{{ Auth::user()->name }}</span>
                                    <span class="useremail">{{ Auth::user()->email }}</span>
                                </div>

                                <div class="acct-dropdown clearfix dropdown">
                                    <span class="pull-left"><span class="online-status online"></span>Online</span>
                                    <!-- <span class="pull-right dropdown-toggle" data-toggle="dropdown"><a href="javascript:void(0)" class="btn btn-fab-caret btn-xs btn-fab"><i class="material-icons">arrow_drop_down</i><div class="ripple-container"></div></a></span>
                                    <ul class="dropdown-menu">
                                        <li><span class="online-status online"></span> Online</li>
                                        <li><span class="online-status online"></span> Online</li>
                                        <li><span class="online-status online"></span> Online</li>
                                        <li><span class="online-status online"></span> Online</li>
                                    </ul> -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="widget stay-on-collapse" id="widget-sidebar">
                        <nav role="navigation" class="widget-body">
                            @if(Auth::user()->hospital->status != \App\Models\Hospital::STATUS_NOT_COMPLETE)
                            <ul class="acc-menu">
                                <li class="nav-separator"><span>Navigation</span></li>
                                <li><a  class="withripple" href="{{ url('hospital') }}"><span class="icon"><i class="material-icons">home</i></span><span>Dashboard</span></a></li>
                                <li><a  class="withripple" href="{{ route('hospital.room.manage') }}"><span class="icon"><i class="material-icons">account_balance_wallet</i></span><span>Room</span></a></li>
                                <li><a  class="withripple" href="{{ route('hospital.reservation.manage') }}"><span class="icon"><i class="material-icons">add_shopping_cart</i></span><span>Reservation</span></a></li>
                                <li><a  class="withripple" href="{{ route('hospital.report.manage') }}"><span class="icon"><i class="material-icons">add_shopping_cart</i></span><span>Report</span></a></li>
                                <li><a  class="withripple" href="{{ route('hospital.profile.index') }}"><span class="icon"><i class="material-icons">monetization_on</i></span><span>Profile</span></a></li>
                                <li>
                                    <a  class="withripple" href="{{ url('/logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                        <span class="icon"><i class="material-icons">reply</i></span>
                                        <span>Logout</span>
                                        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </a>
                                </li>
                            </ul>
                            @endif
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <div class="static-content-wrapper">
            <div class="static-content">
                @yield('content')
            </div>
            <footer role="contentinfo">
                <div class="clearfix">
                    <ul class="list-unstyled list-inline pull-left">
                        <li><h6 style="margin: 0;">Copyright © {{ date('Y') }}. All Rights Reserved</h6></li>
                    </ul>
                </div>
            </footer>

        </div>
    </div>
</div>

</div>
<script>
    window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
    ]); ?>
</script>
<!-- Load site level scripts -->

<!-- <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.9.2/jquery-ui.min.js"></script> -->

<script src="{{ url('assets') }}/js/jquery-1.10.2.min.js"></script> 							<!-- Load jQuery -->
<script src="{{ url('assets') }}/js/jqueryui-1.10.3.min.js"></script> 							<!-- Load jQueryUI -->
<script src="{{ url('assets') }}/js/bootstrap.min.js"></script> 								<!-- Load Bootstrap -->
<script src="{{ url('assets') }}/js/enquire.min.js"></script> 									<!-- Load Enquire -->

<script src="{{ url('assets') }}/plugins/velocityjs/velocity.min.js"></script>					<!-- Load Velocity for Animated Content -->
<script src="{{ url('assets') }}/plugins/velocityjs/velocity.ui.min.js"></script>

<script src="{{ url('assets') }}/plugins/progress-skylo/skylo.js"></script> 		<!-- Skylo -->

<script src="{{ url('assets') }}/plugins/wijets/wijets.js"></script>     						<!-- Wijet -->

<script src="{{ url('assets') }}/plugins/sparklines/jquery.sparklines.min.js"></script> 			 <!-- Sparkline -->

<script src="{{ url('assets') }}/plugins/codeprettifier/prettify.js"></script> 				<!-- Code Prettifier  -->

<script src="{{ url('assets') }}/plugins/bootstrap-tabdrop/js/bootstrap-tabdrop.js"></script>  <!-- Bootstrap Tabdrop -->

<script src="{{ url('assets') }}/plugins/nanoScroller/js/jquery.nanoscroller.min.js"></script> <!-- nano scroller -->

<script src="{{ url('assets') }}/plugins/dropdown.js/jquery.dropdown.js"></script> <!-- Fancy Dropdowns -->
<script src="{{ url('assets') }}/plugins/bootstrap-material-design/js/material.min.js"></script> <!-- Bootstrap Material -->
<script src="{{ url('assets') }}/plugins/bootstrap-material-design/js/ripples.min.js"></script> <!-- Bootstrap Material -->

<script src="{{ url('assets') }}/js/application.js"></script>
<script src="{{ url('assets') }}/demo/demo.js"></script>

<!-- End loading site level scripts -->

<!-- Load page level scripts-->
@stack('plugin_scripts')
<!-- End loading page level scripts-->


@stack('scripts')
</body>
</html>