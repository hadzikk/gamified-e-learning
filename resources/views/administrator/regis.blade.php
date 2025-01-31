<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Beranda</title>
    <link rel="stylesheet" href="{{ asset('css/administrator/student.scss') }}">
    <link rel="stylesheet" href="{{ asset('css/components/global/footer.scss') }}">

    <style>
        .popup-success {
    position: fixed;
    top: 20px;
    right: 20px;
    background-color: #4CAF50; /* Warna hijau */
    color: white;
    padding: 10px 20px;
    border-radius: 5px;
    box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
    z-index: 1000;
    font-size: 14px;
    display: none; /* Default disembunyikan */
    }
    </style>
</head>
<body>
    <div class="administrator-dashboard-container">
        <div class="administrator-dashboard-wrapper">
            <div class="administrator-dashboard-sidebar">
                <p class="administrator-sidebar-title">navigasi</p>
                <ul class="administrator-sidebar-lists">
                    <li class="administrator-sidebar-list"><a class="administrator-sidebar-link" href="{{ route ('admin.index') }}">beranda</a></li>
                    <li class="administrator-sidebar-list"><a class="administrator-sidebar-link" href="{{ route ('admin.regis') }}">registrasi akun</a></li>
                    <li class="administrator-sidebar-list"><a class="administrator-sidebar-link" href="{{ route('admin.data') }}">lihat data</a></li>
                    <li class="administrator-sidebar-list">
                        <form action="/oa/account-security/logout" method="POST">
                            @csrf
                            <button type="submit" class="administrator-sidebar-link" style="background: none; border: none; color: inherit; cursor: pointer;">
                                Keluar
                            </button>
                        </form>
                    </li>
                </ul>
            </div>
            <div class="administrator-dashboard-content">
                <div class="dashboard-name-wrapper">
                    <p class="dashboard-name">registrasi pengguna</p>
                </div>

                @if (session('success'))
                <div id="popup-message" class="popup-success">
                {{ session('success') }}
                </div>
                @endif

                <form class="form" action="{{ route('admin.submit') }}" method="POST">
                    @csrf
                    <p class="input-title">nama pengguna</p>
                    <div class="input-textbox">
                        <input id="username" name="username" class="input-value" type="text" placeholder="Masukkan nama pengguna...">
                    </div>
                    <p class="input-title">nama depan</p>
                    <div class="input-textbox">
                        <input id="first_name" name="first_name" class="input-value" type="text" placeholder="Masukkan nama depan...">
                    </div>
                    <p class="input-title">nama belakang</p>
                    <div class="input-textbox">
                        <input id="last_name" name="last_name" class="input-value" type="text" placeholder="Masukkan nama belakang...">
                    </div>
                    <p class="input-title">email</p>
                    <div class="input-textbox">
                        <input id="email" name="email" class="input-value" type="text" placeholder="Masukkan email...">
                    </div>
                    <p class="input-title">password</p>
                    <div class="input-textbox">
                        <input id="password" name="password" class="input-value" type="password" placeholder="Masukkan kata sandi...">
                    </div>

                    <!-- Dropdown untuk memilih Role (Student atau Lecturer) -->
                    <p class="input-title">role</p>
                    <div class="input-textbox">
                        <select id="role" name="role" class="input-value">
                            <option value="student">Mahasiswa</option>
                            <option value="lecturer">Dosen</option>
                        </select>
                    </div>

                    <!-- Gelar, hanya diperlukan jika memilih role "lecturer" -->
                    <p class="input-title">gelar </p>
                    <div class="input-textbox">
                        <input id="degree" name="degree" class="input-value" type="text" placeholder="Masukkan gelar jika dosen...">
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

    <script src="{{ asset('js/event.js') }}">
    </script>
</body>
</html>
