
<div class="modal fade" id="{{$modalId}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">

        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{route($routeName, $id )}}" id="{{$formName}}" class="" method="post">
                        @csrf
                        @method($action)
                        <input type="text" class="form-control" form="{{$formName}}" value="Untitled folder" name="name" placeholder="folder Name">
                        <button  class="btn btn-primary" form="{{$formName}}"> Save</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>

