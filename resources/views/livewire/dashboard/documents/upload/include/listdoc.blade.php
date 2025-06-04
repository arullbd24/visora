<div x-show="files.length" class="file-list-section mt-5 w-full">
    <div class="NextAction flex items-center gap-3">
        <div class="SetingPlacement text-white text-xs">
            <button class="bg-indigo-600 rounded-lg p-2">Setting Placement</button>
        </div>
        <div class="Addfile text-white text-xs">
            <button @click="triggerFileInput()" class="add-more-btn bg-blue-600 rounded-lg p-2">Add More File</button>
        </div>
    </div>
    <div class="bg-white rounded-lg shadow-md p-3 mt-4">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-4 border-b pb-2">
            <div class="font-semibold text-gray-600 text-md col-span-1">
                <p>No.</p>
            </div>
            <div class="font-semibold text-gray-600 text-md text-left col-span-2">
                <p>Document</p>
            </div>
            <div class="font-semibold text-gray-600 text-md col-span-1">
                <p>Status</p>
            </div>
        </div>
        <div class="file-list">
            <template x-for="(file, index) in files" :key="file.name">
                <div class="grid grid-cols-1 md:grid-cols-4 gap-4 border-b py-2 text-md">
                    <div x-text="index + 1" class="text-gray-700 col-span-1">
                        <p></p>
                    </div>
                    <div x-text="file.name" class="text-gray-700 text-left col-span-2"> 
                        <p></p>
                    </div>
                    <div class="text-yellow-500 col-span-1">
                        <p>Waiting</p>
                    </div>
                </div>
            </template>
        </div>
    </div>                  
</div>