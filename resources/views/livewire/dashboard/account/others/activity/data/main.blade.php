<div class="cLstProfileActivity">
    @php
        // dd($logActivities);
        // dd(Carbon\Carbon::now()->format('d-m-Y H:i:s'));
    @endphp
    @foreach ($logActivities as $logItem)
        @php
            $logItem->activity_type = json_decode($logItem->activity_type);
            $logItem->action = json_decode($logItem->action);
            
            $timestampsLog = Carbon\Carbon::parse($logItem->created_at)->timezone(session()->get('timezone'));
            
            // $datetimeLog = $timestampsLog->format('d-m-Y');
            $datetimeLog = $timestampsLog->format('l, d F Y');
            $timeLog = $timestampsLog->format('H:i:s');
            $iconLog = [
                'account' => [
                    'create' => 'fas fa-check',
                    'authenticate' => 'fas fa-user-shield',
                    'logout' => 'fas fa-arrow-right-from-bracket',
                ],
                'file_disk' => [
                    'create' => 'fas fa-arrow-up-from-bracket',
                    'modify' => 'fas fa-square-pen',
                    'delete' => 'fas fa-trash',
                ]
            ];
            $description = (function() use($logItem) {
                if ($logItem->action->entity === 'account') {
                    $explodeDescription = explode(' at ', $logItem->action->description);
                    $changeTime = Carbon\Carbon::parse($explodeDescription[1])->timezone(session()->get('timezone'));
                    // return $explodeDescription[0] . ' at ' . $changeTime->format('d-m-Y H:i:s');
                    return $explodeDescription[0] . ' at ' . $changeTime->format('l, d F Y - H:i:s');
                }
                
                return $logItem->action->description;
            })();
            // dd($logItem->activity_type, json_decode($logItem->activity_type), $logItem->action, json_decode($logItem->action));
        @endphp
        <div class="itm-profileActivity my-2 bg-white shadow-md shadow-gray-200 rounded-lg p-2" data-log-id="{{ $logItem->id }}" x-data="{ openDetailActivity: false }">
            <div class="cItmProfileActivity">
                <div class="ctr-mainDataProfileActivity">
                    <div class="cMainDataProfileActivity flex items-center gap-4 p-2" @click="openDetailActivity = !openDetailActivity">
                        <div class="icnLblActivity shrink-0 size-8 flex items-center justify-center">
                            <ag-icon class="text-xl">
                                <i class="{{ $iconLog[$logItem->action->entity][$logItem->action->type] }}"></i>
                            </ag-icon>
                        </div>
                        <div class="cDataProfileActivity flex justify-between flex-grow">
                            <div class="lft-dataProfileActivity space-y-1.5">
                                <div class="dataItmProfileActivity">
                                    <div class="txTitleActivity font-medium">
                                        <p>{{ $logItem->action->title }}</p>
                                    </div>
                                </div>
                                <div class="dataItmProfileActivity">
                                    <div class="txDatetime text-sm text-gray-600">
                                        <p>{{ $datetimeLog }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="rght-dataProfileActivity">
                                <div class="dataItmProfileActivity">
                                    <div class="txTimeLog text-sm">
                                        <p>{{ $timeLog }}</p>
                                    </div>
                                </div>
                                {{-- <div class="btnShowDetail">
                                    <button 
                                        type="button"
                                        class="w-full flex items-center justify-center"
                                        @click="openDetailActivity = !openDetailActivity"
                                        >
                                        <ag-icon class="border border-black">
                                            <i class="fas fa-eye"></i>
                                        </ag-icon>
                                    </button>
                                </div> --}}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="wrapper-DetailDataProfileActivity transition-all duration-300 p-2 bg-gray-100 rounded-md"
                    :style="openDetailActivity ? 'padding-top: 0.5rem;' : 'padding-top: 0;'"
                    style="padding-top: 0">
                    <div 
                        class="ctr-detailDataProfileActivity rounded-lg transition-all duration-300 overflow-auto overflow-c overflow-c-gray"
                        :style="openDetailActivity ? 'height: 8rem;' : 'height: 0;'"
                        style="height: 0;"
                        >
                        <div class="cDetailDataProfileActivity h-full">
                            <div class="itm-dataDetailItmProfileActivity flex gap-2">
                                <div class="txLblDataDetail font-semibold w-24">
                                    <div class="txLbl">
                                        <p>Action</p>
                                    </div>
                                </div>
                                <div class="valDataDetail">
                                    <p>{{ $description }}</p>
                                </div>
                            </div>
                            <div class="itm-dataDetailItmProfileActivity flex gap-2">
                                <div class="txLblDataDetail font-semibold w-24">
                                    <div class="txLbl">
                                        <p>Datetime</p>
                                    </div>
                                </div>
                                <div class="valDataDetail">
                                    <p>{{ Carbon\Carbon::parse($logItem->created_at)->format('d-m-Y H:i:s') }}</p>
                                </div>
                            </div>
                            <div class="itm-dataDetailItmProfileActivity flex gap-2">
                                <div class="txLblDataDetail font-semibold w-24">
                                    <div class="txLbl">
                                        <p>Ip Address</p>
                                    </div>
                                </div>
                                <div class="valDataDetail">
                                    <p>{{ $logItem->ip_address }}</p>
                                </div>
                            </div>
                            <div class="itm-dataDetailItmProfileActivity flex gap-2">
                                <div class="txLblDataDetail font-semibold w-24">
                                    <div class="txLbl">
                                        <p>User Agent</p>
                                    </div>
                                </div>
                                <div class="valDataDetail">
                                    <p>{{ $logItem->user_agent }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>