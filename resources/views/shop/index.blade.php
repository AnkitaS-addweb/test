<!DOCTYPE html>
<html lang="en">

<head>
    @include('partials.head')
</head>


<body class="hold-transition skin-blue sidebar-mini">

<div id="app">
    <div id="wrapper">

    <event-hub></event-hub>
    <router-view></router-view>

    </div>
</div>
@include('partials.javascripts')
</body>
</html>
