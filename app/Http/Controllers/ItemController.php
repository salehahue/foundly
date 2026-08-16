<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Category;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    // Display all items
    public function index()
    {
        $items = Item::with('category')->latest()->get();

        return view('items', compact('items'));
    }

    // Show create form
    public function create()
    {
        $categories = Category::all();

        return view('items.create', compact('categories'));
    }

    public function edit($id)
    {
        $item = Item::findOrFail($id);

        $categories = Category::all();

        return view('items.edit', compact('item', 'categories'));
    }
    public function update(Request $request, $id)
    {
        $item = Item::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'type' => 'required|in:Lost,Found',
            'location' => 'required|string|max:255',
            'date' => 'required|date',
            'description' => 'required|string',
            'category_id' => 'required|exists:categories,id',
        ]);

        $item->update($validated);

        return redirect()
            ->route('items.index')
            ->with('success', 'Item updated successfully.');
    }
    public function destroy($id)
    {
        $item = Item::findOrFail($id);

        $item->delete();

        return redirect()
            ->route('items.index')
            ->with('success', 'Item deleted successfully.');
    }

    // Store new item
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'type' => 'required|in:Lost,Found',
            'category_id' => 'required|exists:categories,id',
            'location' => 'required|string|max:255',
            'date' => 'required|date',
            'description' => 'required|string',
        ]);

        Item::create($validated);

        return redirect()
            ->route('items.index')
            ->with('success', 'Item added successfully.');
    }

    // Display one item
    public function show($id)
    {
        $item = Item::with('category')->findOrFail($id);

        return view('item-details', compact('item'));
    }
}
