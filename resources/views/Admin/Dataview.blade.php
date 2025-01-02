<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data View - Admin Dashboard</title>
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

        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
            font-size: 1rem;
            text-align: left;
        }

        table th, table td {
            padding: 10px;
            border: 1px solid #ddd;
        }

        table th {
            background-color: #2563eb; /* bg-blue-600 */
            color: white; /* text-white */
        }
    </style>
</head>
<body>
    <div class="sidebar">
        <div>
            <h2>Admin Panel</h2>
            <ul>
                <li><a href="{{ route('AdminDashboard') }}">Home</a></li>
                <li><a href="{{ route('Admincreate') }}">Create Data</a></li>
                <li><a href="#">Data View</a></li>
            </ul>
        </div>
        <a href="{{ route('logout') }}" class="logout-button" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            Logout
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
    </div>

    <div class="main-content">
        <h1>Data View</h1>
        <table>
            <thead>
                <tr>
                    <th>Username</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th>Role</th>
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
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" style="text-align: center;">No users found</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</body>
</html>
