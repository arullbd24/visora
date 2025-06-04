@php
    $loop_pag = isset($paginate) ? $paginate : 5;
@endphp
<div class="loadInbox  animate-pulse">
    @for ($i = 0; $i < $loop_pag; $i++)
        <div class="itm bg-gray-200 w-full p-2 my-2 rounded-lg space-y-1.5">
            <div class="h-4 w-12 bg-gray-300 rounded-full"></div>
            <div class="space-y-0.5">
                {{-- <div class="h-4 w-1/4 bg-gray-400 rounded-full"></div> --}}
                <div class="h-8 w-3/4 bg-gray-400 rounded-md"></div>
            </div>
        </div>
    @endfor
</div>