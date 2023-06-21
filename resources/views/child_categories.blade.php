<ul>
    @foreach ($categories as $category)
        <li>
            {{ $category->cat_name }}
            @if ($category->children->isNotEmpty())
                @include('child_categories', ['categories' => $category->children])
            @endif
        </li>
    @endforeach
</ul>