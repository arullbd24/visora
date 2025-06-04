$jq(document).on('contextmenu', function(e) {
    const $contextElement = $jq('#context-uploadDocs-menu');
    if ($jq(e.target).closest('.itm-documentData').length) {
        return;
    }
    if ($contextElement) {
        e.preventDefault();
        window.event.returnValue = false;
        hideAllCustomContextElement();
        
        const menuWidth = $contextElement.outerWidth();
        const menuHeight = $contextElement.outerHeight();
        const screenWidth = $jq(window).width();
        const screenHeight = $jq(window).height();
        
        let x = e.clientX;
        let y = e.clientY;
        
        if (x + menuWidth > screenWidth) {
            x = screenWidth - menuWidth;
        }

        if (y + menuHeight > screenHeight) {
            y = screenHeight - menuHeight;
        }

        $contextElement.css({
            top: y + 'px',
            left: x + 'px',
        });
        
        setTimeout(() => {
            $contextElement.css({
                opacity: '1',
                visibility: 'visible',
            });
        }, 150);
    }
});