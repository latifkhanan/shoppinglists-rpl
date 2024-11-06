<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Belanja Anda</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(to right, #6a11cb, #2575fc);
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
            max-width: 600px;
            background: white;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        }
        h1 {
            font-size: 1.8em;
            color: #333;
            text-align: center;
            margin-bottom: 20px;
            border-bottom: 2px solid #007bff;
            padding-bottom: 10px;
        }
        .button {
            display: inline-block;
            padding: 12px 25px;
            background-color: #007bff;
            color: white;
            text-decoration: none;
            border-radius: 8px;
            text-align: center;
            font-weight: bold;
            font-size: 1em;
            transition: background-color 0.3s, transform 0.2s;
            margin: 10px 0;
        }
        .button:hover {
            background-color: #0056b3;
            transform: scale(1.05);
        }
        .button-secondary {
            background-color: #6c757d;
        }
        .button-secondary:hover {
            background-color: #5a6268;
        }
        .alert {
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
            padding: 10px;
            margin-bottom: 20px;
            border-radius: 6px;
            text-align: center;
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
        .item-actions {
            display: flex;
            gap: 10px;
        }
        .item-actions a, .item-actions button {
            display: inline-flex;
            align-items: center;
            gap: 5px;
            padding: 8px 12px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 6px;
            font-size: 0.9em;
            font-weight: bold;
            text-decoration: none;
            transition: background-color 0.3s;
        }
        .item-actions a:hover, .item-actions button:hover {
            background-color: #0056b3;
        }
        .delete-button {
            background-color: #dc3545;
        }
        .delete-button:hover {
            background-color: #c82333;
        }
    </style>
</head>
<body>

    <div class="container">
        <h1>Daftar Belanja Anda</h1>

        <!-- Pesan Sukses -->
        @if (session('success'))
            <div class="alert">{{ session('success') }}</div>
        @endif

        <!-- Tombol Tambah List dan Logout -->
        <div style="display: flex; gap: 10px; justify-content: center; margin-bottom: 20px;">
            <a href="{{ route('shopping-lists.create') }}" class="button">Tambah List</a>
            <form action="{{ route('logout') }}" method="POST" style="display:inline;">
                @csrf
                <button type="submit" class="button button-secondary">Keluar Akun</button>
            </form>
        </div>

        <ul>
            @foreach ($shoppingLists as $list)
                <li>
                    <span>{{ $list->name }}</span>
                    <div class="item-actions">
                        <a href="{{ route('shopping-lists.show', $list) }}">
                            📝 Lihat Item
                        </a>
                        <a href="{{ route('shopping-lists.edit', $list) }}">
                            ✏️ Edit
                        </a>
                        <form action="{{ route('shopping-lists.destroy', $list) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="delete-button">
                                🗑️ Hapus
                            </button>
                        </form>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>

</body>
</html>
