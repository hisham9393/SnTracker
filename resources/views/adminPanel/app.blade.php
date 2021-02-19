<!DOCTYPE html>
<html lang="en">

<head>
    @include('adminPanel.layouts.head')
</head>

<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
    @include('adminPanel.layouts.header')
    @include('adminPanel.layouts.sidebar')
    @include('adminPanel.layouts.topmenu')

    @section('main-content')
    @show
    @include('adminPanel.layouts.footer')
</body>

</html>