$('.form-input ').on('input', 'input', (e) => {
    const field = $(e.target).closest('.form-input ');
    const elemnInp = $(e.target);
    const elmnLabel = field.find('label');
    
    if (elemnInp.val()) {
        elemnInp.removeClass('bg-slate-100').addClass('bg-slate-100');
        elmnLabel.removeClass('top-1/2 peer-focus:-top-1/4').addClass('-top-1/4 text-white');
    } else {
        elemnInp.removeClass('bg-slate-100').addClass('bg-slate-100');
        elmnLabel.removeClass('-top-1/4 text-white').addClass('top-1/2 peer-focus:-top-1/4');
    }
});