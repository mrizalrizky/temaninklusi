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
    <x-toast id="alert-save" sessionName="action-success" bgColor="rgb(110 231 183)" class="alert-save alert-success"/>
    <x-toast id="alert-delete" sessionName="action-failed" bgColor="rgb(253 164 175)" class="alert-delete alert-danger"/>
</body>

<script>
    feather.replace()

    if (document.getElementById('alert-save'))
        setTimeout(() => {
            document.getElementById('alert-save').classList.remove('active')
        }, 4000);

    if (document.getElementById('alert-delete'))
        setTimeout(() => {
            document.getElementById('alert-delete').classList.remove('active')
        }, 4000);
</script>

</html>
