<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Daftar Belanja</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(135deg, #9fb8ad, #1fc8db);
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            color: #333;
        }
        .container {
            width: 100%;
            max-width: 500px;
            background: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
            text-align: center;
        }
        h1 {
            font-size: 1.8em;
            color: #1fc8db;
            margin-bottom: 20px;
        }
        label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
            color: #333;
        }
        input[type="text"] {
            width: 100%;
            padding: 12px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 1em;
            transition: border-color 0.3s;
        }
        input[type="text"]:focus {
            border-color: #1fc8db;
            outline: none;
        }
        .button {
            width: 100%;
            padding: 12px;
            background-color: #1fc8db;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 1em;
            font-weight: bold;
            cursor: pointer;
            text-align: center;
            text-decoration: none;
            transition: background-color 0.3s;
            margin: 10px 0;
        }
        .button:hover {
            background-color: #17a2b8;
        }
        .separator {
            height: 1px;
            background-color: #ccc;
            margin: 20px 0; /* Ruang antara pembatas dan elemen di atas dan bawah */
        }
        .back-button {
            text-align: center;
            color: #1fc8db;
            text-decoration: none;
            font-weight: bold;
            transition: color 0.3s;
            margin-top: 15px;
            display: inline-block;
        }
        .back-button:hover {
            color: #17a2b8;
        }
    </style>
</head>
<body>

    <div class="container">
        <h1>Edit Daftar Belanja</h1>
        <form action="{{ route('shopping-lists.update', $shoppingList) }}" method="POST">
            @csrf
            @method('PUT')
            <label for="name">Nama Daftar:</label>
            <input type="text" id="name" name="name" value="{{ $shoppingList->name }}" required>

            <button type="submit" class="button">Perbarui</button>
            <div class="separator"></div>
            <a href="{{ route('shopping-lists.items.index', $shoppingList) }}" class="button">Lihat Barang</a>
        </form>

        <a href="{{ route('shopping-lists.index') }}" class="back-button">Kembali ke Daftar Belanja</a>
    </div>

</body>
</html>
