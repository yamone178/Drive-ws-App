@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="row">
            <p class="text-black-50 mt-3 mb-0">Folders:</p>

                @foreach($folders as $folder)
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

                    <x-drop-drown
                        modalId="renameFolder{{$folder->id}}"
                        routeName="folder.update"
                        id="{{$folder->id}}"
                        acion-method="delete"
                        formName="updateFolder{{$folder->id}}"
                        destroy-route="folder.destroy"
                        destroy-form-name="destroyFolder{{$folder->id}}"
                        download-route="folder.download"
                    />

                </div>


                <x-modal
                    modalId="renameFolder{{$folder->id}}"
                    routeName="folder.update"
                    id="{{$folder->id}}"
                    action="put"
                    formName="updateFolder{{$folder->id}}"

                />



            @endforeach

        </div>

        <div class="row">
            @foreach($files as $file)
                    <div class="col-3 my-3">

                        <div class="card d-flex uploadCard position-relative">
                            @if($file->extension == 'png'|| $file->extension == 'jpg'|| $file->extension == 'jpeg')

                                <a class="my-image-links" data-gall="gallery01" href="{{asset('storage/'.$file->name)}}">
                                    <img src="{{asset('storage/'.$file->name)}}" class="card-img-top" width="100px" height="150px" style="object-fit: cover; object-position: top" alt="">

                                </a>

                            <div class="card-body d-flex justify-content-around">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi text-danger bi-image-fill" viewBox="0 0 16 16">
                                    <path d="M.002 3a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2h-12a2 2 0 0 1-2-2V3zm1 9v1a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V9.5l-3.777-1.947a.5.5 0 0 0-.577.093l-3.71 3.71-2.66-1.772a.5.5 0 0 0-.63.062L1.002 12zm5-6.5a1.5 1.5 0 1 0-3 0 1.5 1.5 0 0 0 3 0z"/>
                                </svg>
                                <p class="mb-0">{{$file->name}}</p>
                            </div>

                            @elseif($file->extension == 'mp4')

                                <a class="my-video-links" data-autoplay="true" data-vbtype="video" data-ratio="1x1" data-maxwidth="400px" href="{{asset('storage/'.$file->name)}}">

                                    <div class="d-flex justify-content-center align-items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="100px" height="150px" fill="currentColor" class=" text-primary bi bi-file-earmark-text-fill" viewBox="0 0 16 16">
                                            <path d="M9.293 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V4.707A1 1 0 0 0 13.707 4L10 .293A1 1 0 0 0 9.293 0zM9.5 3.5v-2l3 3h-2a1 1 0 0 1-1-1zM4.5 9a.5.5 0 0 1 0-1h7a.5.5 0 0 1 0 1h-7zM4 10.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zm.5 2.5a.5.5 0 0 1 0-1h4a.5.5 0 0 1 0 1h-4z"/>
                                        </svg>
                                        {{--                                        <img src="{{asset('storage/localImages/file.jpg')}}" class="card-img-top" width="170px" height="170px"  style="object-fit: cover" alt="">--}}

                                    </div>

                                </a>

                                <div class="card-body d-flex justify-content-around">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class=" text-primary bi bi-file-earmark-text-fill" viewBox="0 0 16 16">
                                        <path d="M9.293 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V4.707A1 1 0 0 0 13.707 4L10 .293A1 1 0 0 0 9.293 0zM9.5 3.5v-2l3 3h-2a1 1 0 0 1-1-1zM4.5 9a.5.5 0 0 1 0-1h7a.5.5 0 0 1 0 1h-7zM4 10.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zm.5 2.5a.5.5 0 0 1 0-1h4a.5.5 0 0 1 0 1h-4z"/>
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





                                <x-drop-drown
                                    modalId="renameFile{{$file->id}}"
                                    id="{{$file->id}}"
                                    acion-method="delete"
                                    destroy-route="file.destroy"
                                    destroy-form-name="destroyFile{{$file->id}}"
                                    download-route="file.download"
                                />


                        </div>

                    </div>

                <x-modal
                    modalId="renameFile{{$file->id}}"
                    routeName="file.update"
                    id="{{$file->id}}"
                    action="put"
                    formName="updateFile{{$file->id}}"

                />


            @endforeach
        </div>




    </div>

    @push('script')

        <script>

        </script>

    @endpush
@endsection

