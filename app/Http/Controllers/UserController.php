<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{
    public function index()
    {
        $data = array (
            'title' => 'Data User',
            'data_user' => User::all(),
        ); 

        return view('admin.master.user.list', $data);
    }

    public function profile()   
    {
        $user = Auth::user();
        
        $data = array (
            'title' => 'Setting Profile',
            'data_profile' => User::where('id', $user->id)->get(),
        ); 

        return view('profile', $data);
    }    

    public function store(Request $request)
    {
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
        ]);
        return redirect('/user') -> with('success', 'Data berhasil disimpan!');
    }

    public function update(Request $request, $id)
    {
        User::where('id', $id)
        ->where('id', $id)
        ->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
        ]);
        return redirect('/user') -> with('success', 'Data berhasil diubah!');
    }

    public function updateprofile(Request $request)
    {
        $userid = Auth::user()->id;

        User::where('id', $userid)
        ->where('id', $userid)
        ->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        return redirect('/profile') -> with('success', 'Data berhasil diubah!');
    }

    public function destroy($id)
    {
        $user = User::where('id', $id)->delete();
        return redirect('/user') -> with('success', 'Data berhasil dihapus!');
    }

}
