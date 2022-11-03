<div class="bg-white shadow-sm p-3 position-relative min-vh-100 " style="z-index: 1">
    <div class="p-6">
       <h2>Easy Drive</h2>
    </div>

    <div class="">
        <div class="list-group fs-base">
            <div class="accordion" id="accordionPanelsStayOpenExample">
                <div class="accordion-item">

                        <h2 class="accordion-header" id="panelsStayOpen-headingOne">
                            <button class="accordion-button fs-base" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true" aria-controls="panelsStayOpen-collapseOne">
                                <svg width="36" height="36" viewBox="0 0 36 36"><path fill="#34A853" d="M16 16v14h4V20z"></path><path fill="#4285F4" d="M30 16H20l-4 4h14z"></path><path fill="#FBBC05" d="M6 16v4h10l4-4z"></path><path fill="#EA4335" d="M20 16V6h-4v14z"></path><path fill="none" d="M0 0h36v36H0z"></path></svg>
                                <span class="ms-3">New Content</span>
                            </button>
                        </h2>

                    <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show" aria-labelledby="panelsStayOpen-headingOne">
                        <div class="accordion-body px-0">
                            <div class="list-group ">

                                <form action="{{route('drive.store')}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <input type="file" name="files[]" multiple class="file-upload-input" >
                                    <button  class="btn btn-light file-upload-btn" >
                                        <span class="bi bi-plus"></span>
                                        New File
                                    </button>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
                <hr>

            </div>
            <a href="" class="list-group-item">
                <i class=" me-2 bi bi-journal-arrow-up"></i>
                <span>Reservation</span>
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

<script>
    let fileBtn= document.querySelector('.file-upload-btn');
    let fileInput =document.querySelector('.file-upload-input');

    // fileBtn.addEventListener('click', function(e){
    //     e.preventDefault();
    //     fileInput.click()
    //     e.target.parentElement.submit()
    // })
</script>


