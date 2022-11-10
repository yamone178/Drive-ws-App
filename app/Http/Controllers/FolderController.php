<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreFolderRequest;
use App\Http\Requests\UpdateFolderRequest;
use App\Models\Drive;
use App\Models\File;
use App\Models\Folder;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use phpDocumentor\Reflection\PseudoTypes\NegativeInteger;
use phpDocumentor\Reflection\Types\Integer;

class FolderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

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
     * @param  \App\Http\Requests\StoreFolderRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreFolderRequest $request)
    {
        $folder = new  Folder();
        $folder->name = $request->name;
        $folder->user_id = Auth::id();



        if ($request->drive_id !=null){
            $folder->drive_id = $request->drive_id;

            //find folder path
            $parentPath = Folder::find($folder->drive_id)->path;
            $folder->path = $parentPath."/".$folder->name;


//            $drive_name = Folder::where('id', $folder->drive_id)->first()->name;
//            Storage::makeDirectory('public/'.$drive_name."/".$folder->name);

         }else{
            $folder->path = "MyDrive/".$folder->name;

        }

        //        else{
//            Storage::makeDirectory('public/'.$folder->name);

//        }


        $folder->save();
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Folder  $folder
     * @return \Illuminate\Http\Response
     */
    public function show(Folder $folder)
    {
        $folders = Folder::where('drive_id', $folder->id)->get();
        return view('folder.show',compact(['folder','folders']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Folder  $folder
     * @return \Illuminate\Http\Response
     */
    public function edit(Folder $folder)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateFolderRequest  $request
     * @param  \App\Models\Folder  $folder
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateFolderRequest $request, Folder $folder)
    {

        $folder->name = $request->name;
        $folder->update();

        return redirect()->back();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Folder  $folder
     * @return \Illuminate\Http\Response
     */
    public function destroy(Folder $folder)
    {
        $folder->delete();
        return redirect()->back();

    }

    public function download($id){

        $files = File::where('folder_id', $id)->get();

        $fileNames = [];
        foreach ($files as $key=>$file){
            $filePath= storage_path('app/public/'.$file->name);
            $fileNames[$key] = $filePath;
        }

        return response()->download($fileNames);




    }
}
