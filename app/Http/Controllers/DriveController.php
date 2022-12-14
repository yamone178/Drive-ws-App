<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDriveRequest;
use App\Http\Requests\UpdateDriveRequest;
use App\Models\Drive;
use App\Models\File;
use App\Models\Folder;
use Illuminate\Support\Facades\Auth;

class DriveController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $files =File::orWhere('user_id',Auth::id())
           ->where('folder_id', null)->latest('id')->get();
       $folders= Folder::orWhere('user_id',Auth::id())
           ->where('drive_id', null)->latest('id')->get();
       return view('drive.index',compact(['files','folders']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreDriveRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDriveRequest $request)
    {
//

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Drive  $drive
     * @return \Illuminate\Http\Response
     */
    public function show(Drive $drive)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Drive  $drive
     * @return \Illuminate\Http\Response
     */
    public function edit(Drive $drive)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDriveRequest  $request
     * @param  \App\Models\Drive  $drive
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDriveRequest $request, Drive $drive)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Drive  $drive
     * @return \Illuminate\Http\Response
     */
    public function destroy(Drive $drive)
    {
        //
    }
}
