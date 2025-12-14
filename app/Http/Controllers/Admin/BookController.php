<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BookController extends Controller
{
    public function index(Request $request)
    {
        $q = $request->get('q');

        $books = Book::with('type')
            ->when($q, function ($query, $q) {
                $query->where('title', 'like', "%{$q}%")
                      ->orWhere('author', 'like', "%{$q}%");
            })
            ->paginate(15)
            ->withQueryString();

        return view('admin.books.index', compact('books', 'q'));
    }

    public function create()
    {
        $types = Type::all();
        return view('admin.books.create', compact('types'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'description' => 'required|string',
            'publisher' => 'required|string|max:255',
            'quantityStock' => 'required|integer|min:0',
            'price' => 'required|numeric|min:0',
            'picture' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'type_id' => 'nullable|exists:types,id',
        ]);

        if ($request->hasFile('picture')) {
            $validated['picture'] = $request->file('picture')->store('pictures', 'public');
        }

        Book::create($validated);

        return redirect()->route('admin.books.index')->with('success', 'Book created successfully.');
    }

    public function edit(Book $book)
    {
        $types = Type::all();
        return view('admin.books.edit', compact('book', 'types'));
    }

    public function update(Request $request, Book $book)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'description' => 'required|string',
            'publisher' => 'required|string|max:255',
            'quantityStock' => 'required|integer|min:0',
            'price' => 'required|numeric|min:0',
            'picture' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'type_id' => 'nullable|exists:types,id',
        ]);

        if ($request->hasFile('picture')) {
            if ($book->picture) {
                Storage::disk('public')->delete($book->picture);
            }
            $validated['picture'] = $request->file('picture')->store('pictures', 'public');
        }

        $book->update($validated);

        return redirect()->route('admin.books.index')->with('success', 'Book updated successfully.');
    }

    public function destroy(Book $book)
    {
        if ($book->picture) {
            Storage::disk('public')->delete($book->picture);
        }
        $book->delete();
        return redirect()->route('admin.books.index')->with('success', 'Book deleted successfully.');
    }
}
