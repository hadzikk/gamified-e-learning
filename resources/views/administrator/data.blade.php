<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Lihat Data</title>
    <link rel="stylesheet" href="{{ asset('css/administrator/student.scss') }}">
    <link rel="stylesheet" href="{{ asset('css/components/global/footer.scss') }}">

    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f4f4f4;
        }

        .popup-success {
            position: fixed;
            top: 20px;
            right: 20px;
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border-radius: 5px;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
            z-index: 1000;
            font-size: 14px;
            display: none;
        }
    </style>
</head>
<body>
    <div class="administrator-dashboard-container">
        <div class="administrator-dashboard-wrapper">
            <div class="administrator-dashboard-sidebar">
                <p class="administrator-sidebar-title">Navigasi</p>
                <ul class="administrator-sidebar-lists">
                    <li class="administrator-sidebar-list"><a class="administrator-sidebar-link" href="{{ route ('admin.index') }}">beranda</a></li>
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
                    <p class="dashboard-name">Data Pengguna</p>
                </div>

                @if (session('success'))
                <div id="popup-message" class="popup-success">
                    {{ session('success') }}
                </div>
                @endif

                <!-- Tabel Data -->
                <table>
                    <thead>
                        <tr>
                            <th>Username</th>
                            <th>Nama Depan</th>
                            <th>Nama Belakang</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Gelar</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($users as $user)
                            <tr>
                                <td>{{ $user->username }}</td>
                                <td>{{ $user->first_name }}</td>
                                <td>{{ $user->last_name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->role }}</td>
                                <td>{{ $user->degree }}</td>
                                <td>
                                    <a href="{{ route('admin.edit', $user->id) }}" class="edit-button">Edit</a>
                                    <form action="{{ route('admin.delete', $user->id) }}" method="POST" style="display: inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="delete-button" onclick="return confirm('Apakah Anda yakin ingin menghapus pengguna ini?')">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7">Tidak ada data pengguna.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <x-global.footer></x-global.footer>
</body>
<script>
    // Tampilkan popup pesan sukses
    document.addEventListener('DOMContentLoaded', function () {
        const popup = document.getElementById('popup-message');
        if (popup) {
            popup.style.display = 'block';

            // Hilangkan popup setelah 3 detik
            setTimeout(() => {
                popup.style.display = 'none';
            }, 3000);
        }
    });
</script>
</html>
