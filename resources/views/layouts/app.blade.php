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
    @if (session()->has('action-success'))
            <div class="container-sm alert-save active alert alert-success mw-md-75 mw-xl-50 d-flex align-items-center gap-3"
                style="width: 80%; background-color: rgb(110 231 183);" role="alert" id="alert-save">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                    class="bi bi-check-circle-fill" viewBox="0 0 16 16">
                    <path
                        d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                </svg>
                <div class="fw-bold">
                    {{ session()->get('action-success') }}
                </div>
            </div>
    @endif


    @if (session()->has('action-failed'))
            <div class="container-sm alert-delete active alert alert-danger mw-md-75 mw-xl-50 d-flex align-items-center gap-3"
                style="width: 80%; background-color: rgb(253 164 175);" role="alert" id="alert-delete">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                    class="bi bi-check-circle-fill" viewBox="0 0 16 16">
                    <path
                        d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                </svg>
                <div class="fw-bold">
                    {{ session()->get('action-failed') }}
                </div>
            </div>
    @endif
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
