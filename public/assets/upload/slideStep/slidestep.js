$jq(document).ready(function() {
    $jq('#selectDocument').on('click', function(e) {
        e.preventDefault(); // Mencegah fungsi default dari tag <a>

        $jq('.mainSlide1').removeClass('bg-blue-500 text-white').addClass('bg-slate-300 text-black');
        $jq('.mainSlide2').removeClass('bg-slate-300 text-black').addClass('bg-blue-500 text-white');
        $jq('.mainSlide3').removeClass('bg-slate-300 text-black').addClass('bg-blue-500 text-white');

        window.location.href = 'sign.blade.php';
    });
});
