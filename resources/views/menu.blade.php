@foreach($items as $menu_item)
    <li><a href="{{ url($menu_item->url) }}">{{ $menu_item->title }}</a></li>
@endforeach
