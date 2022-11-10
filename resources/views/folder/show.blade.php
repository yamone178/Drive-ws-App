@extends('layouts.app')

@section('content')
    <?php

       $paths=  explode("/" , $folder->path)

    ?>
    <div class="container">
        <div class="card mt-3 border-0 shadow-sm min-vh-100 uploadCard">
            <div class="card-body">
               <div class="d-flex justify-content-between">
                   <nav class="breadcrumb">

                       @foreach($paths as $path)

                           @if($path == 'MyDrive')
                               <a href="{{route('myDrive.index')}}" class="text-black text-decoration-none"><h4>{{$path}}/ </h4></a>

                           @else
                               @if( $folder->drive_id == null)
                                   <a href="{{route('folder.show',$folder->id)}}" class="text-black text-decoration-none"><h4>{{$path}} /</h4></a>

                               @else

                                   <a href="{{route('folder.show',$folder->drive_id)}}" class="text-black text-decoration-none"><h4>{{$path}} /  </h4></a>


                               @endif
                           @endif




                       @endforeach

                   </nav>

                   <div class="dropdown">
                       <a class="btn btn-secondary dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                           <i class="bi bi-three-dots-vertical"></i>
                       </a>

                       <ul class="dropdown-menu">
                           <li><button type="button" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#exampleModal{{$folder->id}}">New folder</button></li>

                           <li>
                               <form id="fileUpload" action="{{route('file.store')}}" method="post" enctype="multipart/form-data">
                                   @csrf
                                   <input type="number"  form="fileUpload" name="folder_id" value="{{$folder->id}}" hidden>
                                   <input form="fileUpload" type="file" name="uploadFiles[]" multiple class="file-upload-input form-control" >
                                   <button form="fileUpload"   class="btn w-100 bg-white border-0 file-upload-btn" >
                                       <span class="bi bi-plus"></span>
                                       Upload File
                                   </button>
                               </form>
                           </li>

                           <li>
                               <form id="folderUpload" action="{{route('file.store')}}" method="post" enctype="multipart/form-data">
                                   @csrf
                                   <input type="text" name="drive_id" value="{{$folder->id}}" form="folderUpload" hidden>
                                   <input type="text" class="folderName" name="folder_name" value="" hidden>
                                   <input onchange="selectFolder(event)" form="folderUpload" type="file" webkitdirectory mozdirectory msdirectory odirectory directory name="uploadFolder[]" multiple class="file-upload-input form-control" >
                                   <button form="folderUpload"   class="btn w-100 bg-white border-0 file-upload-btn" >
                                       <span class="bi bi-plus"></span>
                                       Upload folder
                                   </button>
                               </form>
                           </li>
                       </ul>
                   </div>
               </div>

                <div class="row">
                    @foreach($folders as $drive)

                            <div class="col-3 position-relative">
                                <a href="{{route('folder.show', $drive->id)}}" class="card my-3" style="height: 50px; cursor: pointer; text-decoration: none" >


                                    <div class="card-body d-flex align-items-center py-0 text-decoration-none" >

                                        <div class="d-flex">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-folder-fill text-black-50" viewBox="0 0 16 16">
                                                <path d="M9.828 3h3.982a2 2 0 0 1 1.992 2.181l-.637 7A2 2 0 0 1 13.174 14H2.825a2 2 0 0 1-1.991-1.819l-.637-7a1.99 1.99 0 0 1 .342-1.31L.5 3a2 2 0 0 1 2-2h3.672a2 2 0 0 1 1.414.586l.828.828A2 2 0 0 0 9.828 3zm-8.322.12C1.72 3.042 1.95 3 2.19 3h5.396l-.707-.707A1 1 0 0 0 6.172 2H2.5a1 1 0 0 0-1 .981l.006.139z"/>
                                            </svg>

                                            <p class="mb-0 ms-5 text-black">{{$drive->name}}</p>
                                        </div>

                                    </div>

                                </a>

                                <x-drop-drown
                                    modalId="renameFolder{{$drive->id}}"
                                    routeName="folder.update"
                                    id="{{$drive->id}}"
                                    acion-method="delete"
                                    formName="updateFolder{{$drive->id}}"
                                    destroy-route="folder.destroy"
                                    destroy-form-name="destroyFolder{{$drive->id}}"
                                    download-route="file.download"
                                />

                            </div>

                            <x-modal
                                modalId="renameFolder{{$drive->id}}"
                                routeName="folder.update"
                                id="{{$drive->id}}"
                                action="put"
                                formName="updateFolder{{$drive->id}}"

                            />
                        @endforeach
                </div>

                <div class="row">
                    @foreach($folder->files as $file)
                        @if($file->extension == 'png'|| $file->extension == 'jpg'|| $file->extension == 'jpeg')

                            <div class="col-3 my-3">

                                <div class="card position-relative">
                                    <img src="{{asset('storage/'.$file->name)}}" class="card-img-top" width="170px" height="170px" style="object-fit: cover" alt="">

                                    <div class="card-body">
                                        <p class="mb-0">{{$file->name}}</p>
                                    </div>

                                    <x-drop-drown
                                        modalId="renameFile{{$file->id}}"
                                        id="{{$file->id}}"
                                        acion-method="delete"
                                        destroy-route="file.destroy"
                                        destroy-form-name="destroyFile{{$file->id}}"
                                        download-route="file.download"
                                    />                                </div>

                                <x-modal
                                    modalId="renameFile{{$file->id}}"
                                    routeName="file.update"
                                    id="{{$file->id}}"
                                    action="put"
                                    formName="updateFile{{$file->id}}"

                                />

                            </div>
                        @elseif($file->extension == 'mp4')

                            <div class="col-3 my-3">
                                <video controls>
                                    <source src="{{$file->name}}" type="video/mp4">
                                </video>
                            </div>

                        @else
                            <div class="col-3 my-3">
                                <div class="card">
                                    <div class="d-flex justify-content-center align-items-center" style="width: 170px; height: 170px;">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="90" height="90" fill="currentColor" class=" text-primary bi bi-file-earmark-text-fill" viewBox="0 0 16 16">
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
                                    <x-drop-drown
                                        modalId="renameFile{{$file->id}}"
                                        id="{{$file->id}}"
                                        acion-method="delete"
                                        destroy-route="file.destroy"
                                        destroy-form-name="destroyFile{{$file->id}}"
                                        download-route="file.download"
                                    />

                                    <x-modal
                                        modalId="renameFile{{$file->id}}"
                                        routeName="file.update"
                                        id="{{$file->id}}"
                                        action="put"
                                        formName="updateFile{{$file->id}}"

                                    />
                                </div>
                            </div>


                        @endif


                    @endforeach
                </div>

            </div>
        </div>




    </div>

    <div class="modal fade" id="exampleModal{{$folder->id}}" tabindex="-1" aria-labelledby="exampleModalLabel{{$folder->id}}" aria-hidden="true">
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

    @push('script')
        <script>


            function selectFolder(e) {
                let folderName = document.querySelector('.folderName');
                e.preventDefault();
                console.log(folderName.value)
                var theFiles = e.target.files;
                var relativePath = theFiles[0].webkitRelativePath;
                var folder = relativePath.split("/");

                folderName.value = folder[0]
                console.log(folderName.value)

                console.log(folderName.value)

            }
        </script>
    @endpush

@endsection



