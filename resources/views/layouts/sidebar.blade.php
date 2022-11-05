<div class="bg-white shadow-sm p-3 position-relative min-vh-100 " style="z-index: 1">
    <div class="p-6">
       <h2>Easy Drive</h2>
    </div>

    <div class="">
        <div class="list-group fs-base">
            <div class="accordion" id="accordionPanelsStayOpenExample">
                <div class="accordion-item">

{{--                        <h2 class="accordion-header" id="panelsStayOpen-headingOne">--}}
{{--                            <button class="accordion-button fs-base" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true" aria-controls="panelsStayOpen-collapseOne">--}}
{{--                                <svg width="36" height="36" viewBox="0 0 36 36"><path fill="#34A853" d="M16 16v14h4V20z"></path><path fill="#4285F4" d="M30 16H20l-4 4h14z"></path><path fill="#FBBC05" d="M6 16v4h10l4-4z"></path><path fill="#EA4335" d="M20 16V6h-4v14z"></path><path fill="none" d="M0 0h36v36H0z"></path></svg>--}}
{{--                                <span class="ms-3">New Content</span>--}}
{{--                            </button>--}}
{{--                        </h2>--}}

                    <div class="dropdown">
                        <button class="btn btn-light bg-white shadow rounded-pill border-0 dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <svg width="36" height="36" viewBox="0 0 36 36"><path fill="#34A853" d="M16 16v14h4V20z"></path><path fill="#4285F4" d="M30 16H20l-4 4h14z"></path><path fill="#FBBC05" d="M6 16v4h10l4-4z"></path><path fill="#EA4335" d="M20 16V6h-4v14z"></path><path fill="none" d="M0 0h36v36H0z"></path></svg>
                            <span class="ms-3">New Content</span>
                        </button>
                        <ul class="dropdown-menu">
                            <li>
                                <button type="button" class="btn  w-100 bg-white border-0 " data-bs-toggle="modal" data-bs-target="#exampleModal">
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
                                    <input form="fileUpload" type="file" name="photos[]" multiple class="file-upload-input form-control" >
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
            <a href="{{route('drive.index')}}" class="list-group-item">
                <i class=" me-2 bi bi-journal-arrow-up"></i>
                <span>My drive</span>
            </a>

            <div class="accordion" id="accordionPanelsStayOpenExample">
                <div class="accordion-item">
                    <h2 class="accordion-header" id="panelsStayOpen-headingOne">
                        <button class="accordion-button fs-base" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true" aria-controls="panelsStayOpen-collapseOne">
                            <i class=" me-2 bi bi-file-richtext"></i>
                            Menus
                        </button>
                    </h2>
                    <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show" aria-labelledby="panelsStayOpen-headingOne">
                        <div class="accordion-body">
                            <div class="list-group ">
                                <a href="" class="list-group-item">
                                    Lists
                                </a>
                                <a href="" class="list-group-item">
                                    Create
                                </a>
                                <a href="" class="list-group-item">
                                    Edit
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="panelsStayOpen-headingTwo">
                        <button class="accordion-button fs-base collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="false" aria-controls="panelsStayOpen-collapseTwo">
                            <i class=" me-2 bi bi-file-richtext"></i>
                            Chefs
                        </button>
                    </h2>
                    <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingTwo">
                        <div class="accordion-body">
                            <div class="list-group ">
                                <a href="" class="list-group-item">
                                    Lists
                                </a>
                                <a href="" class="list-group-item">
                                    Create
                                </a>
                                <a href="" class="list-group-item">
                                    Edit
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <a href="" class="list-group-item">
                <i class=" me-2 bi bi-people"></i>
               <span> Customer</span>
            </a>

        </div>
    </div>

</div>

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{route('folder.store')}}" id="createFolder" class="" method="post">
                    @csrf
                    <input type="text" class="form-control" form="createFolder" value="Untitled folder" name="name" placeholder="folder Name">
                    <button class="btn btn-primary" form="createFolder"> Save</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>

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
        alert(folder[0]);
        folderName.value = folder[0]
        console.log(folderName.value)

        e.target.parentElement.submit();
    }
</script>


