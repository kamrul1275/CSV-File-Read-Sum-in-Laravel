<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    function Index()
    {
        $roles = Role::with('permission')->latest()->get();

        //return $roles;

        return view('backend.role.index', compact('roles'));
    } //end method


    function Create()
    {
        return view('backend.role.create');
    } //end method


    function Store(Request $request)
    {
        $roles = new Role();

        //dd($request->role_name);
        $roles->roll_name = $request->role_name;
        $roles->save();




        // $datas = role_user::create([
        //     'roll_name' => $request->role_name,
        // ]);
        // return   $datas;




        return redirect('/role');
    } //end method


    function Delete($id)
    {

        $data = Role::find($id);
        $data->delete();
        return redirect()->back()->with('msg', 'delete.....!');
    } //end method
}
