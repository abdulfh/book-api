<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $book = Book::get();
        
        $data = ['status' => 'succes', 'message' => 'Data Retrive' , 'data' => $book];

        return response()->json($data, 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'book_name' => 'string|required|min:3',
            'book_author' => 'string|required|min:3',
        ]);
        $book = new Book();
        $book->book_name = $request->book_name;
        $book->book_author = $request->book_author;
        if($book->save()){
            return response()->json(['status' => 'succes','message' => 'Book Saved','data' => $book], 200);
        }
        return response()->json(['status' => 'error','message' => 'Error'], 400);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $book = Book::find($id);
        $data = ['status' => 'succes', 'message' => 'Data Retrive' , 'data' => $book];
        return response()->json($data, 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'book_name' => 'string|required|min:3',
            'book_author' => 'string|required|min:3',
        ]);

        $book = Book::find($id);
        $book->book_name = $request->book_name;
        $book->book_author = $request->book_author;
        if($book->save()){
            return response()->json(['status' => 'succes','message' => 'Book Update','data' => $book], 200);
        }
        return response()->json(['status' => 'error','message' => 'Error'], 400);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $book = Book::find($id);
        if($book->delete()){
            return response()->json(['status' => 'succes','message' => 'Book deleted'], 200);
        }
        return response()->json(['status' => 'error','message' => 'Error'], 400);
    }
}
