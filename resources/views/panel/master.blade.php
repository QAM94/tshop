<!DOCTYPE html>
<html lang="en">

@include('panel.includes.head')

<body>

@include('panel.includes.sidebar')

@yield('main')

@include('panel.includes.footer')

@include('panel.includes.scripts')

@stack('custom-scripts')

</body>

</html>
