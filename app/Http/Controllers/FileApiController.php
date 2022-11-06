<?php

namespace App\Http\Controllers;

use App\Models\File;
use App\Models\Folder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class FileApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $files =File::latest('id')->get();
        return response()->json([
            'success'=> true,
            'status' => 200,
            'contacts'=> $files
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
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


        return response()->json([
            'message'=>'File created',
            'success'=> 'true',
            'status'=> 200,
            'file'=> $saveFiles
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $file = File::find($id);
        return response()->json([
           'success'=>true,
           'status'=> 200,
           'file' => $file
        ]);
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
        $file =File::find($id);
        $newName = $request->newName.'.'.$file->extension;

        Storage::move('public/'.$file->name,  'public/'.$newName );

        $file->name = $newName;
        $file->update();

        return response()->json([
            'message'=> 'contact is renamed',
            'success'=>true,
            'status'=> 200,
            'file' => $file
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $file = File::find($id);
        if (is_null($file)){
            return  response()->json([
                'message'=> 'File not found',
                'status'=> 404
            ]);
        }
        $fileName= $file->first()->name;
        Storage::delete('public/'.$fileName);

        $file->delete();
        return response()->json([
            'message'=> 'contact is deleted',
            'success'=>true,
            'status'=> 200,
        ]);

    }
}
