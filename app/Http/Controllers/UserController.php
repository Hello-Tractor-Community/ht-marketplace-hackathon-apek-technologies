<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('dashboard.profile',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update($id)
    {
        $user = User::findOrFail($id);
        if(request('name')!=null){
            $user->name=request('name');
        }
        if(request('code')!=null){
            $user->code=request('code');
        }
        if(request('contact')!=null){
            $user->contact=request('contact');
        }
        if(request('role')!=null){
            $user->role=request('role');
        }
        if(request('isApproved')!=null){
            $user->isApproved=request('isApproved');
        }
        if(request('email')!=null){
            $user->email=request('email');
        }
        $user->update();
        
        return back()->with('success', 'User details updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
