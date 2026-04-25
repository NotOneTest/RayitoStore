<!DOCTYPE html>
<html>
<head>
<style>
.pagination { display: flex; gap: 5px; list-style: none; padding: 0; margin: 0; justify-content: center; }
.pagination li { margin: 0; }
.pagination a, .pagination span { 
    display: inline-block; 
    padding: 8px 12px; 
    background: #1a1f2e; 
    border: 1px solid #2a3142; 
    color: #8b9ab5; 
    text-decoration: none; 
    border-radius: 4px;
}
.pagination a:hover { border-color: #F7C52D; color: #F7C52D; }
.pagination .active span { background: #F7C52D; border-color: #F7C52D; color: #0a0e17; }
.pagination .disabled span { opacity: 0.5; cursor: default; }
</style>
</head>
<body>
<ul class="pagination">
@if ($paginator->hasPages())
    <li class="{{ $paginator->onFirstPage() ? 'disabled' : '' }}">
        <a href="{{ $paginator->onFirstPage() ? '#' : $paginator->previousPageUrl() }}">&laquo;</a>
    </li>
    
    @foreach ($elements as $element)
        @if (is_string($element))
            <li class="disabled"><span>{{ $element }}</span></li>
        @endif
        
        @if (is_array($element))
            @foreach ($element as $page => $url)
                <li class="{{ $page == $paginator->currentPage() ? 'active' : '' }}">
                    <a href="{{ $url }}">{{ $page }}</a>
                </li>
            @endforeach
        @endif
    @endforeach
    
    <li class="{{ $paginator->hasMorePages() ? '' : 'disabled' }}">
        <a href="{{ $paginator->hasMorePages() ? $paginator->nextPageUrl() : '#' }}">&raquo;</a>
    </li>
@endif
</ul>
</body>
</html>
