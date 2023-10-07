<!DOCTYPE html>
<html lang="en">

<head>
    @include('includes.meta')

    <title>@yield('title') | TemuInklusi</title>

    <link rel="apple-touch-icon" href="">
    <link rel="shortcut icon" href="" type="image/x-icon">
    <link rel="icon" href="image/favicon.ico" type="image/x-icon">

    @stack('before-style')
    @include('includes.style')
    @stack('after-style')

</head>

<body>
    <div class="screen">
        @include('includes.header')
        <main class="mb-5" style="max-width: 1920px;">
            @yield('content')
        </main>
        @include('includes.footer')

        @stack('before-script')

        @include('includes.script')
        @stack('after-script')
    </div>

</body>

<script>
    feather.replace()
</script>

</html>
