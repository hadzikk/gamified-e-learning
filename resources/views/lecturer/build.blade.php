<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Build</title>
</head>
<body>
    <form action="{{ route('posts.store') }}" method="POST">
        @csrf
        <label for="user_id">User</label>
        <select name="user_id" id="user_id" required>
            @foreach ($users as $user)
                <option value="{{ $user->id }}">{{ $user->username }}</option>
            @endforeach
        </select>

        <label for="subject">Subject</label>
        <input type="text" name="subject" id="subject" required>

        <label for="title">Title</label>
        <input type="text" name="title" id="title" required>

        <label for="description">Description</label>
        <textarea name="description" id="description"></textarea>

        <label for="level">Level</label>
        <select name="level" id="level" required>
            <option value="basic">Basic</option>
            <option value="advance">Advance</option>
            <option value="proficient">Proficient</option>
        </select>

        <button type="submit">Save Post</button>
    </form>
</body>
</html>