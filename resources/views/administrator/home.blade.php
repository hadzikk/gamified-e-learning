<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Beranda</title>
    <link rel="stylesheet" href="{{ asset('css/administrator/home.scss') }}">
    <link rel="stylesheet" href="{{ asset('css/components/global/footer.scss') }}">
</head>
<body>
    <div class="administrator-dashboard-container">
        <div class="administrator-dashboard-wrapper">
            <div class="administrator-dashboard-sidebar">
                <p class="administrator-sidebar-title">navigasi</p>
                <ul class="administrator-sidebar-lists">
                    <li class="administrator-sidebar-list"><a class="administrator-sidebar-link" href="{{ route('admin.index') }}">beranda</a></li>
                    <li class="administrator-sidebar-list"><a class="administrator-sidebar-link" href="{{ route('admin.regis') }}">registrasi account</a></li>
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
                    <p class="dashboard-name">dashboard utama</p>
                </div>
                <div class="administrator-greetings-wrapper">
                    <p class="administrator-greetings-word">selamat datang, bapak / ibu</p>
                    <p class="administrator-fullname">{{ Auth::user()->first_name." ".Auth::user()->last_name}}</p>
                    <p class="administrator-degree">{{ Auth::user()->degree }}</p>
                </div>
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