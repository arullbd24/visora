<div>
    {{-- Stop trying to control. --}}
    <div class="ctr-headContact">
        <div class="cHeadContact flex items-center justify-between">  
            <div class="ctr-leftFlterHead">
                <div class="cLeftFlterHead flex items-center justify-end space-x-6">
                    <div class="ctr-titleHead">
                        <div class="cTitleHead">
                            <p class="text-2xl font-semibold text-gray-800">Contact</p>
                        </div>
                    </div>
                    
                </div>
            </div>
            <div class="ctr-rghtFlterHead">
                <div class="cRghtFlterHead flex items-center gap-2">
                    <div class="grpMoreActionDoto relative">
                        <button type="button" class="btnMoreActionDoto btn-sm flex items-center justify-center w-full rounded-md shadow-sm px-2 py-1 bg-indigo-400 text-sm font-medium text-white hover:bg-indigo-500 focus:outline-none" id="dropdownMenuButton">
                            <i class="fas fa-arrows-rotate text-lg text-white"></i>
                            <span class="flex items-center ml-2">Refresh</span>
                        </button>
                    </div>
                    <div class="grpMoreActionDoto relative">
                        <button type="button" class="btnMoreActionDoto btn-sm flex items-center justify-center w-full rounded-md shadow-sm px-2 py-2 bg-slate-400 text-sm font-medium text-white hover:bg-slate-500 focus:outline-none" id="dropdownMenuButton">
                            <span class="flex items-center ml-2">Name</span>
                            <svg class="-mr-1 ml-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </button>
                        <div class="cShowMoreActionDoto btn-sm origin-top-right absolute right-1 mt-2 w-56 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 z-10 hidden" role="menu" aria-orientation="vertical" aria-labelledby="dropdownMenuButton">
                            <div class="py-1" role="none">
                                <label class="flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900">
                                    <span class="ml-2">Name</span>
                                </label>
                                <label class="flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900">
                                    <span class="ml-2">Phone Number</span>
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="ctr-searchHeadInpFieldContact">
                        <div class="cSearchHeadInpFieldContact flex items-center w-auto border border-slate-900 rounded-md overflow-hidden transition-all focus-within:border-sky-600 px-2">
                            <label for="searchCattHeadProductCtn" class="lblInpSearch flex items-center justify-center w-8 aspect-square">
                                <div class="cLblInpSearch">
                                    <span class="icon">
                                        <i class="fas fa-magnifying-glass"></i>
                                    </span>
                                </div>
                            </label>
                            <input type="text" name="" id="searchCattHeadProductCtn" placeholder="Search..." class="text-sm bg-transparent p-0 border-none ring-0 focus:border-none focus:ring-0">
                        </div>
                    </div>
                    <div class="ctr-addContact">
                        <div class="cAddContact">
                            <button type="button" class="btnMoreActionDoto btn-sm flex items-center justify-center gap-2 w-full rounded-md shadow-sm px-2 py-2 bg-gradient-to-tr from-red-600 to-slate-400 text-sm font-medium text-white focus:outline-none">
                                <span class="flex items-center ml-2">Add Contact</span>
                                <i class="fas fa-user-plus"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="ctr-mainItemProduct mt-5">
        <div class="cMainItemProduct">
            <div class="ctr-headMainItemProduct">
                <div class="cHeadMainItemProduct flex items-center justify-between w-full border-b p-2">
                    <div class="mainHeadItemProduct w-1/2 ml-5">
                        <h2 class="text-sm font-semibold text-slate-500">Name</h2>
                    </div>
                    <div class="priceDateHeadItemProduct shrink-0 flex-grow flex items-center justify-between text-sm text-center font-semibold text-slate-500">
                        <div class="priceHeadItemProduct w-[28%]">
                            <h2>Phone Number</h2>
                        </div>
                        <div class="dateHeadItemProduct w-1/2 text-sm text-center">
                            <h2>Email Address</h2>                                  
                        </div>                                        
                    </div>
                </div>
            </div>
            @php
                $totalPrive = 0;
            @endphp
            <div class="ctr-listItemProduct p-2">
                <div class="cListItemProduct space-y-2">
                    @for ($i = 0; $i < 5; $i++)
                        <div class="itmProduct w-full flex items-center justify-between border p-2 bg-white rounded-md transition duration-50 focus:outline-none hover:bg-slate-200">
                            
                            <div class="mainProduct flex items-center gap-5 w-1/2">
                                <div class="nmeProduct text-sm text-slate-400 items-center justify-start">
                                    <p>Sultan</p>
                                </div>
                            </div>
                            
                            <div class="quantityPriceProduct shrink-0 flex-grow flex items-center justify-between text-sm text-slate-400">
                                <div class="ctr-quantityProduct w-1/3">
                                    <div class="cQuantityProduct text-center">
                                        <p>082123948533</p>
                                    </div>
                                </div>
                                <div class="ctr-priceProduct w-1/2">
                                    {{-- @php
                                        $price = mt_rand(10, 100) * 1000;
                                        $totalPrive += $price;
                                    @endphp --}}
                                    <div class="cPriceProduct text-center">
                                        <p>Sultan@example.com</p>
                                    </div>
                                </div>
                            </div>
                        </div> 
                    @endfor
                </div>
            </div>
        </div>
    </div>
</div>
