@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card mt-3 border-0 shadow-sm min-vh-100 uploadCard">
            <div class="card-body">
               <div class="d-flex justify-content-between">
                   <nav class="breadcrumb">
                       <a href="{{route('myDrive.index')}}" class="text-black text-decoration-none"><h4>My Drive / </h4></a>
                       <h4 class="ms-2"> {{$folder->name}}</h4>
                   </nav>

                   <form id="fileUpload" action="{{route('file.store')}}" method="post" enctype="multipart/form-data">
                       @csrf
                       <input type="number"  form="fileUpload" name="folder_id" value="{{$folder->id}}" hidden>

                       <div class="d-flex">
                          <input form="fileUpload" type="file" name="photos[]" multiple class="file-upload-input form-control w-50" >
                          <button form="fileUpload"   class="btn btn-light file-upload-btn " >
                              <span class="bi bi-arrow-bar-up"></span>
                              Upload File
                          </button>
                      </div>
                   </form>

                   <div class="dropdown">
                       <a class="btn btn-secondary dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                           <i class="bi bi-three-dots-vertical"></i>
                       </a>

                       <ul class="dropdown-menu">
                           <li><button type="button" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#exampleFolder{{$folder->id}}">New folder</button></li>

                           <li><a class="dropdown-item" href="#">upload File</a></li>

                           <li><a class="dropdown-item" href="#">Upload folder</a></li>
                       </ul>
                   </div>
               </div>


                    <div class="row">
                        @foreach($folder->files as $file)
                            <div class="col-3 my-3">

                                <div class="card d-flex uploadCard position-relative">
                                    @if($file->extension == 'png'|| $file->extension == 'jpg'|| $file->extension == 'jpeg')

                                        <img src="{{asset('storage/'.$file->name)}}" class="card-img-top" width="100px" height="150px" style="object-fit: cover; object-position: top" alt="">

                                        <div class="card-body d-flex justify-content-around">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi text-danger bi-image-fill" viewBox="0 0 16 16">
                                                <path d="M.002 3a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2h-12a2 2 0 0 1-2-2V3zm1 9v1a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V9.5l-3.777-1.947a.5.5 0 0 0-.577.093l-3.71 3.71-2.66-1.772a.5.5 0 0 0-.63.062L1.002 12zm5-6.5a1.5 1.5 0 1 0-3 0 1.5 1.5 0 0 0 3 0z"/>
                                            </svg>
                                            <p class="mb-0">{{$file->name}}</p>
                                        </div>

                                    @else

                                        <div class="d-flex justify-content-center align-items-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="100px" height="150px" fill="currentColor" class=" text-primary bi bi-file-earmark-text-fill" viewBox="0 0 16 16">
                                                <path d="M9.293 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V4.707A1 1 0 0 0 13.707 4L10 .293A1 1 0 0 0 9.293 0zM9.5 3.5v-2l3 3h-2a1 1 0 0 1-1-1zM4.5 9a.5.5 0 0 1 0-1h7a.5.5 0 0 1 0 1h-7zM4 10.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zm.5 2.5a.5.5 0 0 1 0-1h4a.5.5 0 0 1 0 1h-4z"/>
                                            </svg>
                                            {{--                                        <img src="{{asset('storage/localImages/file.jpg')}}" class="card-img-top" width="170px" height="170px"  style="object-fit: cover" alt="">--}}

                                        </div>

                                        <div class="card-body d-flex justify-content-around">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class=" text-primary bi bi-file-earmark-text-fill" viewBox="0 0 16 16">
                                                <path d="M9.293 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V4.707A1 1 0 0 0 13.707 4L10 .293A1 1 0 0 0 9.293 0zM9.5 3.5v-2l3 3h-2a1 1 0 0 1-1-1zM4.5 9a.5.5 0 0 1 0-1h7a.5.5 0 0 1 0 1h-7zM4 10.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zm.5 2.5a.5.5 0 0 1 0-1h4a.5.5 0 0 1 0 1h-4z"/>
                                            </svg>
                                            <p class="mb-0">{{$file->name}}</p>
                                        </div>

                                    @endif

                                    <div class="dropdown position-absolute" style="top: 10px; right: 10px;">
                                        <button class=" btn btn-sm btn-secondary border-0 dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        </button>

                                        <ul class="dropdown-menu">
                                            <li>
                                                <button class="dropdown-item"  data-bs-toggle="modal" data-bs-target="#renameFolder{{$file->id}}">
                                                    Rename
                                                </button>
                                            </li>
                                            <li>
                                                <form action="{{route('file.destroy', $file->id)}}" id="destroyFolder{{$file->id}}" method="post">
                                                    @csrf
                                                    @method('delete')
                                                    <button   class="dropdown-item" form="destroyFolder{{$file->id}}">Trash</button>
                                                </form>
                                            </li>
                                            <li>
                                                <a class="dropdown-item"  href="{{route('file.download',$file->id)}}" >
                                                    Download
                                                </a>
                                            </li>
                                        </ul>
                                    </div>

                                </div>

                            </div>



                            <div class="modal fade" id="renameFolder{{$file->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{route('file.update', $file->id)}}" id="updateFile{{$file->id}}" class="" method="post">
                                                @csrf
                                                @method('put')
                                                <input type="text" class="form-control" form="updateFile{{$file->id}}" value="{{old('name',explode('.',$file->name)[0])}}" name="newName" placeholder="file Name">
                                            </form>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            <button class="btn btn-primary" form="updateFile{{$file->id}}"> Save</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        @endforeach
                    </div>

                   <div class="row">
                       @foreach(\App\Models\Folder::where('drive_id', $folder->id)->get() as $drive)

                           <div class="col-3 position-relative">

                               <a href="{{route('folder.show', $folder->id)}}" class="card my-3" style="height: 50px; cursor: pointer; text-decoration: none" >
                                   <div class="card-body d-flex align-items-center py-0 text-decoration-none" >

                                       <div class="d-flex">
                                           <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-folder-fill text-black-50" viewBox="0 0 16 16">
                                               <path d="M9.828 3h3.982a2 2 0 0 1 1.992 2.181l-.637 7A2 2 0 0 1 13.174 14H2.825a2 2 0 0 1-1.991-1.819l-.637-7a1.99 1.99 0 0 1 .342-1.31L.5 3a2 2 0 0 1 2-2h3.672a2 2 0 0 1 1.414.586l.828.828A2 2 0 0 0 9.828 3zm-8.322.12C1.72 3.042 1.95 3 2.19 3h5.396l-.707-.707A1 1 0 0 0 6.172 2H2.5a1 1 0 0 0-1 .981l.006.139z"/>
                                           </svg>

                                           <p class="mb-0 ms-5 text-black">{{$folder->name}}</p>

                                       </div>


                                   </div>

                               </a>

                               <div class="dropdown position-absolute" style="right: 30px; top: 35%;">
                                   <button class=" bg-white border-0 dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                   </button>

                                   <ul class="dropdown-menu">
                                       <li>
                                           <button class="dropdown-item"  data-bs-toggle="modal" data-bs-target="#renameFolder{{$folder->id}}">
                                               Rename
                                           </button>
                                       </li>
                                       <li>
                                           <form action="{{route('folder.destroy', $folder->id)}}" id="destroyFolder{{$folder->id}}" method="post">
                                               @csrf
                                               @method('delete')
                                               <button   class="dropdown-item" form="destroyFolder{{$folder->id}}">Trash</button>
                                           </form>
                                       </li>
                                       <li><a class="dropdown-item" href="">Something else here</a></li>
                                   </ul>
                               </div>

                           </div>

                           <div class="modal fade" id="renameFolder{{$folder->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                               <div class="modal-dialog">
                                   <div class="modal-content">
                                       <div class="modal-header">
                                           <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                                           <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                       </div>
                                       <div class="modal-body">
                                           <form action="{{route('folder.update', $folder->id)}}" id="updateFolder" class="" method="post">
                                               @csrf
                                               @method('put')
                                               <input type="text" class="form-control" form="updateFolder" value="Untitled folder" name="name" placeholder="folder Name">

                                           </form>
                                       </div>
                                       <div class="modal-footer">
                                           <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                           <button class="btn btn-primary" form="updateFolder"> Save</button>
                                       </div>
                                   </div>
                               </div>
                           </div>

                       @endforeach
                   </div>

            </div>
        </div>




    </div>

    <div class="modal fade" id="exampleFolder{{$folder->id}}" tabindex="-1" aria-labelledby="exampleModalLabel{{$folder->id}}" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{route('folder.store')}}" id="createFolder{{$folder->id}}" class="" method="post">
                        @csrf
                        <input type="number" value="{{$folder->id}}" form="createFolder{{$folder->id}}" name="drive_id" hidden>
                        <input type="number" value="{{$folder->id}}" form="createFolder{{$folder->id}}" name="folder_id" hidden>
                        <input type="text" class="form-control" form="createFolder{{$folder->id}}" value="Untitled folder" name="name" placeholder="folder Name">
                        <button class="btn btn-primary" form="createFolder{{$folder->id}}"> Save</button>
                    </form>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
@endsection

