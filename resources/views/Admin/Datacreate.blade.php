<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Data - Admin Dashboard</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            background-color: #f3f4f6; /* bg-gray-100 */
            height: 100vh; /* h-screen */
            display: flex;
        }

        .sidebar {
            position: fixed; /* Menetapkan posisi tetap */
            top: 0;
            left: 0;
            bottom: 0;
            width: 11rem; /* w-64 */
            background-color: #2563eb; /* bg-blue-600 */
            color: white; /* text-white */
            padding: 1.5rem; /* p-6 */
            display: flex;
            flex-direction: column;
            justify-content: space-between; /* Mengatur tombol logout di bawah */
        }

        .sidebar h2 {
            font-size: 1.5rem; /* text-2xl */
            font-weight: bold; /* font-bold */
            margin-bottom: 1rem; /* mb-4 */
        }

        .sidebar ul {
            list-style: none;
            padding: 0;
        }

        .sidebar ul li {
            margin-bottom: 1rem; /* space-y-4 */
        }

        .sidebar ul li a {
            display: block;
            padding: 0.5rem 1rem; /* px-4 py-2 */
            border-radius: 0.375rem; /* rounded */
            background-color: transparent;
            color: white;
            text-decoration: none;
        }

        .sidebar ul li a:hover {
            background-color: #1d4ed8; /* hover:bg-blue-500 */
        }

        .logout-button {
            margin-top: auto; /* Memastikan tombol berada di bawah */
            padding: 0.5rem 1rem; /* px-4 py-2 */
            border-radius: 0.375rem; /* rounded */
            background-color: #ef4444; /* bg-red-500 */
            color: white;
            text-align: center;
            text-decoration: none;
            display: block;
            transition: background-color 0.3s;
        }

        .logout-button:hover {
            background-color: #dc2626; /* hover:bg-red-600 */
        }

        .main-content {
            margin-left: 16rem; /* Memberikan ruang untuk sidebar */
            padding: 2rem; /* p-8 */
            width: 100%;
            box-sizing: border-box;
        }

        .panel {
            background: #fff;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 500px;
            margin: auto;
        }

        .panel h2 {
            font-size: 2rem;
            font-weight: bold;
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            font-size: 1rem;
            color: #555;
            display: block;
            margin-bottom: 6px;
        }

        .form-group input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 1rem;
            box-sizing: border-box;
        }

        .form-group input:focus {
            border-color: #6366f1;
            outline: none;
            box-shadow: 0 0 4px rgba(99, 102, 241, 0.5);
        }

        .btn {
            display: block;
            width: 100%;
            padding: 12px;
            background-color: #6366f1;
            color: #fff;
            font-size: 1rem;
            font-weight: bold;
            text-align: center;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .btn:hover {
            background-color: #4f46e5;
        }

        .text-center {
            text-align: center;
            font-size: 0.9rem;
            color: #555;
            margin-top: 20px;
        }

        .text-center a {
            color: #6366f1;
            text-decoration: none;
            font-weight: bold;
        }

        .text-center a:hover {
            text-decoration: underline;
        }

        .checkbox-group {
            display: flex;
            gap: 20px; /* Memberikan jarak antar checkbox */
            align-items: center; /* Menyelaraskan elemen vertikal */
        }

        .checkbox-group label {
            display: flex;
            align-items: center;
            gap: 8px; /* Jarak antara kotak checkbox dan teks */
        }
    </style>
</head>
<body>
    <div class="sidebar">
        <div>
            <h2>Admin Panel</h2>
        <ul>
            <li><a href="{{ route('AdminDashboard') }}">Home</a></li>
            <li><a href="#">Create Data</a></li>
            <li><a href="{{ route('Dataview') }}">Data View</a></li>
        </ul>
        </div>
        <a href="{{ route('logout') }}" class="logout-button" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            Logout
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
    </div>

    @if (session('success'))
        <div class="bg-green-500 text-white p-4 rounded-lg mb-4">
            {{ session('success') }}
        </div>
    @endif
    
    <div class="main-content">
        <div class="panel">
            <h2>Create Data</h2>
            <form action="{{ route('store-data') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" name="username" id="username" placeholder="Enter your username" required>
                </div>
            
                <div class="form-row">
                    <div class="form-group">
                        <label for="first_name">First Name</label>
                        <input type="text" name="first_name" id="first_name" placeholder="Enter your first name" required>
                    </div>
                    <div class="form-group">
                        <label for="last_name">Last Name</label>
                        <input type="text" name="last_name" id="last_name" placeholder="Enter your last name" required>
                    </div>
                </div>
            
                <div class="form-group">
                    <label for="role">Role</label>
                    <div class="checkbox-group">
                        <label>
                            <input type="radio" name="role" value="Mahasiswa">
                            Mahasiswa
                        </label>
                        <label>
                            <input type="radio" name="role" value="Dosen">
                            Dosen
                        </label>
                    </div>
                </div>
                
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" placeholder="Enter your email" required>
                </div>
            
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" placeholder="Enter your password" required>
                </div>
            
                <button type="submit" class="btn">Create</button>
            </form>
        </div>

        @if (session('error'))
            <div class="bg-red-500 text-white p-4 rounded-lg mb-4">
                {{ session('error') }}
            </div>
        @endif

        <script>
            // Mendapatkan semua elemen checkbox
            const checkboxes = document.querySelectorAll('.role-checkbox');
        
            checkboxes.forEach(checkbox => {
                checkbox.addEventListener('change', () => {
                    if (checkbox.checked) {
                        // Jika satu checkbox di-check, uncheck semua checkbox lainnya
                        checkboxes.forEach(otherCheckbox => {
                            if (otherCheckbox !== checkbox) {
                                otherCheckbox.checked = false;
                            }
                        });
                    }
                });
            });
        </script>
    </div>
</body>
</html>
