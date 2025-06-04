
function handleFileUpload(event, handleToken, handleTarget) {
    let varChunkSize = 2 * 1024 * 1024;
    let varSimultaneousUp = 4;
    $jq('#id-ctr_upDocsNProgress').css('display', 'block');
    document.getElementById('context-uploadDocs-menu').style.opacity = '0';
    document.getElementById('context-uploadDocs-menu').style.visibility = 'hidden';
    
    let var_idUpload = randStrNum(32);
    
    this.file = event.target.files[0];
    event.target.value = '';
    const newElemntFP = createElementUpload(this.file);
    
    var r = new Resumable({
        headers: {
            'X-CSRF-TOKEN': handleToken
        },
        target: handleTarget,
        query:{
            _token: handleToken,
            key_chunk: var_idUpload
        },
        testChunks: false,
        chunkSize: varChunkSize,
        simultaneousUploads: varSimultaneousUp,
        // throttleProgressCallbacks: 1,
        maxChunkRetries: 3,
        chunkRetryInterval: 2000,
    });
    
    r.addFile(this.file);
    
    r.on('fileAdded', function(file, event) {
        r.upload();
    });
    
    r.on('fileProgress', (file) => {
        let progressUp = Math.floor(file.progress() * 100);
        $jq(`#${newElemntFP} .progressText p`).html(progressUp);
        $jq(`#${newElemntFP} .progressBar`).css('width', `${progressUp}%`);
    });

    r.on('fileSuccess', (file) => {
        console.log('File uploaded successfully');
        // $jq(`#${newElemntFP}`).removeClass('bg-gray-100').addClass('bg-green-100');
        $jq(`#${newElemntFP} .progressText p`).html('').addClass('fas fa-check text-green-600 text-lg');
        // $jq(`#${newElemntFP} .progressBar`).css({
        //     'background-color': `green`,
        //     'border-top-right-radius': '0px',
        //     'border-bottom-right-radius': '0px'
        // });
        $jq(`#${newElemntFP} .progressBar`).remove();
    });

    r.on('fileError', (file, message) => {
        console.log('Upload error:', message);
        // $jq(`#${newElemntFP}`).removeClass('bg-gray-100').addClass('bg-red-100');
        $jq(`#${newElemntFP} .progressText p`).html('').addClass('fas fa-xmark text-red-600 text-lg');
        // $jq(`#${newElemntFP} .progressBar`).css({
        //     'background-color': `red`,
        //     'border-top-right-radius': '0px',
        //     'border-bottom-right-radius': '0px'
        // });
        $jq(`#${newElemntFP} .progressBar`).remove();
    });
}

function randStrNum(length, withLower = true) {
    let characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    if (withLower) {
        characters += 'abcdefghijklmnopqrstuvwxyz';
    }
    
    let result = '';
    for (let i = 0; i < length; i++) {
        const randomIndex = Math.floor(Math.random() * characters.length);
        result += characters[randomIndex];
    }
    
    return result;
}

function createElementUpload(fileUpload) {
    let namefile = fileUpload.name;
    let typefile = fileUpload.type.split('/');
    
    const parentDocsProgress = $jq('#id-cMainUploadDocsProgress');
    const elmFileProgress = parentDocsProgress.find('.itmUploadProgress');
    const idElmnCreate = `id-itmUpFileProgress-${elmFileProgress.length}`;
    let iconFile = getIconFile(typefile);
    
    parentDocsProgress.append(`
        <div id="${idElmnCreate}" class="itmUploadProgress flex items-center justify-between px-4 py-2 bg-gray-100 gap-2 relative">
            <div class="file flex items-center gap-2 flex-grow">
                <div class="icon text-xl shrink-0 text-red-800">
                    <i class="fas ${iconFile}"></i>
                </div>
                <p class="line-clamp-1 text-sm flex-grow">${namefile}</p>
            </div>
            <div class="progressText text-sm shrink-0">
                <p>0</p>
            </div>
            
            <i class="progressBar absolute bottom-0 left-0 h-1 bg-black transition-all" style="width: 0%; background-color: blue; border-top-right-radius: 9999px; border-bottom-right-radius: 9999px;"></i>
        </div>
    `);
    
    return idElmnCreate;
}

function getIconFile(typefile) {
    switch (typefile[0]) {
        case 'image':
            return 'fa-file-image';
        case 'video':
            return 'fa-file-video';
        case 'audio':
            return 'fa-audio';
        case 'application':
            if (['zip', 'x-rar-compressed', 'x-zip-compressed', 'x-7z-compressed'].includes(typefile[1])) {
                return 'fa-file-zipper';
            } else if (typefile[1] === 'pdf') {
                return 'fa-file-pdf';
            } else if (['msword', 'vnd.openxmlformats-officedocument.wordprocessingml.document'].includes(typefile[1])) {
                return 'fa-file-word';
            } else if (['vnd.ms-excel', 'vnd.openxmlformats-officedocument.spreadsheetml.sheet'].includes(typefile[1])) {
                return 'fa-file-excel';
            } else if (['vnd.ms-powerpoint', 'vnd.openxmlformats-officedocument.presentationml.presentation'].includes(typefile[1])) {
                return 'fa-file-powerpoint';
            } else if (['csv', 'vnd.ms-excel.sheet.binary.macroenabled.12'].includes(typefile[1])) {
                return 'fa-file-csv';
            }
        case 'text':
            if (typefile[1] === 'csv') {
                return 'fa-file-csv';
            }
            return 'fa-file-alt';
        default:
            return 'fa-file';
    }
    
    return 'fa-file';
}