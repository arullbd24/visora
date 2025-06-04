<div class="p-6 bg-white rounded-lg shadow-md  mx-auto">
    <!-- Profile Section -->
    <div class="flex items-center space-x-4 mb-6">
        <!-- Profile Photo -->
        <img class="w-16 h-16 rounded-full border-2 border-gray-300" 
            src="https://via.placeholder.com/150" 
            alt="Profile Photo">
    
        <!-- Greeting -->
        <div>
            <h2 class="text-xl font-semibold">Hi, {{ auth()->user()->userPersonal->fullname }}</h2>
            <p class="text-sm text-gray-600">Welcome back to your account!</p>
        </div>
    </div>

    <!-- Divider Line -->
    <hr class="my-4 border-t-2 border-gray-200">

    <div class="flex gap-5">
        <!-- Account Information Section -->
        <div class="p-4 border rounded-lg bg-gray-50 flex items-start space-x-2">
            <!-- Icon -->
            <svg class="w-6 h-6 text-blue-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A4.001 4.001 0 017 4a4 4 0 114 4 4.001 4.001 0 01-2.121 3.804M7 20h10M7 20a4 4 0 110-8h10a4 4 0 110 8M7 20v1a3 3 0 106 0v-1" />
            </svg>
            <!-- Content -->
            <div>
                <h3 class="text-lg font-semibold mb-2">Account Information</h3>
            
                <!-- Description -->
                <p class="text-sm text-gray-600 mb-4">
                    Your personal & contact information, with an option to update it.
                </p>
            
                <!-- Manage Account Button -->
                <a href="{{ route("account.account\info") }}" class="text-blue-600 font-semibold text-sm hover:underline" wire:navigate>
                    Manage account information
                </a>
            </div>
        </div>

        <div class="p-4 border rounded-lg bg-gray-50 flex items-start space-x-2">
            <!-- Icon -->
            <svg class="w-6 h-6 text-blue-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4.354 4.354 0 100 8.708 4.354 4.354 0 000-8.708zM2.5 20h19a1 1 0 100-2h-19a1 1 0 100 2z" />
            </svg>
            <!-- Content -->
            <div>
                <h3 class="text-lg font-semibold mb-2">Digital Certificate</h3>
            
                <!-- Description -->
                <p class="text-sm text-gray-600 mb-4">
                    Your digital certificate is active. Enjoy all the services from AST Signature!
                </p>
            
                <!-- Manage Account Button -->
                <a href="{{ route("account.certificate") }}" class="text-blue-600 font-semibold text-sm hover:underline" wire:navigate>
                    Manage digital certificate
                </a>
            </div>
        </div>
    </div>

    <hr class="my-4 border-t-2 border-gray-200">
    
    <div class="space-y-4">
        <div class="p-4 border rounded-lg bg-gray-50 flex items-start space-x-2">
            <!-- Icon -->
            <svg class="w-6 h-6 text-blue-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 11c2.21 0 4-1.79 4-4S14.21 3 12 3 8 4.79 8 7s1.79 4 4 4zM7 20h10M7 20v1a3 3 0 006 0v-1" />
            </svg>
            <!-- Content -->
            <div>
                <h3 class="text-lg font-semibold mb-2">Change Password</h3>
    
                <!-- Description -->
                <p class="text-sm text-gray-600 mb-4">
                    You haven't changed your password yet. Change it every 3-6 months to protect your account from security threats.
                </p>
    
                <!-- Manage Account Button -->
                <a href="{{ route("account.security") }}" class="text-blue-600 font-semibold text-sm hover:underline" wire:navigate>
                    Change Password
                </a>
            </div>
        </div>
    
        <div class="p-4 border rounded-lg bg-gray-50 flex items-start space-x-2">
            <!-- Icon -->
            <svg class="w-6 h-6 text-blue-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
            </svg>
            <!-- Content -->
            <div>
                <h3 class="text-lg font-semibold mb-2">Account Activity</h3>
    
                <!-- Description -->
                <p class="text-sm text-gray-600 mb-4">
                    Track all your activity here! :D
                </p>
    
                <!-- Manage Account Button -->
                <a href="{{ route("account.others\activity") }}" class="text-blue-600 font-semibold text-sm hover:underline">
                    Check my Activity
                </a>
            </div>
        </div>
    
        {{-- <div class="p-4 border rounded-lg bg-gray-50 flex items-start space-x-2">
            <!-- Icon -->
            <svg class="w-6 h-6 text-blue-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7h12M8 11h8m-8 4h12M4 7h.01M4 11h.01M4 15h.01" />
            </svg>
            <!-- Content -->
            <div>
                <h3 class="text-lg font-semibold mb-2">Shared Data</h3>
    
                <!-- Description -->
                <p class="text-sm text-gray-600 mb-4">
                    How many data has been you shared
                </p>
    
                <!-- Manage Account Button -->
                <a href="#" class="text-blue-600 font-semibold text-sm hover:underline">
                    See detail
                </a>
            </div>
        </div> --}}
    </div>
    
    {{-- <div class="bg-white size-[50vh] fixed left-1/2 top-1/2 -translate-x-1/2 -translate-y-1/2 shadow-lg shadow-black" id="parentElement">
        <div class="size-96 bg-black" id="testDragElement" style="position: absolute;"></div>
    </div> --}}
    
