<div>
    <div class="headerTop p-6 bg-white rounded-lg shadow-md relative mx-auto">
        <div class="flex items-center space-x-4 mb-6">
            <!-- Profile Photo -->
            <div class="imgUser relative size-[150px] flex items-center justify-center bg-gray-200 rounded-full">
                <div class="placeholderImg size-[150px] flex items-center justify-center">
                    <span class="not-italic text-sm text-gray-400">150 x 150</span>
                </div>
                <button class="absolute bottom-0 right-0 bg-gray-500 hover:bg-gray-600 text-white p-2 rounded-lg">
                    <i class="fas fa-camera-retro"></i>
                </button>
            </div>
        
            <!-- Greeting -->
            <div>
                <h2 class="text-xl font-semibold">{{ auth()->user()->userPersonal->fullname }}</h2>
                <p class="text-sm text-gray-600">{{ auth()->user()->username }}</p>
            </div>
        </div>
    
        <!-- QR Button in Right Corner -->
        <button id="qrBtn" class="absolute top-2 right-2 bg-gray-500 hover:bg-gray-600 text-white p-2 rounded-lg">
            <i class="fas fa-qrcode"></i>
        </button>
    </div>

    <!-- QR Modal (Hidden by default) -->
    <div id="qrModelWrapper" class="fixed inset-0 z-50 bg-black bg-opacity-50 hidden">
        <div id="qrModelContent" class="flex items-center justify-center h-full">
            <div class="bg-white p-6 rounded-lg shadow-lg max-w-md w-full">
                <div class="qrImage size-[150px] flex items-center justify-center bg-gray-200 rounded-xl">
                    <div class="placeholderImg size-[150px] flex items-center justify-center">
                        <span class="not-italic text-sm text-gray-400">150 x 150</span>
                    </div>
                </div>
                <p class="text-center text-gray-700">Your data is protected with AGT 27001 standard</p>
                <button id="closeModel" class="mt-4 w-full bg-gray-500 hover:bg-gray-600 text-white p-2 rounded-lg">Close</button>
            </div>
        </div>
    </div>

    <hr class="my-4 border-t-2 border-gray-200">

    <div class="p-6 bg-white rounded-lg shadow-md mx-auto mt-8">
        <h3 class="text-lg font-semibold mb-4">Contact Information</h3>
        <div class="space-y-4">
            <div class="p-2 bg-gray-200 rounded-sm shadow-md mx-auto mt-2">
                <div class="flex items-center">
                    <i class="fas fa-warning text-yellow-500 mr-5"></i>
                    <p class="text-black">We will use your email to send information about the benefits of AST services</p>
                </div>
            </div>
            <div class="flex items-center">
                <i class="fas fa-phone-alt text-gray-600 mr-3"></i>
                <p class="text-gray-700">{{ auth()->user()->userPersonal->phone_number }}</p>
            </div>
            <div class="flex items-center">
                <i class="fas fa-envelope text-gray-600 mr-3"></i>
                <p class="text-gray-700">{{ auth()->user()->email }}</p>
            </div>
        </div>
    </div>

    <div class="p-6 bg-white rounded-lg shadow-md mx-auto mt-10">
        <h3 class="text-lg font-semibold mb-4">Personal Information</h3>
        <div class="space-y-8">
            <div class="flex items-center">
                <label for="fullName" class="block text-gray-700 font-medium mr-5">Full Name -</label>
                <p class="text-gray-700">{{ auth()->user()->userPersonal->fullname }}</p>
            </div>
            <div class="flex items-center">
                <label for="dob" class="block text-gray-700 font-medium mr-5">Date of Birth -</label>
                <p class="text-gray-700">03-08-2005</p>
            </div>
1
            <!-- Selfie Upload -->
            <div class="flex items-center justify-between mb-2">
                <label class="block text-gray-700 font-medium">Selfie</label>
                <i class="fas fa-info bg-gray-300 rounded-full w-8 h-8 flex items-center justify-center"></i>
            </div>
            <div class="flex items-center space-x-4">
                <div class="imgChange w-[150px] h-[150px] flex items-center justify-center bg-gray-200 rounded-xl overflow-hidden">
                    <img id="selfiePreview" src="" alt="Selfie Preview" class="hidden object-cover object-center w-full h-full" />
                    <div id="placeholderText" class="w-full h-full flex items-center justify-center">
                        <span class="not-italic text-sm text-gray-400">150 x 150</span>
                    </div>
                </div>
                <button id="changeSelfieBtn" class="bg-yellow-500 hover:bg-yellow-600 text-white font-bold py-2 px-4 rounded inline-flex items-center">
                    <i class="fas fa-camera mr-2"></i>
                    Change Selfie
                </button>
                <input type="file" id="selfieInput" class="hidden" accept="image/*">
            </div>
        </div>
    </div>

    <div class="p-6 bg-white rounded-lg shadow-md mx-auto mt-10">
        <h3 class="text-lg font-semibold mb-4">Passport</h3>
        <div class="mb-6">
            <label class="block text-gray-700 font-medium mb-2">Passport Picture</label>
            <div class="flex items-center space-x-4">
                <div class="imgChange size-[150px] flex items-center justify-center bg-gray-200 rounded-xl">
                    <div class="placeholderImg size-[150px] flex items-center justify-center">
                        <span class="not-italic text-sm text-gray-400">150 x 150</span>
                    </div>
                </div>
                <button class="bg-yellow-500 hover:bg-yellow-600 text-white font-bold py-2 px-4 rounded inline-flex items-center">
                    <i class="fas fa-camera mr-2"></i>
                    Change Passport Picture
                </button>
            </div>
            <div class="flex items-center mt-8">
                <label for="passportNumber" class="block text-gray-700 font-medium mr-5">Passport Number -</label>
                <p class="text-gray-700">0919278378</p>
            </div>
        </div>
    </div>

    <div class="p-6 bg-white rounded-lg shadow-md mx-auto mt-10">
        <div class="flex items-center justify-between mb-2">
            <h3 class="text-lg font-semibold mb-4">Complementary Documents</h3>
            <i class="fas fa-info bg-gray-300 rounded-full w-8 h-8 flex items-center justify-center"></i>
        </div>
        <p>i still don't know how these things work?</p>
    </div>
</div>

@push('script-body-field')
    <script>
        document.getElementById('qrBtn').addEventListener('click', function() {
            document.getElementById('qrModelWrapper').classList.remove('hidden');
        });

        document.getElementById('closeModel').addEventListener('click', function() {
            document.getElementById('qrModelWrapper').classList.add('hidden');
        });

        const changeSelfieBtn = document.getElementById('changeSelfieBtn');
        const selfieInput = document.getElementById('selfieInput');
        const selfiePreview = document.getElementById('selfiePreview');
        const placeholderText = document.getElementById('placeholderText');

        changeSelfieBtn.addEventListener('click', function() {
            selfieInput.click();
        });

        selfieInput.addEventListener('change', function(event) {
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    selfiePreview.src = e.target.result;
                    selfiePreview.classList.remove('hidden');
                    placeholderText.classList.add('hidden');
                };
                reader.readAsDataURL(file);
            }
        });
    </script>
@endpush
