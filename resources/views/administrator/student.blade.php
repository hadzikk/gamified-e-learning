<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Beranda</title>
    <link rel="stylesheet" href="{{ asset('css/administrator/student.scss') }}">
    <link rel="stylesheet" href="{{ asset('css/components/global/footer.scss') }}">
</head>
<body>
    <div class="administrator-dashboard-container">
        <div class="administrator-dashboard-wrapper">
            <div class="administrator-dashboard-sidebar">
                <p class="administrator-sidebar-title">navigasi</p>
                <ul class="administrator-sidebar-lists">
                    <li class="administrator-sidebar-list"><a class="administrator-sidebar-link" href="/administrator/dashboard/home">beranda</a></li>
                    <li class="administrator-sidebar-list"><a class="administrator-sidebar-link" href="/administrator/dashboard/registrating/student">registrasi mahasiswa</a></li>
                    <li class="administrator-sidebar-list"><a class="administrator-sidebar-link" href="/administrator/dashboard/registrating/lecturer">registrasi dosen</a></li>
                    <li class="administrator-sidebar-list"><a class="administrator-sidebar-link" href="/administrator/dashboard/data">lihat data</a></li>
                    <li class="administrator-sidebar-list"><a class="administrator-sidebar-link" href="" id="logout">keluar</a></li>
                </ul>
            </div>
            <div class="administrator-dashboard-content">
                <div class="dashboard-name-wrapper">
                    <p class="dashboard-name">registrasi mahasiswa</p>
                </div>
                <form class="form" action="/administrator/dashboard/registrating/student" method="post">
                    @csrf
                    <p class="input-title">nama pengguna</p>
                    <div class="input-textbox">
                        <input name="username" class="input-value" type="text" placeholder="Masukkan nama pengguna...">
                    </div>
                    <p class="input-title">nama depan</p>
                    <div class="input-textbox">
                        <input name="first_name" class="input-value" type="text" placeholder="Masukkan nama depan...">
                    </div>
                    <p class="input-title">nama belakang</p>
                    <div class="input-textbox">
                        <input name="last_name" class="input-value" type="text" placeholder="Masukkan nama belakang...">
                    </div>
                    <p class="input-title">email</p>
                    <div class="input-textbox">
                        <input name="email" class="input-value" type="text" placeholder="Masukkan email...">
                    </div>
                    <p class="input-title">password</p>
                    <div class="input-textbox">
                        <input name="password" class="input-value" type="password" placeholder="Masukkan kata sandi...">
                    </div>
                    <button class="button-submit" type="submit">daftarkan</button>
                </form>
                <div class="logout-wrapper">
                    <form action="/oa/account-security/logout" method="post">
                            @csrf
                        <button type="submit"></button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <x-global.footer></x-global.footer>

    <script src="{{ asset('js/event.js') }}"></script>
</body>
</html>