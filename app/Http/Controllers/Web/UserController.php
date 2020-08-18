<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function index(Request $request) {

        $user = DB::table('users');

        if ($request->estado != null && $request->estado != '') {
            $user = $user->where('estado', $request->estado);
        }

        $user = $user->paginate(10);
        return view('user.index', compact('user'));
    }

    public function cambiarEstadoUsuario(Request $request) {

        $user = User::find($request->id);
        $user->estado = $request->estado;
        $user->save();
        return response()->json(200);
    }
}
