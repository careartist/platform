<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User\RoleRequest;
use App\Models\User\ArtistProfile;

class RoleRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $requests = RoleRequest::get();
        return view('admin.manage.requests.index')->withRequests($requests);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $requests = RoleRequest::find($id);
        return view('admin.manage.requests.show')->withRequests($requests);
    }
}
