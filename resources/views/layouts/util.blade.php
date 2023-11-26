<!DOCTYPE html>
<html lang="en">

<head>
    @include('includes.meta')

    <title>{{ $pageTitle }} - {{ config('app.name') }}</title>

    <link rel="apple-touch-icon" href="">
    <link rel="shortcut icon" href="" type="image/x-icon">
    <link rel="icon" href="image/favicon.ico" type="image/x-icon">

    @stack('before-style')
    @include('includes.style')
    @stack('after-style')

</head>

<body>
        @yield('content')
</body>

<script>
    feather.replace()
</script>

</html>
