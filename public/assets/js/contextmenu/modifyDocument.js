$jq(document).on('contextmenu', '.itm-documentData', (e) => {
    e.preventDefault();
    const $elmItem = $jq(e.target).closest('.itm-documentData');
    const $contextElement = $jq('#context-modifyDocs-menu');
    if ($elmItem) {
        hideAllCustomContextElement();
        
        window.event.returnValue = false;
        const attrDataDocAction = $elmItem.attr('data-document-action');
        $contextElement.attr('data-document-action', attrDataDocAction);
        
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

$jq(document).on('mouseenter', '.itmContextModify.group', (e) => {
    const $contextElement = $jq(e.target).closest('.itmContextModify');
    const $detailElement = $contextElement.find('.detailItmContextModify');
    
    const contextMenuWidth = $contextElement.outerWidth();
    const contextMenuHeight = $contextElement.outerHeight();
    
    const detailMenuWidth = $detailElement.outerWidth();
    const detailMenuHeight = $detailElement.outerHeight();
    
    const screenWidth = $jq(window).width();
    const screenHeight = $jq(window).height();
    
    let x = e.clientX;
    let y = e.clientY;
    
    let cssVal = {
        'padding-left': '4px',
        'padding-right': 'auto',
        left: '100%',
        right: 'auto'
    };
    
    if (x + contextMenuWidth + detailMenuWidth > screenWidth) {
        cssVal = {
            'padding-left': 'auto',
            'padding-right': '4px',
            left: 'auto',
            right: '100%'
        }
    }

    if (y + contextMenuHeight + detailMenuHeight > screenHeight) {
        y = screenHeight - contextMenuHeight + detailMenuHeight;
    }
    
    $detailElement.css(cssVal);
});