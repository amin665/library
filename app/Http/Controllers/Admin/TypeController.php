<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Type;
use App\Models\Category;
use Illuminate\Http\Request;

class TypeController extends Controller
{
    public function index(Request $request)
    {
        $q = $request->get('q');

        $types = Type::with('category')
            ->when($q, function ($query, $q) {
                $query->where('name', 'like', "%{$q}%");
            })
            ->paginate(15)
            ->withQueryString();

        return view('admin.types.index', compact('types', 'q'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('admin.types.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'edition' => 'nullable|string|max:255',
            'category_id' => 'required|exists:categories,id',
        ]);

        Type::create($validated);

        return redirect()->route('admin.types.index')->with('success', 'Type created successfully.');
    }

    public function edit(Type $type)
    {
        $categories = Category::all();
        return view('admin.types.edit', compact('type', 'categories'));
    }

    public function update(Request $request, Type $type)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'edition' => 'nullable|string|max:255',
            'category_id' => 'required|exists:categories,id',
        ]);

        $type->update($validated);

        return redirect()->route('admin.types.index')->with('success', 'Type updated successfully.');
    }

    public function destroy(Type $type)
    {
        $type->delete();
        return redirect()->route('admin.types.index')->with('success', 'Type deleted successfully.');
    }
}
