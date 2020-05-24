<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use \App\products;
use Illuminate\Http\Response;

class GamesController extends Controller {

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
            $games = DB::table('product')
                
                ->where('name','LIKE','%'.$search.'%')
                
                ->where('typus', '=', 'juego')
                ->orderBy('name', 'asc')
                ->paginate(6);
            
        }
        else{
        $games = DB::table('product')
                ->where('typus', '=', 'juego')
                ->orderBy('name', 'asc')
                ->paginate(6);
        }
        return view('games', [
            'games' => $games
        ]);
    }

    public function getImage($filename) {
        $file = Storage::disk('products')->get($filename);
        return new Response($file, 200);
    }

    public function getCategory() {
        $games = DB::table('product')
                ->select('id', 'category')
                ->where('typus', '=', 'juego')
                ->join('category', 'category.nombre', '=', 'product.category')
                ->get();
        return view('games', [
            'games' => $games
        ]);
    }

}
