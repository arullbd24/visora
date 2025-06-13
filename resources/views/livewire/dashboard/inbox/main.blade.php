{{-- <div>
    <div class="ctr-mainInboxMainContent mt-8">
        <div class="cMainInboxMainContent">
            <div class="ctr-mainHeaderInboxMainContent">
                <div class="cMainHeaderInboxMainContent flex items-center gap-2">
                    <div class="refreshMainInbox">
                        <button 
                            {{-- wire:click.prevent='refreshList' --}}
                            {{-- @click="$dispatch('inbox-refresh')"
                            type="button"
                            class="border border-black flex items-center justify-center size-12 rounded-xl"
                            >
                            <div class="cBtnRefreshMainInbox">
                                <ag-icon class="text-xl">
                                    <i class="fas fa-arrows-rotate"></i>
                                </ag-icon>
                            </div>
                        </button> --}}
                    {{-- </div> --}}
                    {{-- <div class="searchMainInbox">
                        <div class="ctr-wireSearchTitleInbox">
                            <label for="wireSearchTitle" class="inpSearch flex items-center gap-2 w-72 h-12 border border-black rounded-xl p-1 overflow-hidden focus-within:ring-1 focus-within:border-blue-600 focus-within:ring-blue-700">
                                <ag-icon class="size-8 flex items-center justify-center text-lg">
                                    <i class="fas fa-magnifying-glass"></i>
                                </ag-icon>
                                <input id="wireSearchTitle" wire:model.live='search' type="search" placeholder="Search Title" aria-label="Search" class="size-full border-none ring-0 focus:border-none focus:ring-0 rounded-xl p-0 text-sm">
                            </label>    
                        </div>
                    </div> --}}
                    {{-- <div class="filterInboxPeriod">
                        
                    </div>
                </div>
            </div> --}}
            
            {{-- <div class="ctr-mainContentInboxMainContent mt-8">
                <div class="cMainContentInboxMainContent">
                    <div class="ctr-listFilterMainContentInboxMainContent">
                        <div class="cListFilterMainContentInboxMainContent">
                            @if ($search != '')
                                <div class="flterSearch border border-black w-fit px-2 py-1 rounded-full bg-gray-200">
                                    <div class="searchVal text-sm max-w-72 line-clamp-1 overflow-hidden">
                                        <p>Search: {{ $search }}</p>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                    @livewire('Dashboard.Inbox.Data.MainInbox', ['lazy' => true])
                    {{-- <livewire:Dashboard.Inbox.Data.MainInbox lazy /> --}}
                </div>
            {{-- </div> --}} --
        {{-- </div> --}}
    {{-- </div> --}}
{{-- </div> --}} 
