<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Daftar Belanja</title>
    <style>
        /* Mengatur gaya umum untuk seluruh halaman */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            color: #333;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        /* Mengatur tampilan kontainer utama */
        .container {
            background-color: #fff;
            padding: 2em;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            width: 100%;
            text-align: center;
        }

        h1 {
            color: #333;
            font-size: 1.8em;
            margin-bottom: 1em;
        }

        label {
            display: block;
            font-size: 1em;
            margin-bottom: 0.5em;
            color: #555;
        }

        input[type="text"] {
            width: 100%;
            padding: 0.8em;
            margin-bottom: 1em;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 1em;
        }

        button {
            background-color: #007bff;
            color: #fff;
            padding: 0.8em 1.2em;
            font-size: 1em;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>

    <div class="container">
        <h1>Buat Daftar Belanja</h1>
        <form action="{{ route('shopping-lists.store') }}" method="POST">
            @csrf
            <label for="name">Nama Daftar:</label>
            <input type="text" id="name" name="name" placeholder="Masukkan nama daftar" required>
            <button type="submit">Buat</button>
        </form>
    </div>

</body>
</html>
