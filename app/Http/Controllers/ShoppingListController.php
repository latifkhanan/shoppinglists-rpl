<?php

namespace App\Http\Controllers;

use App\Models\ShoppingList;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ShoppingListController extends Controller
{
    public function index()
    {
        $shoppingLists = ShoppingList::where('user_id', Auth::id())->get();
        return view('shopping-lists.index', compact('shoppingLists'));
    }

    public function create()
    {
        return view('shopping-lists.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        ShoppingList::create([
            'name' => $request->name,
            'user_id' => Auth::id(),
        ]);

        return redirect()->route('shopping-lists.index')->with('success', 'Shopping list created successfully.');
    }

    public function show(ShoppingList $shoppingList)
    {
        $this->authorize('view', $shoppingList);
        return view('shopping-lists.show', compact('shoppingList'));
    }

    public function edit(ShoppingList $shoppingList)
    {
        $this->authorize('update', $shoppingList);
        return view('shopping-lists.edit', compact('shoppingList'));
    }

    public function update(Request $request, ShoppingList $shoppingList)
    {
        $this->authorize('update', $shoppingList);

        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $shoppingList->update([
            'name' => $request->name,
        ]);

        return redirect()->route('shopping-lists.index')->with('success', 'Shopping list updated successfully.');
    }

    public function destroy(ShoppingList $shoppingList)
    {
        $this->authorize('delete', $shoppingList);
        $shoppingList->delete();

        return redirect()->route('shopping-lists.index')->with('success', 'Shopping list deleted successfully.');
    }
}
