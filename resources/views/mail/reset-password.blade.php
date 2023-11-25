@section('content')
    <div>
        <h3 class="text-center">{{ config('app.name') }}</h3>
        <h4>{{ config('app.name') }} reset password</h4>
        <br>
        <p>Kepada pengguna aplikasi,</p>
        <p>Kami mendapatkan request untuk melakukan reset pada password anda. Mohon untuk menekan link di bawah ini
            untuk menyelesaikan reset password anda.</p>
        <br>
        <p>
            <a href="{{ $urlReset }}"
                style="background-color: #01676c; padding: .8rem 1rem; border-radius: 5px; color: white; text-decoration: none"
                href="">Reset password</a>
        </p>
        <p style="margin-top: .5rem; font-weight: bold; font-size: .75rem; color: #6b7280">Note: Link berikut hanya dapat
            digunakan dalam 15 menit sebanyak 1 kali!</p>
        <br>
        <p>Jika kamu membutuhkan bantuan lebih lanjut, mohon silahkan menghubungi <a class="text-primary fw-bold"
                href="mailto:temuinklusi.id@gmail.com?subject=Help reset password">email kami!</a></p>
    </div>
    </div>
