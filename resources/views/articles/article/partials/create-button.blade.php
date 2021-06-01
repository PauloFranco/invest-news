@if($show && $categories->isNotEmpty())
    <div class="btn-group">
        <button type="button" class="btn btn-sm btn-success dropdown-toggle" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fa fa-fw fa-plus"></i>
            criar
            <span class="caret"></span>
        </button>
        <ul class="dropdown-menu " aria-labelledby="dropdownMenuButton">
            @foreach($categories as $category)
                <li><a href="{{ route('articles.create', [
                    'category' => $category,
                ]) }}">{{ $category->present()->name }}</a></li>
            @endforeach
        </ul>
    </div>
@endif
