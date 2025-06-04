// const url ='../docs/sample.pdf';
const url = document.querySelector('#pdf-url').value;

let pdfDoc = null,
pageNum = 1,
pageIsRendering = false,
pageNumIsPending = null;

const scale = 1.5,
canvas = document.querySelector('#pdf-render'),
ctx = canvas.getContext('2d');

//render page
const renderPage = num => {
    pageIsRendering = true;

    //get page
    pdfDoc.getPage(num).then(page => {
        //set scale
        const viewport = page.getViewport({scale});
        canvas.height = viewport.height;
        canvas.width = viewport.width;
        
        const renderCtx = {
            canvasContext: ctx,
            viewport
        }
        // Render PDF page into canvas context
        page.render(renderCtx).promise.then(() =>{
            pageIsRendering = false;

            if (pageNumIsPending !== null){
                renderPage(pageNumIsPending)
                pageNumIsPending = null
            }
        });

        //output current page
        document.querySelector('#page-num').textContent = num;
    });
};

//check for pages rendering
const queueRenderPage = num => {
    if (pageIsRendering){
        pageNumIsPending = num;
    }else{
        renderPage(num);
    }
}

//show previeus page
const showPrevPage = () => {
    if (pageNum <= 1) {
        return;
    }
    pageNum--;
    queueRenderPage(pageNum);
}

//show next page
const showNextPage = () => {
    if (pageNum >= pdfDoc.numPages) {
        return;
    }
    pageNum++;
    queueRenderPage(pageNum);
}

//get document
pdfjsLib.getDocument(url).promise.then(pdfDoc_ => {
    pdfDoc = pdfDoc_;
    console.log(pdfDoc);

    document.querySelector('#page-count').textContent = pdfDoc.numPages;

    renderPage(pageNum)
});

//button events
document.querySelector('#prev-page').addEventListener('click', showPrevPage);
document.querySelector('#next-page').addEventListener('click', showNextPage);



// Script untuk integrasi dengan id_document tapi belum di coba

// const id_document = 123; // Ganti dengan ID dokumen yang dinamis

// // Fungsi untuk mengambil URL dokumen dari server
// const fetchDocumentUrl = async (id_document) => {
//     try {
//         const response = await fetch(`/api/get-document/${id_document}`);
//         const data = await response.json();

//         if (response.ok) {
//             return data.url; // URL dokumen dari API
//         } else {
//             throw new Error(data.error || 'Failed to fetch document URL');
//         }
//     } catch (error) {
//         console.error('Error fetching document:', error);
//         return null;
//     }
// };

// // Load PDF setelah mendapatkan URL
// fetchDocumentUrl(id_document).then((url) => {
//     if (url) {
//         pdfjsLib.getDocument(url).promise.then((pdfDoc_) => {
//             pdfDoc = pdfDoc_;
//             document.querySelector('#page-count').textContent = pdfDoc.numPages;
//             renderPage(pageNum);
//         }).catch((err) => {
//             console.error('Error loading PDF:', err);
//         });
//     }
// });
