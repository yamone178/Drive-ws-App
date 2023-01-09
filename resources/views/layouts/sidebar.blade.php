<div class="bg-white shadow-sm p-3 position-relative min-vh-100 " style="z-index: 1">
    <div class="p-6">
       <h2>Easy Drive</h2>
    </div>

    <div class="">
        <div class="list-group fs-base">
            <div class="accordion" id="accordionPanelsStayOpenExample">
                <div class="accordion-item">


                    <div class="dropdown">
                        <button class="btn btn-light bg-white shadow rounded-pill border-0 dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <svg width="36" height="36" viewBox="0 0 36 36"><path fill="#34A853" d="M16 16v14h4V20z"></path><path fill="#4285F4" d="M30 16H20l-4 4h14z"></path><path fill="#FBBC05" d="M6 16v4h10l4-4z"></path><path fill="#EA4335" d="M20 16V6h-4v14z"></path><path fill="none" d="M0 0h36v36H0z"></path></svg>
                            <span class="ms-3">New Content</span>
                        </button>
                        <ul class="dropdown-menu">
                            <li>
                                <button type="button" class="btn  w-100 bg-white border-0 " data-bs-toggle="modal" data-bs-target="#createFolderModal">
                                    Create folder
                                </button>
                            </li>

                            <li>
                                <form id="folderUpload" action="{{route('file.store')}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <input type="text" class="folderName" name="folder_name" value="" hidden>
                                    <input onchange="selectFolder(event)" form="folderUpload" type="file" webkitdirectory mozdirectory msdirectory odirectory directory name="uploadFolder[]" multiple class="file-upload-input form-control" >
                                    <button form="folderUpload"   class="btn w-100 bg-white border-0 file-upload-btn" >
                                        <span class="bi bi-plus"></span>
                                        Upload folder
                                    </button>
                                </form>

                            </li>

                            <li>
                                <form id="fileUpload" action="{{route('file.store')}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <input form="fileUpload" type="file" name="uploadFiles[]" multiple class="file-upload-input form-control" >
                                    <button form="fileUpload"   class="btn w-100 bg-white border-0 file-upload-btn" >
                                        <span class="bi bi-plus"></span>
                                        Upload File
                                    </button>
                                </form>
                            </li>
                        </ul>
                    </div>

                </div>
                <hr>

            </div>
            <a href="{{route('myDrive.index')}}" class="list-group-item">
                <i class=" me-2 bi bi-journal-arrow-up"></i>
                <span>My drive</span>
            </a>

            <a href="{{route('drive.trash')}}" class="list-group-item">
                <i class=" me-2 bi bi-trash"></i>
                <span>Trash</span>
            </a>

            <a href="" class="list-group-item">
                <i class=" me-2 bi-cloud"></i>
               <span>Storage</span>
                <br>
                <span>{{\App\Helpers\GetSize::changeMB(\App\Helpers\GetSize::getTotalSize())}} of 1GB used</span>

                {{--                <span>{{\App\Models\GetSize::changeMB(\App\Models\GetSize::getTotalSize())}} of 1GB used</span>--}}
            </a>

        </div>
    </div>

</div>

    <x-modal
        modalId="createFolderModal"
        routeName="folder.store"
        id=""
        action=""
        formName="createFolder"
    />


<script>
    let fileBtn= document.querySelector('.file-upload-btn');
    let fileInput =document.querySelector('.file-upload-input');

    // fileBtn.addEventListener('click', function(e){
    //     e.preventDefault();
    //     fileInput.click()
    //
    //     fileInput.addEventListener('change',function(event){
    //         event.submit()
    //     })
    // })

    function selectFolder(e) {
        let folderName = document.querySelector('.folderName');
        e.preventDefault();
        var theFiles = e.target.files;
        var relativePath = theFiles[0].webkitRelativePath;
        var folder = relativePath.split("/");

        folderName.value = folder[0]
        console.log(folderName.value)

        e.target.parentElement.submit();
    }
</script>


