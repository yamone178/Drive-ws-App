@extends('layouts.app')

@section('content')
    <div class="container">


        <div class="row">

                @foreach(\App\Models\Folder::where('drive_id', null)->get() as $folder)
                <div class="col-3">
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

                </div>

                @endforeach

            @foreach(\App\Models\File::where('drive_id', null)->get() as $file)
                @if($file->extension == 'png'|| $file->extension == 'jpg'|| $file->extension == 'jpeg')

                    <div class="col-3 my-3">

                        <div class="card">
                            <img src="{{asset('storage/'.$file->name)}}" class="card-img-top" width="170px" height="170px" style="object-fit: cover" alt="">

                            <div class="card-body">
                                <p class="mb-0">{{$file->name}}</p>
                            </div>
                        </div>

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

                            <div class="card-body">
                                <p class="mb-0">{{$file->name}}</p>
                            </div>
                        </div>
                    </div>

                @endif
             @endforeach

        </div>


    </div>

@endsection

