

@if(isset($article))
    @include('common.action-button.view', [
        'action'    => route('articles.show', compact('article')),
        'showLabel' => $showLabel,
        'show'      => true,
    ])
@endif
