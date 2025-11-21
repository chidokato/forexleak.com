<div class="hm2-blog-card bg-white deep-shadow">
    <div class="feature-img rounded-top overflow-hidden">
        <a href="{{$val->category->slug}}/{{$val->slug}}"><img src="data/images/{{$val->img}}" alt="feature" class="img-fluid img150"></a>
    </div>
    <div class="hm2-blog-card-content position-relative">
        <a href="{{$val->category->slug}}" class="tag-btn rounded-pill position-absolute">{{$val->category->name}}</a>
        <a href="{{$val->category->slug}}/{{$val->slug}}">
            <h3 class="h5 mb-3 text-truncate-set text-truncate-set-2">{{$val->name}}</h3>
        </a>
        <div class="price">
            <span>{{$val->price? '$'.$val->price:'$0'}}</span>
            
            <form action="{{ route('cart.add') }}" method="POST">
                @csrf
                <input type="hidden" name="post_id" value="{{ $val->id }}">
                <input type="hidden" name="name" value="{{ $val->name }}">
                <input type="hidden" name="price" value="{{ $val->price }}">
                <input type="hidden" name="quantity" value="1" min="1" max="10" class="">
                <button type="submit" class="bg-none"><i class="fa-solid fa-cart-shopping"></i></button>
            </form>
        </div>
    </div>
</div>