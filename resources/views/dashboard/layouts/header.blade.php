    <header class="flex flex-wrap items-center justify-between px-2 sm:px-4 py-2 bg-transparent text-white w-full">
        <!-- LEFT SECTION -->
        <div class="flex items-center gap-2 flex-shrink-0 overflow-x-auto">
            <!-- Sidebar toggle button (mobile only) -->
            <div class="sm:hidden">
                <button type="button" id="btn-shwSidebarDashboard" class="block">
                    <div class="bgrIcon size-8 flex items-center justify-center">
                        <ag-icon class="text-gray-300 text-lg">
                            <i class="fas fa-bars-staggered"></i>
                        </ag-icon>
                    </div>
                </button>
            </div>
            <!-- Logo + App Name -->
            <a href="{{ route('dashboard.main') }}" class="flex items-center gap-2" wire:navigate>
                <ag-image class="ctr-logoVisora">
                    <ag-image-content class="cLogoAst size-10 md:size-14 lg:size-16 xl:size-20">
                        <img src="{{ asset('assets/img/visora..png') }}" alt="Logo" class="size-full object-cover object-center">
                    </ag-image-content>
                </ag-image>
                <div class="hidden sm:block">
                    <div class="-space-y-1 select-none leading-tight">
                        <div class="text-lg tracking-wide">
                            <strong class="poppins-regular">Visora</strong>
                        </div>
                        <div class="text-xl tracking-wider">
                            <strong class="poppins-semibold">Dashboard</strong>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <!-- RIGHT SECTION -->
        <nav class="flex items-center gap-2 sm:gap-3 w-full sm:w-auto mt-2 sm:mt-0 justify-end">
            @if (Str::contains(request()->route()->getName(), ['main', 'documents', 'inbox']))
                <!-- Search -->
                <div class="flex-1 sm:flex-initial min-w-0">
                    <div class="searchFieldDashboard bg-white flex items-center w-full sm:w-auto border border-white rounded-lg overflow-hidden transition-all focus-within:border-sky-600 focus-within:px-2 focus-within:rounded-full">
                        <label for="searchSomeDashboard" class="flex items-center justify-center w-10 aspect-square cursor-pointer">
                            <div>
                                <ag-icon class="text-sm text-gray-300">
                                    <i class="fas fa-magnifying-glass" aria-hidden="true"></i>
                                </ag-icon>
                            </div>
                        </label>
                        <input type="text" id="searchSomeDashboard" placeholder="Cari layanan"
                            class="text-sm text-black bg-transparent p-0 border-none ring-0 focus:border-none focus:ring-0 w-0 sm:w-32 focus:w-full transition-all duration-200 min-w-0">
                    </div>
                </div>
            @endif

            <!-- Notification -->
            <div class="relative" wire:ignore>
                @livewire('Dashboard.Layouts.Header.Notification')
            </div>

            <!-- Profile -->
            <div wire:ignore>
                @livewire('Dashboard.Layouts.Header.Profile')
            </div>
        </nav>
    </header>
