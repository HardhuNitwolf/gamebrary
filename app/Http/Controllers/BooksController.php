<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use \App\products;
use Illuminate\Http\Response;

class BooksController extends Controller {

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        /*         * $this->middleware('auth');* */
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($search=null) {
        if (!empty($search)){
            $books = DB::table('product')
                
                ->where('name','LIKE','%'.$search.'%')                
                ->where('typus', '=', 'libro')
                ->orderBy('name', 'asc')
                ->paginate(6);
            
        }
        else{
        $books = DB::table('product')
                ->where('typus', '=', 'libro')
                ->orderBy('name', 'asc')
                ->paginate(6);
        }
        return view('books', [
            'books' => $books
        ]);
    }
    public function getImage($filename){
        $file = Storage::disk('products')->get($filename);
        return new Response($file, 200);
    }

}
