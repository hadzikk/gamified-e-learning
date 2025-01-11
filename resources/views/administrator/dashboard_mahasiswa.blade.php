<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard - Administrator</title>
    <link rel="stylesheet" href="{{ asset('icons/fontawesome-free-6.5.2-web/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/administrator/dashboard.scss') }}">
</head>
<body>
    <div class="dashboard-container">
        <x-administrator.sidebar></x-administrator.sidebar>
        <div class="--white-space"></div>
        <div class="dashboard-content">
            <div class="dashboard-content-navigation">
                <i class="fa-regular fa-circle-user"></i>
            </div>
            <div class="dashboard-content-table">
                <table cellpadding="0" cellspacing="0" class="dashboard-table">
                    <tr class="dashboard-table-row-header">
                        <th class="dashboard-table-header">nama pengguna</th>
                        <th class="dashboard-table-header">nama depan</th>
                        <th class="dashboard-table-header">nama belakang</th>
                        <th class="dashboard-table-header">email</th>
                        <th class="dashboard-table-header">skor</th>
                        <th class="dashboard-table-header">dibuat pada</th>
                        <th class="dashboard-table-header">diubah pada</th>
                    </tr>
                    @foreach ($users as $user)
                    <tr class="dashboard-table-row-data">
                        <td class="dashboard-table-data">{{ $user->username }}</td>
                        <td class="dashboard-table-data">{{ $user->first_name }}</td>
                        <td class="dashboard-table-data">{{ $user->last_name }}</td>
                        <td class="dashboard-table-data">{{ $user->email }}</td>
                        <td class="dashboard-table-data">{{ $user->score }}</td>
                        <td class="dashboard-table-data">{{ $user->created_at }}</td>
                        <td class="dashboard-table-data">{{ $user->updated_at }}</td>
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
</body>
</html>