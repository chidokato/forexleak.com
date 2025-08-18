@foreach($menus as $item)

@if($item->children->count())
<li class="has-submenu"><a href="javascript:void(0)">{{ $item->name }}</a>
    <ul>
        @foreach($item->children as $child)
        <li><a href="{{ $child->slug }}">{{ $child->name }}</a></li>
        @endforeach
    </ul>
</li>
@else
<li><a href="{{ $item->slug }}">{{ $item->name }}</a></li>
@endif
@endforeach