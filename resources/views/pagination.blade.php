

@if ($paginator->hasPages())
    
<nav aria-label="Page navigation example">
    <ul class="inline-flex -space-x-px text-sm">
        @if ($paginator->onFirstPage())
            
        <li>
            <a href="{{$paginator->previousPageUrl()}}" class="flex items-center justify-center px-3 h-8 ms-0 leading-tight text-gray-500 bg-white  rounded-s-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white"><</a>
        </li>
        @endif

        @foreach ($elements as $element)
        @if (is_string($element))
            <li>
                <span class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">{{$elememt}}</span>
            </li>
        @endif

         @if (is_array($element))
             
             @foreach ($element as $page => $url)
             <li>
                <a href="{{$url}}" class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">{{$page}}</a>
            </li>
             @endforeach
            
         @endif   
        
        @endforeach
       
        @if ($paginator->previousPageUrl())
            
        <li>
            <a href="{{ $paginator->nextPageUrl() }}" class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 rounded-e-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">></a>
        </li>
        @endif
    </ul>
</nav>


@endif