</div>

@push('script-body-field')
    {{-- <script>
        dragElement(document.getElementById("testDragElement"));
        
        function dragElement(elmnt) {
            var pos1 = 0, pos2 = 0, pos3 = 0, pos4 = 0;
            
            elmnt.onmousedown = dragMouseDown;

            function dragMouseDown(e) {
                e = e || window.event;
                e.preventDefault();
                pos3 = e.clientX;
                pos4 = e.clientY;
                document.onmouseup = closeDragElement;
                document.onmousemove = elementDrag;
            }

            function elementDrag(e) {
                e = e || window.event;
                e.preventDefault();
                // calculate the new cursor position:
                pos1 = pos3 - e.clientX;
                pos2 = pos4 - e.clientY;
                pos3 = e.clientX;
                pos4 = e.clientY;
                // set the element's new position:
                elmnt.style.top = (elmnt.offsetTop - pos2) + "px";
                elmnt.style.left = (elmnt.offsetLeft - pos1) + "px";
            }

            function closeDragElement() {
                /* stop moving when mouse button is released:*/
                document.onmouseup = null;
                document.onmousemove = null;
            }
        }
    </script>

    <script>
        dragElement(document.getElementById("testDragElement"));

        function dragElement(elmnt) {
            var pos1 = 0, pos2 = 0, pos3 = 0, pos4 = 0;

            elmnt.onmousedown = dragMouseDown;

            function dragMouseDown(e) {
                e = e || window.event;
                e.preventDefault();
                pos3 = e.clientX;
                pos4 = e.clientY;
                document.onmouseup = closeDragElement;
                document.onmousemove = elementDrag;
            }

            function elementDrag(e) {
                e = e || window.event;
                e.preventDefault();
                // calculate the new cursor position:
                pos1 = pos3 - e.clientX;
                pos2 = pos4 - e.clientY;
                pos3 = e.clientX;
                pos4 = e.clientY;

                // get parent element boundaries
                var parent = elmnt.parentElement;
                var parentRect = parent.getBoundingClientRect();

                // calculate the new position for the dragged element
                var newTop = elmnt.offsetTop - pos2;
                var newLeft = elmnt.offsetLeft - pos1;

                // limit dragging to within the parent boundaries
                newTop = Math.max(0, Math.min(newTop, parentRect.height - elmnt.offsetHeight));
                newLeft = Math.max(0, Math.min(newLeft, parentRect.width - elmnt.offsetWidth));

                // set the element's new position
                elmnt.style.top = newTop + "px";
                elmnt.style.left = newLeft + "px";
            }

            function closeDragElement() {
                // stop moving when mouse button is released
                document.onmouseup = null;
                document.onmousemove = null;
            }
        }
    </script> --}}
@endpush
