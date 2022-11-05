<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreFileRequest;
use App\Http\Requests\UpdateFileRequest;
use App\Models\Drive;
use App\Models\File;
use App\Models\Folder;
use Illuminate\Support\Facades\Auth;

class FileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $uploadedFiles = File::where('drive_id', null)->latest('id')->get();

        return view('index',compact('uploadedFiles'));
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
     * @param  \App\Http\Requests\StoreFileRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreFileRequest $request)
    {

        //upload Folder
       if ($request->hasFile('uploadFolder')){
           $folder= new Folder();
           $folder->name = $request->folder_name;
           $folder->save();

           //upload folder->files
           foreach ($request->uploadFolder as $key=>$file){
               $newName = uniqid()."_file.".$file->extension();
               $file->storeAs("public",$newName);

               $saveFiles[$key] = [
                   "user_id" => Auth::id(),
                   "extension"=> $file->extension(),
                   "folder_id" => $folder->id,
                   "drive_id" => $folder->id,
                   "name" => $newName
               ];

           }

           File::insert($saveFiles);
       }

       //upload by myDrive
        if ($request->hasFile('photos')){
            foreach ($request->photos as $key=>$photo){
                $newName = uniqid()."_file.".$photo->extension();
                $photo->storeAs("public",$newName);

                $saveFiles[$key] = [
                    "user_id" => Auth::id(),
                    "extension"=> $photo->extension(),
                    "folder_id" => $request->folder_id,
                    "drive_id" => $request->folder_id,
                    "name" => $newName
                ];

            }

            File::insert($saveFiles);
        }


        return redirect()->back();

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\File  $file
     * @return \Illuminate\Http\Response
     */
    public function show(File $file)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\File  $file
     * @return \Illuminate\Http\Response
     */
    public function edit(File $file)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateFileRequest  $request
     * @param  \App\Models\File  $file
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateFileRequest $request, File $file)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\File  $file
     * @return \Illuminate\Http\Response
     */
    public function destroy(File $file)
    {
        //
    }
}
