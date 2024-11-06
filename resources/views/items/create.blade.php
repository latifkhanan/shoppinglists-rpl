<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Item</title>
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
            text-align: left;
        }
        input[type="text"],
        input[type="number"] {
            width: 100%;
            padding: 12px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 1em;
            transition: border-color 0.3s;
        }
        input[type="text"]:focus,
        input[type="number"]:focus {
            border-color: #1fc8db;
            outline: none;
        }
        .toggle-container {
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 15px;
        }
        .toggle-label {
            font-weight: bold;
            margin-right: 10px;
            color: #333;
        }
        .toggle-switch {
            position: relative;
            width: 50px;
            height: 24px;
        }
        .toggle-switch input[type="checkbox"] {
            display: none;
        }
        .slider {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #ccc;
            border-radius: 24px;
            cursor: pointer;
            transition: 0.3s;
        }
        .slider:before {
            position: absolute;
            content: "";
            height: 20px;
            width: 20px;
            background-color: white;
            border-radius: 50%;
            top: 2px;
            left: 2px;
            transition: 0.3s;
        }
        input:checked + .slider {
            background-color: #1fc8db;
        }
        input:checked + .slider:before {
            transform: translateX(26px);
        }
        button {
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
            transition: background-color 0.3s;
            margin-top: 10px;
        }
        button:hover {
            background-color: #17a2b8;
        }
        .back-button {
            margin-top: 15px;
            display: inline-block;
            color: #1fc8db;
            text-decoration: none;
            font-weight: bold;
            transition: color 0.3s;
        }
        .back-button:hover {
            color: #17a2b8;
        }
    </style>
</head>
<body>

    <div class="container">
        <h1>Tambah Item ke {{ $shoppingList->name }}</h1>

        <form method="POST" action="{{ route('shopping-lists.items.store', $shoppingList) }}">
            @csrf
            <label for="name">Nama Item:</label>
            <input type="text" id="name" name="name" required>

            <label for="quantity">Jumlah:</label>
            <input type="number" id="quantity" name="quantity" required min="1">

            <div class="toggle-container">
                <span class="toggle-label">Dibeli:</span>
                <label class="toggle-switch">
                    <input type="checkbox" id="is_purchased" name="is_purchased" value="1">
                    <span class="slider"></span>
                </label>
            </div>

            <button type="submit">Tambah Item</button>
        </form>

        <a href="{{ route('shopping-lists.items.index', $shoppingList) }}" class="back-button">Kembali ke Daftar Item</a>
    </div>

</body>
</html>
