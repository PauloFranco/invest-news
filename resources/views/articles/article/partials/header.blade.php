<div class="page-header clearfix">
   
    <h1>
        {{ $title }}

        @unless(empty($articles))
            <small>página {{$articles->currentPage()}}</small>
        @endunless
    </h1>
</div>
