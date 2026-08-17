<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ItemController extends Controller
{
    // Display all items
    /*    public function index()
    {
        $items = Item::with('category')->latest()->get();
        return view('items', compact('items'));
    }*/
    public function index(Request $request)
    {
        $search = $request->input('search');
        $type = $request->input('type');

        $items = Item::with('category')

            // SEARCH
            ->when($search, function ($query, $search) {

                $query->where(function ($query) use ($search) {

                    $query->where('name', 'like', "%{$search}%")
                        ->orWhere('description', 'like', "%{$search}%")
                        ->orWhere('location', 'like', "%{$search}%")
                        ->orWhereHas('category', function ($query) use ($search) {
                            $query->where('name', 'like', "%{$search}%");
                        });
                });
            })

            // LOST / FOUND FILTER
            ->when($type, function ($query, $type) {
                $query->where('type', $type);
            })

            ->latest()
            //->get();
            ->paginate(6)
            ->withQueryString();

        return view('items', compact('items', 'search', 'type'));
    }
    // Show create form
    public function create()
    {
        $categories = Category::all();
        return view('items.report', compact('categories'));
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

            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);
        if ($request->hasFile('image')) {

            // Delete old image if it exists
            if ($item->image) {
                Storage::disk('public')->delete($item->image);
            }

            // Store new image
            $validated['image'] = $request->file('image')->store('items', 'public');
        }
        $item->update($validated);
        return redirect()
            ->route('items.index')
            ->with('success', 'Item updated successfully.');
    }
    public function destroy($id)
    {
        $item = Item::findOrFail($id);

        if ($item->image) {
            Storage::disk('public')->delete($item->image);
        }

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

            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request
                ->file('image')
                ->store('items', 'public');
        }

        $validated['user_id'] = Auth::id();

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
