@foreach($menus as $item)
    <li class="{{ $item->children->count() ? 'has-submenu' : '' }}">
        <a href="{{ $item->slug }}">{{ $item->name }}</a>
        @if($item->children->count())
            <div class="submenu-wrapper menu-list theme-megamenu theme-megamenu-2">
                @foreach($item->children as $child)
                    <div class="megamenu-item">
                        <a href="{{ $child->slug }}">{{ $child->name }}</a>
                        @if($child->children->count())
                            @include('partials.menu-megamenu', ['menus' => $child->children])
                        @endif
                    </div>
                @endforeach
            </div>
        @endif
    </li>
@endforeach
