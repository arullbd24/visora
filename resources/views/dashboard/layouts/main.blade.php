<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>{{ $title ?? 'Dashboard' }}</title>
        
        <title>@yield('titlePage', 'Visora')</title>
        <script src="https://cdn.tailwindcss.com"></script>
        <script src="https://cdn.jsdelivr.net/npm/signature_pad@4.0.0/dist/signature_pad.umd.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/jsqr@1.3.1/dist/jsQR.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.16.105/pdf.min.js"></script>
        {{-- <script src="https://cdn.jsdelivr.net/npm/pdfjs-dist@2.7.570/build/pdf.min.js"></script> --}}
        {{-- <script src="https://cdn.jsdelivr.net/npm/pdfjs-dist@2.7.570/build/pdf.worker.min.js"></script> --}}
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/resumablejs@1.1.0/resumable.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css"  rel="stylesheet" />
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Inter:slnt,wght@-10..0,100..900&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
        <link rel="icon" href="{{asset('assets/img/visora..png')}}" type="image/x-icon" data-navigate-track>
        <link rel="stylesheet" href="{{ asset('main/css/s.css') }}" type="text/css">
        <link rel="stylesheet" href="{{ asset('main/css/header.css') }}" type="text/css">
        <link rel="stylesheet" href="{{ asset('main/css/font/poppins.css') }}" type="text/css">
        <link rel="stylesheet" href="{{ asset('main/css/font/system-ui sans.css') }}" type="text/css">
        @stack('link-head-field')
        {{-- <script src="https://kit.fontawesome.com/15f35fc9f3.js" crossorigin="anonymous"></script> --}}
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/js/all.min.js"></script>
        @if (Str::contains(request()->route()->getName(), 'documents') && !Str::contains(request()->route()->getName(), 'upload'))
        @endif
        <script>
            const jq = jQuery.noConflict();
            window.$jq = jq;
        </script>
        @if (auth()->check())
            <script>
                function mouseX(evt) {
                    if (evt.pageX) {
                        return evt.pageX;
                    } else if (evt.clientX) {
                        return evt.clientX + (document.documentElement.scrollLeft || document.body.scrollLeft);
                    } else {
                        return null;
                    }
                }
                
                function mouseY(evt) {
                    if (evt.pageY) {
                        return evt.pageY;
                    } else if (evt.clientY) {
                        return evt.clientY + (document.documentElement.scrollTop || document.body.scrollTop);
                    } else {
                        return null;
                    }
                }
            </script>
        @endif
        <script src="{{ asset("components/js/mousePost.js") }}"></script>
        <script src="{{ asset("components/js/contextMenu.js") }}"></script>
        <script src="{{ asset("components/js/getCookie.js") }}"></script>
        <script src="{{ asset('main/js/searchDoc.js') }}" wire:ignore></script>
        @stack('script-head-field')
        
        @livewireStyles
    </head>
    <body class="bg-gray-50">
        <header class="w-full py-2 px-4 bg-black z-[100] fixed top-0 transition-all" aria-label="Global Navigation" wire:ignore>
            <div class="cHeadDashboard flex items-center justify-between">
                @include('dashboard.layouts.header')
            </div>
        </header>
        <div class="dashboard-content flex">
            <aside id="id-asideNavDashboard" class="ctr-asideNavDashboard shrink-0 h-[100vh] bg-gray-950 transition-all sticky top-0 overflow-hidden w-0 sm:w-auto xl:w-80 -translate-x-full sm:translate-x-0" aria-label="Main Dashboard Navigation" wire:ignore>
                <div class="cAsideNavDashboard mt-24 h-full flex flex-col max-xl:items-center max-xl:justify-center">
                    @include('dashboard.layouts.sidebar')
                </div>
            </aside>
            <div class="main-content overflow-c overflow-c-gray mt-24 flex-grow" aria-label="Container Main Content">
                <main class="ml-0 sm:ml-2 min-h-screen mt-4">
                    {{-- Nav Settings --}}
                    @if (Str::contains(request()->route()->getName(), 'setting'))
                        @include('dashboard.pages.setting.urlPathFrom')
                    @endif
                    {{-- Nav Documents --}}
                    @if (Str::contains(request()->route()->getName(), 'documents') && !Str::contains(request()->route()->getName(), 'upload'))
                        @include('dashboard.pages.main.document.nav')
                    @endif
                    {{-- Nav Inbox --}}
                    @if (Str::contains(request()->route()->getName(), 'inbox'))
                        @include('dashboard.pages.main.inbox.nav')
                    @endif
                    <div class="cMainContentDashboard {{ Str::contains(request()->route()->getName(), 'setting') ? 'mt-10' : '' }} p-2" aria-label="Main Content">
                        {{ $slot }}
                    </div>
                </main>
            </div>
            @stack('additional-aside-dashboard')
        </div>
        
        @stack('additional-content')
        
        @if (Str::contains(request()->route()->getName(), 'documents') && !Str::contains(request()->route()->getName(), 'upload'))
            @include('livewire.dashboard.context-menu.upload-document')
            @include('livewire.dashboard.context-menu.modify-document')
        @endif
        
        @persist('documents.upload')
            @livewire('Dashboard.ContextMenu.Detail.Documents.UploadDocument')
            <script src="{{ asset('assets/js/uploadFile.js') }}"></script>
        @endpersist
        {{-- <script>
            document.addEventListener('contextmenu', function(e) {
                window.event.returnValue = true;
            });
        </script> --}}
        @if (!session()->has('timezone'))
            @livewire('Set.SetTimezone')
        @endif
        
        @livewireScripts
        @livewireScriptConfig
        {{-- <script>
            document.addEventListener('livewire:load', function () {
                Livewire.hook('message.sent', () => {
                    document.title = 'Loading...';
                });
        
                Livewire.hook('message.processed', () => {
                    document.title = 'Dashboard';
                });
            });
        </script> --}}
        <script>
            Livewire.on('redirectTo', url => {
                // Livewire.navigate(url);
                console.log(url);
            });
        </script>
        @stack('script-body-field')
    </body>
    
</html>
