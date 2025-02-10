<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = "ALl Boooks";
        $books = Book::latest()->paginate(10);

        return view('books.index', compact('title', 'books'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = "Upload Your book";
        $categories =  Category::oldest('title')->get();
        return view('books.create', compact('title', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => "required|string",
            'author' => "required|string",
            'category' => "required|numeric|exists:categories,id",
            'description' => "required|string",
            'cover' => "required|image|mimes:jpg,png,jpeg|max:2048",
            'file' => "required|file|mimes:pdf|max:10240",
        ]);

        // Upload the cover
        $coverFile = $request->file('cover');
        $coverExt = $coverFile->extension();
        $coverFileName = "book_cover_" . time() . '_' . mt_srand() . '.' . $coverExt;
        $coverFile->move('uploads/covers', $coverFileName);


        // Upload the book
        $bookFile = $request->file('file');
        $bookExt = $bookFile->extension();
        $bookFileName = "book_" . time() . '_' . mt_srand() . '.' . $bookExt;
        $bookFile->move('uploads/books', $bookFileName);

        // Generate Slug
        $slug = Str::slug($data['title']);

        Book::create([
            'sku' => Str::random(16),
            'category_id' => $data['category'],
            'title' => $data['title'],
            'slug' => $slug,
            'author' => $data['author'],
            'cover' => $coverFileName,
            'file' => $bookFileName,
            'description' => $data['description']
        ]);

        Alert::success('Uploaded Successfully', "Your book has been uploaded");
        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $sku)
    {
        $title = "Edit Book";
        $book = Book::where('sku', $sku)->firstOrFail();
        $categories =  Category::oldest('title')->get();
        $title1 = 'Delete User!';
        $text = "Are you sure you want to delete?";
        confirmDelete($title1, $text);
        return view('books.edit', compact('book', 'title', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $sku)
    {
        $book = Book::where('sku', $sku)->firstOrFail();

        $data = $request->validate([
            'title' => "required|string",
            'author' => "required|string",
            'category' => "required|numeric|exists:categories,id",
            'description' => "required|string",
            'cover' => "nullable|image|mimes:jpg,png,jpeg|max:2048",
            'file' => "nullable|file|mimes:pdf|max:10240",
        ]);

        // Upload the cover if cover submited
        if ($request->hasFile('cover')) {
            $coverFile = $request->file('cover');
            $coverExt = $coverFile->extension();
            $coverFileName = "book_cover_" . time() . '_' . mt_srand() . '.' . $coverExt;
            $coverFile->move('uploads/covers', $coverFileName);
        }


        // Upload the book if book file submited
        if ($request->hasFile('file')) {
            $bookFile = $request->file('file');
            $bookExt = $bookFile->extension();
            $bookFileName = "book_" . time() . '_' . mt_srand() . '.' . $bookExt;
            $bookFile->move('uploads/books', $bookFileName);
        }

        // Generate Slug
        $slug = Str::slug($data['title']);

        // Get the old files
        $oldCover = public_path('uploads/covers/' . $book->cover);
        $oldBookFile = public_path('uploads/books/' . $book->file);


        // Book::where('sku', $sku)->update([
        $book->update([
            'category_id' => $data['category'],
            'title' => $data['title'],
            'slug' => $slug,
            'author' => $data['author'],
            'cover' => $request->hasFile('cover') ? $coverFileName : $book->cover,
            'file' => $request->hasFile('file') ? $bookFileName : $book->file,
            'description' => $data['description']
        ]);


        if ($request->hasFile('cover')) {
            if (File::exists($oldCover)) {
                File::delete($oldCover);
            }
        }
        if ($request->hasFile('file')) {
            if (File::exists($oldBookFile)) {
                File::delete($oldBookFile);
            }
        }

        Alert::success('Updated Successfully', "Your book has been updated");
        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $book  = Book::findOrFail($id);

        // Get the old files
        $oldCover = public_path('uploads/covers/' . $book->cover);
        $oldBookFile = public_path('uploads/books/' . $book->file);

        $book->delete();

        if (File::exists($oldCover)) {
            File::delete($oldCover);
        }

        if (File::exists($oldBookFile)) {
            File::delete($oldBookFile);
        }

        Alert::success('Deleted Successfully', "Your book has been deleted");
        return redirect()->route('books.index');
    }
}
