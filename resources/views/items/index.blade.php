<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Barang untuk {{ $shoppingList->name }}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(135deg, #9fb8ad, #1fc8db);
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            min-height: 100vh;
            color: #333;
        }
        .container {
            width: 100%;
            max-width: 600px;
            background: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
            text-align: center;
            margin-top: 20px;
        }
        h1 {
            font-size: 2em;
            color: #1fc8db;
            margin-bottom: 20px;
        }
        .success-message {
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
            padding: 10px;
            margin-bottom: 15px;
            border-radius: 5px;
        }
        ul {
            list-style-type: none;
            padding: 0;
        }
        li {
            background: #f8f9fa;
            margin: 10px 0;
            padding: 15px;
            border-radius: 5px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .button-container {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
            gap: 10px;
        }
        .button {
            flex: 1;
            padding: 10px 15px;
            background-color: #1fc8db;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            font-weight: bold;
            transition: background-color 0.3s;
            text-align: center;
            display: inline-block;
        }
        .button:hover {
            background-color: #17a2b8;
        }
        .delete-button {
            background-color: #dc3545;
            color: white;
            border: none;
            border-radius: 5px;
            padding: 10px 15px;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        .delete-button:hover {
            background-color: #c82333;
        }
        .edit-button {
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            padding: 10px 15px;
            cursor: pointer;
            transition: background-color 0.3s;
            margin-left: 10px;
        }
        .edit-button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>

    <div class="container">
        <h1>Barang untuk {{ $shoppingList->name }}</h1>

        @if (session('success'))
            <div class="success-message">{{ session('success') }}</div>
        @endif

        <ul>
            @foreach ($items as $item)
                <li>
                    <div>
                        {{ $item->name }} (Jumlah: {{ $item->quantity }})
                    </div>
                    <div>
                        <a href="{{ route('shopping-lists.items.edit', [$shoppingList, $item]) }}" class="edit-button">Edit</a>
                        <form action="{{ route('shopping-lists.items.destroy', [$shoppingList, $item]) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="delete-button">Hapus</button>
                        </form>
                    </div>
                </li>
            @endforeach
        </ul>

        <div class="button-container">
            <a href="{{ route('shopping-lists.items.create', $shoppingList) }}" class="button">Tambah Barang Baru</a>
            <a href="{{ route('shopping-lists.index') }}" class="button">Kembali ke Daftar Belanja</a>
        </div>
    </div>

</body>
</html>
