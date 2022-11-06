<?php

namespace App\Http\Controllers;

use App\Models\File;
use App\Models\Folder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FolderApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $folders= Folder::where('drive_id', null)->latest('id')->get();

        return response()->json([
            'success'=> true,
            'status' => 200,
            'contacts'=> $folders
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
        $folder = new  Folder();
        $folder->name = $request->name;
        $folder->user_id = Auth::id();

        if ($request->drive_id !=null){
            $folder->drive_id = $request->drive_id;
        }


        $folder->save();

        return response()->json([
            'message'=> "Folder $folder->name is created",
            'success'=> 'true',
            'status'=> 200,
            'contact'=> $folder
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
        $folders = Folder::where('drive_id', $id)->get();
        $files =File::where('folder_id',$id)->get();
        return response()->json([
            'success'=> 'true',
            'status'=> 200,
            'folders'=> $folders,
            'files'=> $files
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
        $folder = Folder::find($id);
        $folder->name = $request->name;
        $folder->update();

        return response()->json([
            'message'=> 'Folder is renamed',
            'status'=> 200,
            'success'=> true,
            'contact'=> $folder
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
        $folder= Folder::find($id);
        $folder->delete();
        return  response()->json([
            'message'=> 'Folder is deleted',
            'status'=>200,
            'success'=> true

        ]);
    }
}
