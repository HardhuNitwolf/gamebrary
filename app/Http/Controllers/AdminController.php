<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Response;

class AdminController extends Controller {

    public function index() {

        return view('admin.Board');
    }

    public function showUsers() {
        $users = DB::table('members')
                ->orderBy('role', 'asc')
                ->paginate(6);
        return view('admin.board', [
            'users' => $users
        ]);
    }

    public function showGames() {
        $games = DB::table('product')
                ->where('typus', '=', 'juego')
                ->orderBy('name', 'asc')
                ->paginate(6);

        return view('admin.boardg', [
            'games' => $games
        ]);
    }

    public function showBooks() {
        $books = DB::table('product')
                ->where('typus', '=', 'libro')
                ->orderBy('name', 'asc')
                ->paginate(6);

        return view('admin.boardb', [
            'books' => $books
        ]);
    }

    public function addProduct() {
        return view('admin.create');
    }

    public function saveProduct(Request $request) {
        $image = $request->file('image');
        
        if($image){
            $image_name = time().$image->getClientOriginalName();

            // Guardarla en la carpeta Storage
            Storage::disk('products')->put($image_name, File::get($image));
            
          }
           else{
               $image_name=null;
          }
        $product = DB::table('product')->insert(array(
            'name' => $request->input('name'),
            'typus' => $request->input('typus'),
            'category' => $request->input('category'),
            'description' => $request->input('description'),
            'image'=>$image_name,
            'players' => $request->input('players'),
            'age' => $request->input('age'),
            'duration' => $request->input('duration'),
            'dice' => $request->input('dice'),
            'explanation' => $request->input('explanation'),
            'stock' => $request->input('stock'),
            'created_at' => date('Y-m-d H-m-s'),
            'updated_at' => date('Y-m-d H-m-s')
        ));
        
         

        if ($request->input('typus') == 'juego') {
            return redirect()->action('AdminController@showGames')->with('status', 'Nueva adquisición');
        } elseif ($request->input('typus') == 'libro') {
            return redirect()->action('AdminController@showBooks')->with('status', 'Nueva adquisición');
        }
    }

    public function addMember() {
        return view('admin.createMember');
    }

    public function saveMember(Request $request) {
        $product = DB::table('members')->insert(array(
            'role' => $request->input('role'),
            'name' => $request->input('name'),
            'surname' => $request->input('surname'),
            'nick' => $request->input('nick'),
            'email' => $request->input('email'),
            'password' => $request->input('password'),
            'image' => $request->input('image'),
            'maxRenting' => $request->input('maxRenting'),
            'created_at' => date('Y-m-d H-m-s'),
            'updated_at' => date('Y-m-d H-m-s')
        ));


        return redirect()->action('AdminController@showUsers');
    }

    public function deleteProduct($id, $typus) {

        if ($typus == 'juego') {
            $product = DB::table('product')->where('id', $id)
                    ->delete();
            return redirect()->action('AdminController@showGames');
        } elseif ($typus == 'libro') {
            $product = DB::table('product')->where('id', $id)
                    ->delete();
            return redirect()->action('AdminController@showBooks');
        }
    }

    public function deleteMember($id) {


        $user = DB::table('members')->where('id', $id)
                ->delete();

        return redirect()->action('AdminController@showUsers');
    }

    public function editProduct($id) {

        $product = DB::table('product')->where('id', $id)->first();

        return view('admin.editProduct', ['product' => $product]);
    }

    public function updateProduct(Request $request, $typus){
       $image = $request->file('image');
        if($image){
            $image_name = time().$image->getClientOriginalName();
            // Guardarla en la carpeta Storage
            Storage::disk('products')->put($image_name, File::get($image));
          }
          
          else{
               $id= $request->input('id');
              $product = DB::table('product')->where('id',$id)->first();
              $image = $product->image;
              $image_name=$image;
          }

        $id= $request->input('id');
        $product= DB::table('product')->where('id',$id)
                ->update(array(
                    'name'=>$request->input('name'),
                    'image'=>$image_name,
                    'players'=>$request->input('players'),
                    'age'=>$request->input('age'),
                    'duration'=>$request->input('duration'),
                    'dice'=>$request->input('dice'),
                    'explanation'=>$request->input('explanation'),
                    'stock'=>$request->input('stock')
                ));


       if ($typus == 'juego') {
                          
            return redirect()->action('AdminController@showGames');
        } elseif ($typus == 'libro') {
            
                    
            return redirect()->action('AdminController@showBooks');
        }
    }

    public function getImage($filename) {
        $file = Storage::disk('products')->get($filename);
        return new Response($file, 200);
    }
    
    public function history($id){
        $renting = DB::table('renting')
        ->join('members', 'renting.member_id', '=', 'members.id')
        ->join('product', 'renting.product_id', '=', 'product.id')
        ->where('member_id', $id)
        ->get();

        return view('admin.history', [
            'renting' => $renting
        ]);
    }
    public function returnProduct($product_id, $user_id)
    {
        $renting = DB::table('renting')
            ->join('members', 'renting.member_id', '=', 'members.id')
            ->join('product', 'renting.product_id', '=', 'product.id')
            ->where('product_id', '=', $product_id)
            ->where('member_id', '=', $user_id)
            ->delete();

        $user = DB::table('members')
            ->where('id', '=', $user_id)
            ->increment('maxRenting',1);

        $product = DB::table('product')
            ->where('id', '=', $product_id)
            ->increment('stock',1);

        return redirect()->action('AdminController@showUsers');
    }

}
