@if (count($list_menu_sub) == 0)
    <li class="nav-item">
        <a class="nav-link text-white fs-5 py-1" aria-current="page" href="{{$menu->link}}">{{$menu->name}}</a>
    </li>

@else
    <li class="nav-item dropdown">
        <a class="nav-link text-white dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            {{$menu->name}}
        </a>
        <ul class="dropdown-menu">
            @foreach ($list_menu_sub as $row_menu_sub)
                <li><a class="dropdown-item" href="{{$row_menu_sub->link}}">{{$row_menu_sub->name}}</a></li>
            @endforeach
        </ul>
    </li>
@endif