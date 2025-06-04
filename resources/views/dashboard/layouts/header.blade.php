
<<<<<<< HEAD
<div class="lftHeaderDashboard flex items-center gap-2">
    <div class="openBgrSidebarHeaderDashboard sm:hidden">
        <button type="button" id="btn-shwSidebarDashboard" class="block">
            <div class="bgrIcon size-8 flex items-center justify-center">
                <ag-icon class="text-gray-300 text-lg">
                    <i class="fas fa-bars-staggered"></i>
                </ag-icon>
            </div>
        </button>
    </div>
    <a href="{{ route('dashboard.main') }}" class="ctr-logoHeaderDashboard block" wire:navigate>
        <div class="cLogoHeaderDashboard flex items-center gap-2">
            <ag-image class="ctr-logoAST">
                {{-- <ag-image-content class="cLogoAst size-10 md:size-14 lg:size-16 xl:size-20"> --}}
                <ag-image-content class="cLogoAst size-10 md:size-14 lg:size-16 xl:size-20">
                    <img src="{{ asset('assets/img/visora..png') }}" alt="" class="size-full object-cover object-center" >
                </ag-image-content>
            </ag-image>
            <div class="nmeHeaderDashboard text-white hidden sm:block">
                <div class="txNme -space-y-2 select-none">
                    <div class="txAuthen text-lg tracking-wide">
                        <strong class="poppins-regular">Visora</strong>
                    </div>
                    <div class="txSigna text-xl tracking-wider">
                        <strong class="poppins-semibold">Dashboard</strong>
=======
@persist('header-icon')
    <div class="lftHeaderDashboard flex items-center gap-2">
        <div class="openBgrSidebarHeaderDashboard sm:hidden">
            <button type="button" id="btn-shwSidebarDashboard" class="block">
                <div class="bgrIcon size-8 flex items-center justify-center">
                    <ag-icon class="text-gray-300 text-lg">
                        <i class="fas fa-bars-staggered"></i>
                    </ag-icon>
                </div>
            </button>
        </div>
        <a href="{{ route('dashboard.main') }}" class="ctr-logoHeaderDashboard block" wire:navigate>
            <div class="cLogoHeaderDashboard flex items-center gap-2">
                <ag-image class="ctr-logoAST">
                    {{-- <ag-image-content class="cLogoAst size-10 md:size-14 lg:size-16 xl:size-20"> --}}
                    <ag-image-content class="cLogoAst size-10 md:size-14 lg:size-16 xl:size-20">
                        <img src="{{ asset('components/icon/logo/logoD.svg') }}" alt="" class="size-full object-cover object-center" >
                    </ag-image-content>
                </ag-image>
                <div class="nmeHeaderDashboard text-white hidden sm:block">
                    <div class="txNme -space-y-2 select-none">
                        <div class="txAuthen text-lg tracking-wide">
                            <strong class="poppins-regular">Authentic</strong>
                        </div>
                        <div class="txSigna text-xl tracking-wider">
                            <strong class="poppins-semibold">Signature</strong>
                        </div>
>>>>>>> 967f19b1fc8645028b4f6c4a1c850c7a6947bda7
                    </div>
                </div>
            </div>
        </a>
    </div>
@endpersist

<nav class="flex items-center gap-2">
    @if (Str::contains(request()->route()->getName(), ['main', 'documents', 'inbox']))
        <div class="ctr-itmNvHDashboard">
            <div class="itmNvHDashboard">
                <div class="searchFieldDashboard bg-gray-700 flex lg:flex-row-reverse items-center w-auto border border-slate-900 rounded-lg overflow-hidden transition-all focus-within:border-sky-600 focus-within:px-2 focus-within:rounded-full">
                    <label for="searchSomeDashboard" class="lblInpSearch flex items-center justify-center w-10 aspect-square cursor-pointer">
                        <div class="cLblInpSearch">
                            <ag-icon class="text-sm text-gray-300">
                                <i class="fas fa-magnifying-glass" aria-hidden="true"></i>
                            </ag-icon>
                        </div>
                    </label>
                    <input type="text" name="" id="searchSomeDashboard" placeholder="Search Document" class="text-sm text-white bg-transparent p-0 border-none ring-0 focus:border-none focus:ring-0 w-0 focus:w-auto">
                </div>
            </div>
        </div>
    @endif
    
    <div class="ctr-itmNvHDashboard relative" wire:ignore>
        @livewire('Dashboard.Layouts.Header.Notification')
    </div>
    
    <div class="ctr-itmNvHDashboard" wire:ignore>
        @livewire('Dashboard.Layouts.Header.Profile')
    </div>
    
    {{-- <div class="searchDocBar">
        <label for="inpSearchDocBar" class="border border-black px-2 block bg-white rounded-full overflow-hidden searchFieldDashboard">
            <div class="cLblSearchBar flex items-center gap-2">
                <div class="inpFieldSearch">
                    <input type="text" name="" id="" placeholder="Search Document" class="rounded-full  w-0 focus:w-auto">
                </div>
                <div class="icnSearch pr-2">
                    <ag-icon class="size-8 text-xl flex items-center justify-center">
                        <i class="fas fa-magnifying-glass"></i>
                    </ag-icon>
                </div>
            </div>
        </label>
    </div> --}}
</nav>