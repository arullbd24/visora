<div class="ctr-headDocumentNavContent">
    <div class="cHeadDocumentNavContent">
        @php
            // ['Draft', 'Pending', 'Approve', 'Withdraw', 'Expired',]
            $lstHeadNavInbox = [
                (object) array(
                    'titleNav' => 'all Document',
                    'icon' => 'fas fa-file',
                    'routeNav' => route('documents.main'),
                    'activeRoute' => 'documents.main',
                    'wireNavigate' => true,
                ),
                (object) array(
                    'titleNav' => 'draft',
                    'icon' => 'fas fa-folder-open',
                    'routeNav' => route('documents.draft'),
                    'activeRoute' => 'documents.draft',
                    'wireNavigate' => true,
                ),
                (object) array(
                    'titleNav' => 'approved',
                    'icon' => 'fas fa-file-circle-check',
                    'routeNav' => route('documents.approved'),
                    'activeRoute' => 'documents.approved',
                    'wireNavigate' => true,
                ),
                (object) array(
                    'titleNav' => 'rejected',
                    'icon' => 'fas fa-file-circle-xmark',
                    'routeNav' => route('documents.rejected'),
                    'activeRoute' => 'documents.rejected',
                    'wireNavigate' => true,
                ),
                (object) array(
                    'titleNav' => 'withdraw',
                    'icon' => 'fas fa-file-export',
                    'routeNav' => route('documents.withdraw'),
                    'activeRoute' => 'documents.withdraw',
                    'wireNavigate' => true,
                ),
                // (object) array(
                //     'titleNav' => 'expired',
                //     'icon' => 'fas fa-clock',
                //     'routeNav' => route('documents.expired'),
                //     'activeRoute' => 'documents.expired',
                //     'wireNavigate' => true,
                // ),
            ];
        @endphp
        
        <div class="ctr-lstHeadNavDocumentContent">
            <div class="cLstHeadNavDocumentContent flex gap-4">
                @foreach ($lstHeadNavInbox as $itmNavInbox)
                    <div class="itmNvAside">
                        <a href="{{ $itmNavInbox->routeNav }}"
                            class="{{ implode('', explode(' ', $itmNavInbox->titleNav)) }}HeadNavDocumentContent block p-2 rounded-lg overflow-hidden relative transition-all group {{ Route::is($itmNavInbox->activeRoute) ? 'text-black bg-gray-100' : 'text-gray-700 hover:text-black bg-transparent hover:bg-gray-100' }}"
                            role="link"
                            aria-label="Navigate to {{ ucwords($itmNavInbox->titleNav) }}"
                            {{ $itmNavInbox->wireNavigate ? 'wire:navigate' : '' }}>
                            
                            <div class="c{{ ucfirst(implode('', explode(' ', $itmNavInbox->titleNav))) }}HeadNavDocumentContent flex items-center gap-4">
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
                            <div class="stickActive w-3/4 h-1 rounded-full bg-yellow-600 absolute left-1/2 top-full -translate-y-full -translate-x-1/2 {{ Route::is($itmNavInbox->activeRoute) ? '' : 'hidden' }}"></div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>