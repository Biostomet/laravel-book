<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Http\Requests\StoreBookRequest;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\UpdateBookRequest;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = Book::orderBy('updated_at', 'desc')->paginate(10);
        return view('pages.home', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreBookRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBookRequest $request)
    {
        $request->validate([
            'title' => 'required|min:5|string|max:50',
            'description' => 'required|min:20|max:2000|string',
            'image' => 'sometimes|required|image|mimes:png,jpg,jpeg|max:20000',
            'price' => 'required|integer',
            'author' => 'required|string|min:4|max:50',
            'nombre_pages' => 'required|integer|min:40|max:200000',
            'updated_at' => now(),
        ]);

        $validateImg = $request->file('image')->store('books');

        $new_book = Book::create([
            'title' => $request->title,
            'description' => $request->description,
            'image' => $validateImg,
            'price' => $request->price,
            'author' => $request->author,
            'nombre_pages' => $request->nombre_pages,
            'updated_at' => now(),
        ]);
        return redirect()
            ->route('home')
            ->with('status', 'Le post a bien été ajouté');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        return view('pages.show', compact('book'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book)
    {
        return view('pages.edit', compact('book'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateBookRequest  $request
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBookRequest $request, Book $book)
    {
        // verify if file exist
        if ($request->hasFile('image')) {
            //delete previous img
            Storage::delete($book->image);
            //store the new img
            $book->image = $request->file('image')->store('books');
        }
        $request->validate([
            'title' => 'required|min:5|string|max:50',
            'description' => 'required|min:20|max:2000|string',
            'image' => 'sometimes|required|image|mimes:png,jpg,jpeg|max:20000',
            'price' => 'required|integer',
            'author' => 'required|string|min:4|max:50',
            'nombre_pages' => 'required|integer|min:40|max:200000',
        ]);

        //update to DB
        $book->update([
            'title' => $request->title,
            'description' => $request->description,
            'image' => $book->image,
            'price' => $request->price,
            'author' => $request->author,
            'nombre_pages' => $request->nombre_pages,
            'updated_at' => now(),
        ]);
        return redirect()
            ->route('home')
            ->with('status', 'Le post a bien été modifié');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        $book->delete();
        return redirect()
            ->route('home')
            ->with('status', "L'article a bien été supprimé");
    }
}
