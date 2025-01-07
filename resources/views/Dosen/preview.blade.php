<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Dosen</title>
    <style>
        /* General Styling */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            display: flex;
            height: 100vh;
            background-color: #f7f7f7;
        }

        .dashboard-container {
            display: flex;
            width: 100%;
        }

        /* Sidebar Styling */
        .sidebar {
            width: 15%;
            background-color: #1e3a8a;
            color: white;
            display: flex;
            flex-direction: column;
            align-items: center;
            padding-top: 1rem;
        }

        .sidebar-header {
            text-align: center;
            margin-bottom: 1rem;
        }

        .sidebar-header h1 {
            font-size: 1.5rem;
            margin: 0;
        }

        .sidebar-header h2 {
            font-size: 1rem;
            margin: 0;
            color: #cbd5e1;
        }

        .sidebar-menu ul {
            list-style: none;
            padding: 0;
            margin: 0;
            width: 100%;
        }

        .sidebar-menu li {
            margin: 0.5rem 0;
        }

        .sidebar-menu a {
            display: block;
            padding: 0.75rem;
            color: white;
            text-align: center;
            text-decoration: none;
            transition: background-color 0.3s;
        }

        .sidebar-menu a:hover {
            background-color: #2563eb;
        }

        /* Logout Styling */
        .logout {
            margin-top: auto;
            padding: 1rem;
            width: 100%;
            text-align: center;
            background-color: #ef4444;
            color: white;
            text-decoration: none;
            font-weight: bold;
            border-top: 1px solid #cbd5e1;
            transition: background-color 0.3s;
        }

        .logout:hover {
            background-color: #dc2626;
        }

        /* Main Content Styling */
        .main-content {
            flex: 1;
            padding: 2rem;
            background-color: #ffffff;
            overflow-y: auto;
        }

        .main-content h2 {
            font-size: 2rem;
            color: #1e40af;
            margin-bottom: 1rem;
        }

        .main-content p {
            font-size: 1rem;
            color: #333333;
        }
    </style>
</head>
<body>
    <div class="dashboard-container">
        <!-- Sidebar -->
        <aside class="sidebar">
            <div class="sidebar-header">
                <h1>Dashboard</h1>
                <h2>Dosen</h2>
            </div>
            <nav class="sidebar-menu">
                <ul>
                    <li><a href="{{ route('dosdash') }}">Home</a></li>
                    <li><a href="{{ route('quizdos') }}">Create Quiz</a></li>
                    <li><a href="{{ route('materidos') }}">Create Materi</a></li>
                    <li><a href="{{ route('reviewidos') }}">Preview</a></li>
                </ul>
            </nav>
            <div class="logout-button" style="margin-top: auto; width: 100%; padding: 1rem 0; text-align: center;">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" style="background-color: #e11d48; color: white; padding: 0.75rem 1.5rem; border: none; border-radius: 0.25rem; font-size: 1rem; cursor: pointer; transition: background-color 0.3s; width: 80%;">
                        Logout
                    </button>
                </form>
            </div>
        </aside>

        <!-- Main Content -->
        <main class="main-content">
            <section id="preview">
                <h2>Preview</h2>
                <p>Di sini Anda dapat melihat preview quiz atau materi yang telah dibuat.</p>
            </section>
        </main>
    </div>
</body>
</html>
