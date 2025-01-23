<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Beranda</title>
    <link rel="stylesheet" href="{{ asset('css/lecturer/home.scss') }}">
    <link rel="stylesheet" href="{{ asset('css/components/global/footer.scss') }}">
</head>
<body>
    <div class="lecturer-dashboard-container">
        <div class="lecturer-dashboard-wrapper">
            <div class="lecturer-dashboard-sidebar">
                <p class="lecturer-sidebar-title">navigasi</p>
                <ul class="lecturer-sidebar-lists">
                    <li class="lecturer-sidebar-list"><a class="lecturer-sidebar-link" href="/lecturer/dashboard/create">buat postingan kuis</a></li>
                    <li class="lecturer-sidebar-list"><a class="lecturer-sidebar-link" href="" id="logout">keluar</a></li>
                </ul>
            </div>
            <div class="lecturer-dashboard-content">
                <div class="dashboard-name-wrapper">
                    <p class="dashboard-name">dashboard utama</p>
                </div>
                <div class="lecturer-greetings-wrapper">
                    <p class="lecturer-greetings-word">selamat datang, bapak / ibu</p>
                    <p class="lecturer-fullname">{{ Auth::user()->first_name." ".Auth::user()->last_name}}</p>
                    <p class="lecturer-degree">{{ Auth::user()->degree }}</p>
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