<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<head>
    <meta charset="utf-8" />
    <title>403</title>
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
    <meta content="" name="description" />
    <meta content="" name="author" />

    <!-- ================== BEGIN BASE CSS STYLE ================== -->
    {{--<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />--}}
    <link rel="stylesheet" href="{{ asset('asset_admui/assets/plugins/google-fonts/fonts.googleapis.css') }}" />
    <link rel="stylesheet" href="{{ asset('asset_admui/assets/plugins/jquery-ui/jquery-ui.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('asset_admui/assets/plugins/bootstrap/4.0.0/css/bootstrap.min.css') }}" />
    {{--<link rel="stylesheet" href="{{ asset('asset_admui/assets/plugins/font-awesome/5.0/css/fontawesome-all.min.css') }}" />--}}
    <link rel="stylesheet" href="{{ asset('asset_admui/assets/plugins/font-awesome/5.3.1/css/all.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('asset_admui/assets/plugins/animate/animate.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('asset_admui/assets/css/default/style.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('asset_admui/assets/css/default/style-responsive.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('asset_admui/assets/css/default/theme/default.css') }}" id="theme" />
    <!-- ================== END BASE CSS STYLE ================== -->

    <!-- ================== BEGIN BASE JS ================== -->
    <script type="text/javascript" src="{{ asset('asset_admui/assets/plugins/pace/pace.min.js') }}"></script>
    <!-- ================== END BASE JS ================== -->
</head>
<body class="pace-top">
<!-- begin #page-loader -->
<div id="page-loader" class="fade show"><span class="spinner"></span></div>
<!-- end #page-loader -->

