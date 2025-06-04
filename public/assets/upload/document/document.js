$(document).ready(function() {
    // Tambahkan log untuk memastikan jQuery sudah aktif
    console.log("jQuery is ready!");

    // Event change pada input file
    $('#file').on('change', function() {
        console.log("File input triggered!");

        // Mendapatkan nama file
        var fileName = $(this).val().split('\\').pop();
        console.log("Selected file:", fileName);
        
        // Sembunyikan form upload dan tampilkan tampilan dokumen
        $('#selectDocument').hide();
        $('#documentPreview').removeClass('hidden');
        
        // Menampilkan nama file di tabel
        $('#documentName').text(fileName);
    });
});




// $('#file').change(function() {
//     // Memeriksa apakah event dipicu
//     console.log('File input changed!');
    
//     // Mendapatkan nama file
//     var fileName = $(this).val().split('\\').pop();
//     console.log('Selected file:', fileName);
    
//     // Sembunyikan form upload dan tampilkan tampilan dokumen
//     $('#selectDocument').hide();
//     $('#documentPreview').removeClass('hidden');
    
//     // Menampilkan nama file di tabel
//     $('#documentName').text(fileName);
// });


// $('#file').change(function() {
//     // Mendapatkan nama file
//     var fileName = $(this).val().split('\\').pop();
    
//     // Sembunyikan form upload dan tampilkan tampilan dokumen
//     $('#selectDocument').hide();
//     $('#documentPreview').removeClass('hidden');
    
//     // Menampilkan nama file di tabel
//     $('#documentName').text(fileName);
// });