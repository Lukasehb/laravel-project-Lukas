@foreach($categories as $category)
    <h2>{{ $category->name }}</h2>
    <ul>
        @foreach($category->items as $item)
            <li>
                <strong>{{ $item->question }}</strong>
                <p>{{ $item->answer }}</p>
            </li>
        @endforeach
    </ul>
@endforeach