<!-- begin #page-container -->
<div id="page-container" class="fade">
    <!-- begin error -->
    <div class="error">
        <div class="error-code m-b-10">403</div>
        <div class="error-content">
            <div class="error-message">未经授权</div>
            <div class="error-desc m-b-30">
                您的请求不存在或者无权访问. <br />
                请及时联系管理员.
            </div>
            <div>
                <a href="{{ url('index') }}" class="btn btn-success p-l-20 p-r-20">返回首页</a>
            </div>
        </div>
    </div>
    <!-- end error -->

    <!-- begin theme-panel -->
    {{--<div class="theme-panel">--}}
        {{--<a href="javascript:;" data-click="theme-panel-expand" class="theme-collapse-btn"><i class="fa fa-cog"></i></a>--}}
        {{--<div class="theme-panel-content">--}}
            {{--<h5 class="m-t-0">Color Theme</h5>--}}
            {{--<ul class="theme-list clearfix">--}}
                {{--<li class="active"><a href="javascript:;" class="bg-green" data-theme="default" data-theme-file="../assets/css/default/theme/default.css" data-click="theme-selector" data-toggle="tooltip" data-trigger="hover" data-container="body" data-title="Default">&nbsp;</a></li>--}}
                {{--<li><a href="javascript:;" class="bg-red" data-theme="red" data-theme-file="../assets/css/default/theme/red.css" data-click="theme-selector" data-toggle="tooltip" data-trigger="hover" data-container="body" data-title="Red">&nbsp;</a></li>--}}
                {{--<li><a href="javascript:;" class="bg-blue" data-theme="blue" data-theme-file="../assets/css/default/theme/blue.css" data-click="theme-selector" data-toggle="tooltip" data-trigger="hover" data-container="body" data-title="Blue">&nbsp;</a></li>--}}
                {{--<li><a href="javascript:;" class="bg-purple" data-theme="purple" data-theme-file="../assets/css/default/theme/purple.css" data-click="theme-selector" data-toggle="tooltip" data-trigger="hover" data-container="body" data-title="Purple">&nbsp;</a></li>--}}
                {{--<li><a href="javascript:;" class="bg-orange" data-theme="orange" data-theme-file="../assets/css/default/theme/orange.css" data-click="theme-selector" data-toggle="tooltip" data-trigger="hover" data-container="body" data-title="Orange">&nbsp;</a></li>--}}
                {{--<li><a href="javascript:;" class="bg-black" data-theme="black" data-theme-file="../assets/css/default/theme/black.css" data-click="theme-selector" data-toggle="tooltip" data-trigger="hover" data-container="body" data-title="Black">&nbsp;</a></li>--}}
            {{--</ul>--}}
            {{--<div class="divider"></div>--}}
            {{--<div class="row m-t-10">--}}
                {{--<div class="col-md-5 control-label double-line">Header Styling</div>--}}
                {{--<div class="col-md-7">--}}
                    {{--<select name="header-styling" class="form-control form-control-sm">--}}
                        {{--<option value="1">default</option>--}}
                        {{--<option value="2">inverse</option>--}}
                    {{--</select>--}}
                {{--</div>--}}
            {{--</div>--}}
            {{--<div class="row m-t-10">--}}
                {{--<div class="col-md-5 control-label">Header</div>--}}
                {{--<div class="col-md-7">--}}
                    {{--<select name="header-fixed" class="form-control form-control-sm">--}}
                        {{--<option value="1">fixed</option>--}}
                        {{--<option value="2">default</option>--}}
                    {{--</select>--}}
                {{--</div>--}}
            {{--</div>--}}
            {{--<div class="row m-t-10">--}}
                {{--<div class="col-md-5 control-label double-line">Sidebar Styling</div>--}}
                {{--<div class="col-md-7">--}}
                    {{--<select name="sidebar-styling" class="form-control form-control-sm">--}}
                        {{--<option value="1">default</option>--}}
                        {{--<option value="2">grid</option>--}}
                    {{--</select>--}}
                {{--</div>--}}
            {{--</div>--}}
            {{--<div class="row m-t-10">--}}
                {{--<div class="col-md-5 control-label">Sidebar</div>--}}
                {{--<div class="col-md-7">--}}
                    {{--<select name="sidebar-fixed" class="form-control form-control-sm">--}}
                        {{--<option value="1">fixed</option>--}}
                        {{--<option value="2">default</option>--}}
                    {{--</select>--}}
                {{--</div>--}}
            {{--</div>--}}
            {{--<div class="row m-t-10">--}}
                {{--<div class="col-md-5 control-label double-line">Sidebar Gradient</div>--}}
                {{--<div class="col-md-7">--}}
                    {{--<select name="content-gradient" class="form-control form-control-sm">--}}
                        {{--<option value="1">disabled</option>--}}
                        {{--<option value="2">enabled</option>--}}
                    {{--</select>--}}
                {{--</div>--}}
            {{--</div>--}}
            {{--<div class="row m-t-10">--}}
                {{--<div class="col-md-5 control-label double-line">Content Styling</div>--}}
                {{--<div class="col-md-7">--}}
                    {{--<select name="content-styling" class="form-control form-control-sm">--}}
                        {{--<option value="1">default</option>--}}
                        {{--<option value="2">black</option>--}}
                    {{--</select>--}}
                {{--</div>--}}
            {{--</div>--}}
            {{--<div class="row m-t-10">--}}
                {{--<div class="col-md-12">--}}
                    {{--<a href="javascript:;" class="btn btn-inverse btn-block btn-sm" data-click="reset-local-storage">Reset Local Storage</a>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
    <!-- end theme-panel -->

    <!-- begin scroll to top btn -->
    <a href="javascript:;" class="btn btn-icon btn-circle btn-success btn-scroll-to-top fade" data-click="scroll-top"><i class="fa fa-angle-up"></i></a>
    <!-- end scroll to top btn -->
</div>
<!-- end page container -->

<!-- ================== BEGIN BASE JS ================== -->
<script type="text/javascript" src="{{ asset('asset_admui/assets/plugins/jquery/jquery-3.2.1.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('asset_admui/assets/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('asset_admui/assets/plugins/bootstrap/4.0.0/js/bootstrap.bundle.min.js') }}"></script>
<!--[if lt IE 9]>
<script type="text/javascript" src="{{ asset('asset_admui/assets/crossbrowserjs/html5shiv.js') }}"></script>
<script type="text/javascript" src="{{ asset('asset_admui/assets/crossbrowserjs/respond.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('asset_admui/assets/crossbrowserjs/excanvas.min.js') }}"></script>
<![endif]-->
<script type="text/javascript" src="{{ asset('asset_admui/assets/plugins/slimscroll/jquery.slimscroll.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('asset_admui/assets/plugins/js-cookie/js.cookie.js') }}"></script>
<script type="text/javascript" src="{{ asset('asset_admui/assets/js/theme/default.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('asset_admui/assets/js/apps.min.js') }}"></script>
<!-- ================== END BASE JS ================== -->

<script>
    $(document).ready(function() {
        App.init();
    });
</script>
</body>
</html>