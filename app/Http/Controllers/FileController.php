<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreFileRequest;
use App\Http\Requests\UpdateFileRequest;
use App\Models\Drive;
use App\Models\File;
use App\Models\Folder;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use phpDocumentor\Reflection\Types\True_;

class FileController extends Controller
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
     * @param  \App\Http\Requests\StoreFileRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreFileRequest $request)
    {


       if ($request->hasFile('uploadFolder')){
           $folder= new Folder();
           $folder->name = $request->folder_name;
           $folder->user_id= Auth::id();
           $folder->save();

           foreach ($request->uploadFolder as $key=>$file){
               $newName = uniqid()."_file.".$file->extension();
               $file->storeAs("public",$newName);

               $saveFiles[$key] = [
                   "user_id" => Auth::id(),
                   "extension"=> $file->extension(),
                   "folder_id" => $folder->id,
                   "name" => $newName
               ];

           }

           File::insert($saveFiles);
       }

        if ($request->hasFile('uploadFiles')){
            foreach ($request->uploadFiles as $key=>$uploadFile){
                $newName = uniqid()."_file.".$uploadFile->extension();
                $uploadFile->storeAs("public",$newName);

                $saveFiles[$key] = [
                    "user_id" => Auth::id(),
                    "extension"=> $uploadFile->extension(),
                    "folder_id" => $request->folder_id,
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

        $newName = $request->newName.'.'.$file->extension;

        Storage::move('public/'.$file->name,  'public/'.$newName );

        $file->name = $newName;
        $file->update();

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\File  $file
     * @return \Illuminate\Http\Response
     */
    public function destroy(File $file)
    {

        $fileName= File::find($file)->first()->name;
        Storage::delete('public/'.$fileName);

        $file->delete();
        return redirect()->back();
    }

    public function download($id){

        $fileName = File::findOrFail($id)->name;

        $filePath= storage_path('app/public/'.$fileName);
       return response()->download($filePath);

    }
}
