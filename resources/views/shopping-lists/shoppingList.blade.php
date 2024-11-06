<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Daftar Belanja</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f4f6f8;
            margin: 0;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            color: #333;
        }
        .container {
            width: 100%;
            max-width: 500px;
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
        }
        h1 {
            font-size: 1.8em;
            color: #333;
            text-align: center;
            margin-bottom: 20px;
            border-bottom: 2px solid #007bff;
            padding-bottom: 10px;
        }
        a {
            display: inline-block;
            margin-bottom: 20px;
            padding: 10px 20px;
            background-color: #007bff;
            color: white;
            text-decoration: none;
            border-radius: 6px;
            text-align: center;
            font-weight: bold;
            transition: background-color 0.3s;
        }
        a:hover {
            background-color: #0056b3;
        }
        ul {
            list-style-type: none;
            padding: 0;
            margin: 0;
        }
        li {
            background-color: #f9f9f9;
            padding: 15px;
            margin-bottom: 10px;
            border: 1px solid #ddd;
            border-radius: 8px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        li:last-child {
            margin-bottom: 0;
        }
    </style>
</head>
<body>

    <div class="container">
        <h1>{{ $shoppingList->name }}</h1>
        <a href="{{ route('shopping-lists.items.create', $shoppingList) }}">Tambah Barang</a>

        <ul>
            @foreach ($items as $item)
                <li>
                    <span>{{ $item->name }}</span>
                    <span>Jumlah: {{ $item->quantity }}</span>
                </li>
            @endforeach
        </ul>
    </div>

</body>
</html>
