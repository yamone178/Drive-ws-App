<div class="dropdown position-absolute" style="top: 10px; right: 10px;">
    <button class=" btn btn-sm btn-secondary border-0 dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
    </button>

    <ul class="dropdown-menu">
        <li>
            <button class="dropdown-item"  data-bs-toggle="modal" data-bs-target="#{{$modalId}}">
                Rename
            </button>
        </li>
        <li>
            <form action="{{route("$destroyRoute", $id)}}" id="{{$destroyFormName}}" method="post">
                @csrf
                @method($acionMethod)
                <button   class="dropdown-item" form="{{$destroyFormName}}">Trash</button>
            </form>
        </li>
        <li>
            <a class="dropdown-item"  href="{{route("$downloadRoute",$id)}}" >
                Download
            </a>
        </li>
    </ul>
</div>
