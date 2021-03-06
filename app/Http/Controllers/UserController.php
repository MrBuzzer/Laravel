<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->indexSort('total');

    public function indexSort($role)
    {
        $counts = $this->user_gestion->counts();
        $users = $this->user_gestion->index(4, $role); 
        $links = $users->setPath('')->render();
        $roles = $this->role_gestion->all();
        
        return view('users');        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'firstname'=>'required',
            'lastname'=>'required',
            'email'=>'required',
            'biography'=>'required'
        ]);

        $user = new User([
            'name'=>$request->get('name'),
            'firstname'=>$request->get('firstname'),
            'firstname'=>$request->get('lastname'),
            'firstname'=>$request->get('email'),
            'biography'=>$request->get('biography')
        ]);
        $user->save();

        return redirect('/users');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('users.profile', ['user' => User::findOrFail($id)]);
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function index(
        {
            $users = User::all();
            return view('users.users');
        }
    )
}
