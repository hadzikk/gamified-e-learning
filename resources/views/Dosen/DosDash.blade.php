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
        }

        /* Sidebar Styling */
        .sidebar {
            width: 25%;
            background-color: #1e3a8a;
            color: white;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .sidebar-header {
            text-align: center;
            padding: 1rem;
            border-bottom: 1px solid #3b82f6;
        }

        .sidebar-menu ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .sidebar-menu li {
            margin: 0;
        }

        .sidebar-menu a {
            display: block;
            padding: 1rem;
            color: white;
            text-decoration: none;
            transition: background-color 0.3s;
        }

        .sidebar-menu a:hover {
            background-color: #2563eb;
        }

        /* Main Content Styling */
        .main-content {
            flex: 1;
            padding: 2rem;
            background-color: #ffffff;
            overflow-y: auto;
        }

        .main-content section {
            margin-bottom: 2rem;
        }

        .main-content h2 {
            margin-bottom: 1rem;
            font-size: 1.5rem;
            color: #1e40af;
        }

        /* Form Styling */
        .form-group {
            margin-bottom: 1.5rem;
        }

        .form-group label {
            display: block;
            margin-bottom: 0.5rem;
            color: #333333;
        }

        .form-group input,
        .form-group textarea {
            width: 100%;
            padding: 0.5rem;
            border: 1px solid #d1d5db;
            border-radius: 0.375rem;
        }

        button {
            padding: 0.75rem 1.5rem;
            background-color: #2563eb;
            color: white;
            border: none;
            border-radius: 0.375rem;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color: #1e40af;
        }
    </style>
</head>
<body>
    <div class="dashboard-container">
        <!-- Sidebar -->
        <aside class="sidebar">
            <div class="sidebar-header">
                <h1>Dashboard Dosen</h1>
            </div>
            <nav class="sidebar-menu">
                <ul>
                    <li><a href="#home">Home</a></li>
                    <li><a href="#create-quiz">Create Quiz</a></li>
                    <li><a href="#create-materi">Create Materi</a></li>
                    <li><a href="#preview">Preview</a></li>
                </ul>
            </nav>
        </aside>

        <!-- Main Content -->
        <main class="main-content">
            <section id="home">
                <h2>Home</h2>
                <p>Selamat datang di dashboard dosen. Pilih menu di sebelah kiri untuk memulai.</p>
            </section>

            <section id="create-quiz">
                <h2>Create Quiz</h2>
                <form>
                    <div class="form-group">
                        <label>Judul Quiz:</label>
                        <input type="text" placeholder="Masukkan judul quiz">
                    </div>
                    <div class="form-group">
                        <label>Deskripsi:</label>
                        <textarea placeholder="Deskripsi singkat"></textarea>
                    </div>
                    <button type="submit">Simpan Quiz</button>
                </form>
            </section>

            <section id="create-materi">
                <h2>Create Materi</h2>
                <form>
                    <div class="form-group">
                        <label>Judul Materi:</label>
                        <input type="text" placeholder="Masukkan judul materi">
                    </div>
                    <div class="form-group">
                        <label>Upload File:</label>
                        <input type="file">
                    </div>
                    <button type="submit">Simpan Materi</button>
                </form>
            </section>

            <section id="preview">
                <h2>Preview</h2>
                <p>Di sini Anda dapat melihat preview quiz atau materi yang telah dibuat.</p>
            </section>
        </main>
    </div>
</body>
</html>
