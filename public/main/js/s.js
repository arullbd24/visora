let $SIDEBAR_DASHBOARD = $("#id-asideNavDashboard");
let testQuerySelectory = document.querySelector('.ctr-asideNavDashboard');
console.log($SIDEBAR_DASHBOARD);
console.log(testQuerySelectory);

let windowWSize = window.innerWidth;
if (windowWSize <= 640) {
    console.log('Windows <= 640');
    $SIDEBAR_DASHBOARD.addClass('w-0 -translate-x-full').removeClass('w-auto w-80 translate-x-0');
}
if (windowWSize <= 1280) {
    console.log('Windows <= 1280');
    $SIDEBAR_DASHBOARD.addClass('w-auto translate-x-0').removeClass('w-80 w-0 -translate-x-full');
}
if (windowWSize > 1280) {
    console.log('Windows > 1280');
    $SIDEBAR_DASHBOARD.addClass('w-80').removeClass('w-0 w-auto -translate-x-full');
}

$('#btn-shwSidebarDashboard').click((e) => {
    e.preventDefault();
    const $BTN_CLCK = $(e.target).closest('#btn-shwSidebarDashboard');
    
    if (windowWSize <= 640) {
        $SIDEBAR_DASHBOARD.addClass('w-0').removeClass('');
    };
});

$(window).resize(function () {
    windowWSize = window.innerWidth;
    console.log(windowWSize);
    
    if (windowWSize <= 640) {
        console.log('Windows <= 640');
        $SIDEBAR_DASHBOARD.addClass('w-0 -translate-x-full').removeClass('w-auto w-80 translate-x-0');
    }
    if (windowWSize <= 1280) {
        console.log('Windows <= 1280');
        $SIDEBAR_DASHBOARD.addClass('w-auto translate-x-0').removeClass('w-80 w-0 -translate-x-full');
    }
    if (windowWSize > 1280) {
        console.log('Windows > 1280');
        $SIDEBAR_DASHBOARD.addClass('w-80').removeClass('w-0 w-auto -translate-x-full');
    }
});