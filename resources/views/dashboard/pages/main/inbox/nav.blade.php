{{-- <div class="ctr-headInboxNavContent">
    <div class="cHeadInboxNavContent">
        @php
            $lstHeadNavInbox = [
                (object) array(
                    'titleNav' => 'inbox',
                    'icon' => 'fas fa-inbox',
                    'routeNav' => route('inbox.main'),
                    'activeRoute' => 'inbox.main',
                    'wireNavigate' => true,
                ),
                (object) array(
                    'titleNav' => 'sent',
                    'icon' => 'fas fa-file-export',
                    'routeNav' => route('inbox.sent'),
                    'activeRoute' => 'inbox.sent',
                    'wireNavigate' => true,
                ),
                (object) array(
                    'titleNav' => 'draft',
                    'icon' => 'fas fa-file-pen',
                    'routeNav' => route('inbox.draft'),
                    'activeRoute' => 'inbox.draft',
                    'wireNavigate' => true,
                ),
                (object) array(
                    'titleNav' => 'archieve',
                    'icon' => 'fas fa-folder-open',
                    'routeNav' => route('inbox.archieve'),
                    'activeRoute' => 'inbox.archieve',
                    'wireNavigate' => true,
                ),
            ];
        @endphp
        
        <div class="ctr-lstHeadNavInboxContent">
            <div class="cLstHeadNavInboxContent flex gap-4">
                @foreach ($lstHeadNavInbox as $itmNavInbox)
                    <div class="itmNvAside">
                        <a href="{{ $itmNavInbox->routeNav }}"
                            class="{{ implode('', explode(' ', $itmNavInbox->titleNav)) }}HeadNavInboxContent block p-2 rounded-lg overflow-hidden relative transition-all group {{ Route::is($itmNavInbox->activeRoute) ? 'text-black bg-gray-100' : 'text-gray-700 hover:text-black bg-transparent hover:bg-gray-100' }}"
                            role="link"
                            aria-label="Navigate to {{ ucwords($itmNavInbox->titleNav) }}"
                            {{ $itmNavInbox->wireNavigate ? 'wire:navigate' : '' }}>
                            
                            <div class="c{{ ucfirst(implode('', explode(' ', $itmNavInbox->titleNav))) }}HeadNavInboxContent flex items-center gap-4">
                                <div class="icn{{ ucfirst(implode('', explode(' ', $itmNavInbox->titleNav))) }} size-8 flex items-center justify-center" role="img" aria-label="Icon {{ ucwords($itmNavInbox->titleNav) }}">
                                    <ag-icon class="text-xl text-center">
                                        <i class="{{ $itmNavInbox->icon }}"></i>
                                    </ag-icon>
                                </div>
                                <div class="txLblAction hidden xl:block">
                                    <p>{{ ucwords($itmNavInbox->titleNav) }}</p>
                                </div>
                            </div>
                            {{-- @if (Route::is($itmNavInbox->activeRoute))
                                <div class="stickActive w-1 h-3/4 rounded-full bg-[#FFD700]/60 absolute left-0 top-1/2 -translate-y-1/2 transition-all"></div>
                            @endif --}}
                            {{-- <div class="stickActive w-3/4 h-1 rounded-full bg-yellow-600 absolute left-1/2 top-full -translate-y-full -translate-x-1/2 {{ Route::is($itmNavInbox->activeRoute) ? '' : 'hidden' }}"></div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>  --}}