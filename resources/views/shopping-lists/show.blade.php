<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $shoppingList->name }}</title>
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
            max-width: 600px;
            background: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
        }
        h1 {
            font-size: 2em;
            color: #1fc8db;
            text-align: center;
            margin-bottom: 10px;
        }
        .timestamp {
            text-align: center;
            font-size: 0.9em;
            color: #666;
            margin-bottom: 20px;
        }
        h2 {
            font-size: 1.5em;
            color: #333;
            margin-bottom: 15px;
        }
        .items-list {
            list-style: none;
            padding: 0;
            margin: 0;
        }
        .items-list li {
            background-color: #f8f9fa;
            padding: 15px;
            margin-bottom: 10px;
            border-radius: 5px;
            border: 1px solid #ddd;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .item-details {
            display: flex;
            align-items: center;
            gap: 10px;
        }
        .item-name {
            font-weight: bold;
            font-size: 1em;
            color: #333;
        }
        .status {
            font-size: 0.9em;
            padding: 5px 10px;
            border-radius: 15px;
            font-weight: bold;
        }
        .status.purchased {
            background-color: #d4edda;
            color: #155724;
        }
        .status.not-purchased {
            background-color: #f8d7da;
            color: #721c24;
        }
        .button-container {
            text-align: center;
            margin-top: 20px;
            display: flex;
            gap: 10px;
            justify-content: space-between;
        }
        .button {
            flex: 1;
            padding: 10px;
            background-color: #1fc8db;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            font-weight: bold;
            text-align: center;
            transition: background-color 0.3s;
        }
        .button:hover {
            background-color: #17a2b8;
        }
        .edit-button {
            background-color: #007bff;
        }
        .edit-button:hover {
            background-color: #0056b3;
        }
        .back-button {
            background-color: #6c757d;
        }
        .back-button:hover {
            background-color: #5a6268;
        }
    </style>
</head>
<body>

    <div class="container">
        <h1>{{ $shoppingList->name }}</h1>
        <p class="timestamp">Dibuat pada: {{ $shoppingList->created_at->format('j F Y, g:i a') }}</p>

        <h2>Item:</h2>
        <ul class="items-list">
            @foreach ($shoppingList->items as $item)
                <li>
                    <div class="item-details">
                        <span class="item-name">{{ $item->name }}</span>
                        <span>(Jumlah: {{ $item->quantity }})</span>
                    </div>
                    <span class="status {{ $item->is_purchased ? 'purchased' : 'not-purchased' }}">
                        {{ $item->is_purchased ? 'Sudah Dibeli' : 'Belum Dibeli' }}
                    </span>
                </li>
            @endforeach
        </ul>

        <div class="button-container">
            <a href="{{ route('shopping-lists.items.create', $shoppingList) }}" class="button">Tambah Item Baru</a>
            <a href="{{ route('shopping-lists.items.index', $shoppingList) }}" class="button edit-button">Edit Item</a>
            <a href="{{ route('shopping-lists.index') }}" class="button back-button">Kembali ke Daftar Belanja</a>
        </div>
    </div>

</body>
</html>
