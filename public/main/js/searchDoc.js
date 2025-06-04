$jq('.searchFieldDashboard').on('input', 'input', (e) => {
    const field = $jq(e.target).closest('.searchFieldDashboard');
    const elemnInp = $jq(e.target);
    
    if (elemnInp.val()) {
        elemnInp.removeClass('w-0 focus:w-auto');
        field.removeClass('focus-within:px-2 rounded-lg focus-within:rounded-full').addClass('px-2 rounded-full');
    } else {
        elemnInp.addClass('w-0 focus:w-auto');
        field.removeClass('px-2 rounded-full').addClass('focus-within:px-2 rounded-lg focus-within:rounded-full');
    }
});