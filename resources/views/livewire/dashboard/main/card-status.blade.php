<div class="cSct-cardStatusMainDashboard flex flex-wrap gap-4" wire:poll.10s='updateDataCard'>
    {{-- <div wire:loading.remove>
        <h1>Konten Utama</h1>
        <p>Ini adalah konten yang akan di-load.</p>
    </div>

    <!-- Skeleton loading -->
    <div wire:loading class="skeleton">
        <div class="skeleton-title"></div>
        <div class="skeleton-text"></div>
    </div> --}}
    
    {{-- @php
        dd($dataCard)
    @endphp --}}
    
    @php
        $lst_cardStatus = [
            (object) array(
                'titleHead' => 'E-Signature/Paraf',
                'backgroundColor' => 'bg-gradient-to-br from-[#f9064c] via-orange-500 to-[#FFD700] shadow-md shadow-[#f78208]',
                'dataValueStat' => $dataCard->dataSignature,
                'descCard' => 'akjsfoiahsfo ihasfoihaif has fhaoifh aiohfshifsiff iakjsfoiahsfo ihasfoihaif has fhaoifh aiohfs',
                'imgIconCard' => asset('assets/img/logoD.svg'),
                'shadowImgIconCard' => 'shadow-[#f20d47]/50',
            ),
            (object) array(
                'titleHead' => 'Documents',
                'backgroundColor' => 'bg-gradient-to-br from-[#0D03FC] via-[#8A03FC] to-[#0375FC] shadow-md shadow-[#0D03FC]',
                'dataValueStat' => $dataCard->dataDocuments,
                'descCard' => 'akjsfoiahsfo ihasfoihaif has fhaoifh aiohfshifsiff iakjsfoiahsfo ihasfoihaif has fhaoifh aiohfs',
                'imgIconCard' => asset('assets/img/logoD.svg'),
                'shadowImgIconCard' => 'shadow-[#f20d47]/50',
            ),
        ];
    @endphp
    
    @foreach ($lst_cardStatus as $cardStatus)
        <div class="ctr-itmCardStatusMainDashboard px-4 py-2 w-full sm:w-96 select-none rounded-xl {{ $cardStatus->backgroundColor }}">
            <div class="cItmCardStatusMainDashboard">
                <div class="headCardStatus">
                    <div class="txHead text-lg text-white">
                        <strong>{{ $cardStatus->titleHead }}</strong>
                    </div>
                </div>
                <div class="dataStatCardStatus mt-2 flex gap-2">
                    <div class="dataValStat w-24 break-all relative">
                        <div class="txDataVal text-4xl font-light line-clamp-1 text-white">
                            <strong>{{ $cardStatus->dataValueStat > 1000 ? '999+' : $cardStatus->dataValueStat }}</strong>
                        </div>
                    </div>
                    <div class="lblStatCardStatus text-white">
                        <div class="txLbl text-sm">
                            <p>left</p>
                        </div>
                        <div class="txLbl text-xs">
                            <p>({{ strtolower($cardStatus->titleHead) }})</p>
                        </div>
                    </div>
                </div>
                <div class="descCardStatus mt-4 flex text-white">
                    <div class="descCard">
                        <div class="txDesc text-sm">
                            <p>{{ $cardStatus->descCard }}</p>
                        </div>
                    </div>
                    <div class="imgIconCard">
                        <ag-image class="rounded-xl p-1 shadow-md shadow-[#8A03FC]/50">
                            <ag-image-content class="flex items-center justify-center size-20 overflow-hidden">
                                <img src="{{ $cardStatus->imgIconCard }}" alt="" class="size-full object-cover object-center">
                            </ag-image-content>
                        </ag-image>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
    
    
</div>