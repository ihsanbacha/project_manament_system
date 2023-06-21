<ul>
    @foreach ($categorieszz as $category)
    <i class="fas
    fa-folder-open" style="font-size:
    10px;"></i> <li>
            {{ $category->cat_name }}
            @if ($category->children->isNotEmpty())
                @include('child_categories', ['categories' => $category->children])
            @endif
        </li>
    @endforeach
</ul>