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
                <p class="administrator-sidebar-title">navigasi</p>
                <ul class="administrator-sidebar-lists">
                    <li class="administrator-sidebar-list"><a class="administrator-sidebar-link" href="{{ route ('DashAdmin') }}">beranda</a></li>
                    <li class="administrator-sidebar-list"><a class="administrator-sidebar-link" href="{{ route ('Regisaccount') }}">registrasi akun</a></li>
                    <li class="administrator-sidebar-list"><a class="administrator-sidebar-link" href="{{ route('Dataview') }}">lihat data</a></li>
                    <li class="administrator-sidebar-list"><a class="administrator-sidebar-link" href="" id="logout">keluar</a></li>
                </ul>
            </div>
            <div class="administrator-dashboard-content">
                <div class="dashboard-name-wrapper">
                    <p class="dashboard-name">Edit Pengguna</p>
                </div>

                @if (session('success'))
                <div id="popup-message" class="popup-success">
                    {{ session('success') }}
                </div>
                @endif

                <!-- Form Edit -->
                <form class="form" action="{{ route('updateaccount', $user->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <p class="input-title">nama pengguna</p>
                    <div class="input-textbox">
                        <input id="username" name="username" class="input-value" type="text" value="{{ $user->username }}" placeholder="Masukkan nama pengguna...">
                    </div>
                    <p class="input-title">nama depan</p>
                    <div class="input-textbox">
                        <input id="first_name" name="first_name" class="input-value" type="text" value="{{ $user->first_name }}" placeholder="Masukkan nama depan...">
                    </div>
                    <p class="input-title">nama belakang</p>
                    <div class="input-textbox">
                        <input id="last_name" name="last_name" class="input-value" type="text" value="{{ $user->last_name }}" placeholder="Masukkan nama belakang...">
                    </div>
                    <p class="input-title">email</p>
                    <div class="input-textbox">
                        <input id="email" name="email" class="input-value" type="text" value="{{ $user->email }}" placeholder="Masukkan email...">
                    </div>
                    
                    <!-- Dropdown untuk memilih Role -->
                    <p class="input-title">role</p>
                    <div class="input-textbox">
                        <select id="role" name="role" class="input-value">
                            <option value="student" {{ $user->role == 'student' ? 'selected' : '' }}>Mahasiswa</option>
                            <option value="lecturer" {{ $user->role == 'lecturer' ? 'selected' : '' }}>Dosen</option>
                        </select>
                    </div>

                    <!-- Gelar, hanya jika role adalah lecturer -->
                    <p class="input-title">gelar</p>
                    <div class="input-textbox">
                        <input id="degree" name="degree" class="input-value" type="text" value="{{ $user->degree }}" placeholder="Masukkan gelar jika dosen...">
                    </div>

                    <h3 class="text-lg font-medium text-gray-900 mb-4">Ubah Password (Opsional)</h3>

                    <div class="mb-4">
                        <label for="current_password" class="block text-gray-700 font-medium">Password Lama</label>
                        <input type="password" name="current_password" id="current_password" 
                            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-200">
                        @error('current_password')
                        <span class="text-red-600 text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                
                    <div class="mb-4">
                        <label for="new_password" class="block text-gray-700 font-medium">Password Baru</label>
                        <input type="password" name="new_password" id="new_password" 
                            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-200">
                        @error('new_password')
                        <span class="text-red-600 text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                
                    <div class="mb-4">
                        <label for="new_password_confirmation" class="block text-gray-700 font-medium">Konfirmasi Password Baru</label>
                        <input type="password" name="new_password_confirmation" id="new_password_confirmation" 
                            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-200">
                    </div>
                

                    <button class="button-submit" type="submit">perbarui</button>
                </form>
            </div>
        </div>
    </div>

    <x-global.footer></x-global.footer>
</body>
</html>
