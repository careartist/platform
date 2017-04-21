<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use App\User;
use Sentinel;

class RolesController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('admin');
        $this->middleware('admin_address');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $admin_role = Sentinel::findRoleBySlug('admin');
        $artist_role = Sentinel::findRoleBySlug('artist');
        $seller_role = Sentinel::findRoleBySlug('seller');
        $buyer_role = Sentinel::findRoleBySlug('buyer');
        $bidder_role = Sentinel::findRoleBySlug('bidder');

        $admins = $admin_role->users()->with('roles')->get();
        $artists = $artist_role->users()->with('roles')->get();
        $sellers = $seller_role->users()->with('roles')->get();
        $buyers = $buyer_role->users()->with('roles')->get();
        $bidders = $bidder_role->users()->with('roles')->get();


        return view('admin.manage.roles.index')->with([
            'admins' => $admins,
            'artists' => $artists,
            'sellers' => $sellers,
            'buyers' => $buyers,
            'bidders' => $bidders,
        ]);
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {

        $role = Sentinel::findRoleBySlug($slug);
        $users = $role->users()->with('roles')->get();
        // dd($users);
        return view('admin.manage.roles.show')->with(['users' => $users, 'role' => $slug]);
        // return view('admin.manage.roles.show')->withUser($user);
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


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function userRoles($id)
    {

        $user = User::find($id);
        $roles = Sentinel::getRoleRepository()->get();
        return view('admin.manage.users.roles')->with(['user' => $user, 'roles' => $roles]);
        // return view('admin.manage.roles.show')->withUser($user);
    }
}
