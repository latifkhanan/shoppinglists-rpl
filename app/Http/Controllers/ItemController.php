<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\ShoppingList;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ItemController extends Controller
{
    public function index(ShoppingList $shoppingList)
    {
        $items = $shoppingList->items; // Mengambil semua item dari daftar belanja
        return view('items.index', compact('shoppingList', 'items'));
    }

    public function create(ShoppingList $shoppingList)
    {
        return view('items.create', compact('shoppingList'));
    }

    public function store(Request $request, ShoppingList $shoppingList)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'quantity' => 'required|integer|min:1',
        ]);

        $shoppingList->items()->create([
            'name' => $request->name,
            'quantity' => $request->quantity,
            'is_purchased' => $request->has('is_purchased'), // true jika checkbox dicentang
        ]);

        return redirect()->route('shopping-lists.items.index', $shoppingList)->with('success', 'Item added successfully.');
    }

    public function edit(ShoppingList $shoppingList, Item $item)
    {
        return view('items.edit', compact('shoppingList', 'item'));
    }

    public function update(Request $request, ShoppingList $shoppingList, Item $item)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'quantity' => 'required|integer|min:1',
        ]);

        $item->update($request->only(['name', 'quantity']));

        return redirect()->route('shopping-lists.items.index', $shoppingList)->with('success', 'Item updated successfully.');
    }

    public function destroy(ShoppingList $shoppingList, Item $item)
    {
        $item->delete();
        return redirect()->route('shopping-lists.items.index', $shoppingList)->with('success', 'Item deleted successfully.');
    }
}
