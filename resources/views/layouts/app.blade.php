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
        <div class="container-lg px-3 px-lg-4">
        @if (session()->has('success'))
            <div class="alert alert-success d-flex alert-dismissible fade show">
                <p class="m-0">{{ session()->get('success') }}</p>
                <button type="button" class="btn-close ms-auto" style="width: 1.2em !important"
                data-bs-dismiss="alert" aria-label="close"></button>
            </div>
        @endif

        @if (session()->has('failed'))
            <div class="alert alert-danger d-flex alert-dismissible fade show">
                <p class="m-0">{{ session()->get('failed') }}</p>
                <button type="button" class="btn-close ms-auto" style="width: 1.2em !important"
                        data-bs-dismiss="alert" aria-label="close"></button>
            </div>
        @endif
        </div>
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
