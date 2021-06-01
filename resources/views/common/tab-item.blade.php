<li class="{{ request_is($path) ? 'active' : '' }}">
    <a href="{{ request_is($path) ? '#' : $action }}">@yield($path.'-tab-title', $label)</a>
</li>
