@if(!empty($column))
    <a target="_blank" href="{{ $column  }}">{{ substr($column,0,40) . '...' }}</a>
@endif