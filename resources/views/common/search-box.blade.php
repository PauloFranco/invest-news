<form action="{{ $route }}" method="GET" accept-charset="UTF-8">
    <label for="search" class="sr-only">Busca</label>

    <input type="hidden" name="page" value="1">

    <div class="form-group mrg-bottom-10">
        <div class="input-group input-group-sm">
            <input type="search" class="form-control" name="search" id="search" autofocus
                   autocomplete="off" placeholder="{{ $placeholder }}"
                   value="{{ old('search', $search ) }}">

            <span class="input-group-btn">
                <button class="btn btn-default" type="submit"><i class="fa fa-fw fa-search"></i></button>
            </span>

            @unless(empty($search))
                <span class="input-group-btn">
                    <a href="{{ append_query_string($route, ['search' => '', 'page' => 1]) }}"
                       class="btn btn-danger no-wrap-all">Limpar busca</a>
                </span>
            @endunless
        </div>
    </div>
</form>
