<!DOCTYPE html>
<html class="no-js" lang="zxx">

<head>
    @include('website.includes.meta')
    @include('website.includes.style')

</head>
<body>

    @include('website.includes.header')

    @yield('main_content')


    @include('website.includes.footer')


    @include('website.includes.script')
</body>

</html>
