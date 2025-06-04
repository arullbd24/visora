<div>
    <div class="ctr-headerNavDocuments">
        <div class="cHeaderNavDocuments flex items-center justify-between">
            <div class="ctr-lftNavDocuments" 
                x-data="
                searchDocument
                {{-- {search: ''} --}}
                ">
                <div class="cLftNavDocuments flex items-center w-auto border border-slate-900 rounded-full overflow-hidden transition-all focus-within:border-sky-600 pr-2.5">
                    <label for="searchDocuments" class="lblInpSearch flex items-center justify-center w-10 aspect-square cursor-pointer">
                        <div class="cLblInpSearch">
                            <ag-icon class="text-sm text-gray-300">
                                <i class="fas fa-magnifying-glass" aria-hidden="true"></i>
                            </ag-icon>
                        </div>
                    </label>
                    <input 
                        type="text" 
                        name="" 
                        id="searchDocuments" 
                        placeholder="Search Document" 
                        class="text-sm bg-transparent p-0 border-none ring-0 focus:border-none focus:ring-0 w-48"
                        {{-- x-model="search" --}}
                        {{-- @keyup.debounce.750ms="$dispatch('searchDocument', {data: search})" --}}
                        @keyup.debounce.750ms="handleSearchFile"
                        >
                </div>
            </div>
            <div class="ctr-rghtNavDocuments">
                <div class="cRghtNavDocuments flex items-center gap-4">
                    <div class="ctr-itmNavDocuments">
                        <div class="cItmNavDocuments">
                            <div 
                                class="relative"
                                x-data="{ showFilter: false }">
                                <button type="button" class="block" @click="showFilter = !showFilter">
                                    <div class="btn-cItm">
                                        <div class="icon size-10 border border-black flex items-center justify-center">
                                            <i class="fas fa-filter"></i>
                                        </div>
                                    </div>
                                </button>
                                
                                <div class="ctr-detailItmNavDocuments absolute right-0 p-2"
                                    x-show="showFilter">
                                    <div class="cDetailItmNavDocuments bg-white w-72 h-60 shadow-md shadow-black">
                                        filter
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="ctr-itmNavDocuments">
                        <div class="cItmNavDocuments flex items-center gap-2">
                            <div class="ctr-mainItmNavDocuments">
                                <div class="cMainItmNavDocuments flex items-center gap-1">
                                    <div class="prevPage size-8">
                                        @if ($currentPage > 1 && $currentPage <= $lastPage)
                                            <button 
                                                type="button"
                                                class="size-8 flex items-center justify-center border border-black rounded-full bg-gray-200"
                                                @click="$dispatch('gotoPreviousPage')"
                                                >
                                                <div class="cBtn-prevPage">
                                                    <ag-icon class="">
                                                        <i class="fas fa-chevron-left"></i>
                                                    </ag-icon>
                                                </div>
                                            </button>
                                        @else
                                            <span
                                                class="size-8 flex items-center justify-center border border-black rounded-full">
                                                <ag-icon>
                                                    <i class="fas fa-chevron-left"></i>
                                                </ag-icon>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="nextPage">
                                        @if ($currentPage > 0 && $currentPage < $lastPage)
                                            <button 
                                                type="button"
                                                class="size-8 flex items-center justify-center border border-black rounded-full bg-gray-200"
                                                @click="$dispatch('gotoNextPage')"
                                                >
                                                <div class="cBtn-prevPage">
                                                    <ag-icon class="">
                                                        <i class="fas fa-chevron-right"></i>
                                                    </ag-icon>
                                                </div>
                                            </button>
                                        @else
                                            <span
                                                class="size-8 flex items-center justify-center border border-black rounded-full">
                                                <ag-icon>
                                                    <i class="fas fa-chevron-right"></i>
                                                </ag-icon>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="ctr-detailItmNavDocuments min-w-20">
                                <div class="cDetailItmNavDocuments flex gap-1 text-sm">
                                    @if($total)
                                        <div class="lengthItemCounter flex">
                                            <div class="firstItem">
                                                <div class="txFirstItem">
                                                    <p>{{ $firstItem }}</p>
                                                </div>
                                            </div>
                                            -
                                            <div class="lastItem min-w-1">
                                                <div class="txLastItem">
                                                    <p>{{ $lastItem }}</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="totalItem min-w-1">
                                            <div class="txTotalItem">
                                                <p>of {{ $total }}</p>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    @livewire('Dashboard.Documents.Data.Draft', ['lazy' => true])
</div>

@push('script-body-field')
    <script>
        Alpine.data('searchDocument', () => ({
            handleSearchFile(event) {
                let search = event.target.value;
                let data = {
                    query: search,
                    '_token': '{{ csrf_token() }}'
                };
                
                console.log(data);
                
                Livewire.dispatch('searchDocument', [data]);
            }
        }));
    </script>
@endpush