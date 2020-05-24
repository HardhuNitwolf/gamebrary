<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class UserController extends Controller {

    public function config() {

        return view('user.config');
    }

    public function update(Request $request) {


        $user = \Auth::user();
        $id = $user->id;
        $validate = $this->validate($request, [
            'name' => 'required|string|max:255',
            'surname' => 'required|string|max:255',
            'nick' => 'required|string|max:255|unique:members,nick,' . $id,
        ]);


        $name = $request->input('name');
        $surname = $request->input('surname');
        $nick = $request->input('nick');

        $user->name = $name;
        $user->surname = $surname;
        $user->nick = $nick;

        $image = $request->file('image');
        if ($image) {
            $image_name = time() . $image->getClientOriginalName();

            // Guardarla en la carpeta Storage
            Storage::disk('users')->put($image_name, File::get($image));

            // Seteo el nombre de la imagen en el objeto
            $user->image = $image_name;
        }
        $user->update();

        return redirect()->route('config')
                        ->with(['message' => 'Has actualizado tus datos correctamente']);
    }

    public function getImage($filename) {
        $file = Storage::disk('users')->get($filename);
        return new Response($file, 200);
    }

    public function profile() {

        return view('user.profile');
    }

}
