jQuery(document).ready(function($) {
    $totalMenu = jQuery('.wrapper-submenu-items').children('.moduletable').children('.menu').children();
    $hoveredParent = $();
    // Rendering menu 
    jQuery($totalMenu).each(function() {
        if (jQuery(this).hasClass('parent')) {
            //Menu item submenu
            $menuParent = jQuery(this).children();
            jQuery($menuParent).each(function() {
                if (jQuery(this).is('a')) {
                    jQuery(this).bind('click', clickColapse);
                    $menuItemElement = jQuery(this).clone().appendTo('.wrapper-items').bind('mouseenter', itemMenuClickEvent);
                    $menuItemLinkItem = $menuItemElement.attr('href');
                    $menuItemElement.attr('id', '#' + $menuItemLinkItem);
                    $menuItemElement.attr('href', '#');
                    if (checkingClass(jQuery(this).parent(), 'active')) {
                        $menuItemElement.addClass('active');
                        $menuItemElement.addClass('current-active');
                    }
                } else {
                    if (jQuery(this).hasClass('in')) {
                        jQuery(this).addClass('active-menu');
                    }
                }
            });
        } else {
            $linkItemMenu = jQuery(this).children('a').clone().appendTo('.wrapper-items').bind('mouseenter', itemMenuClickEvent);;
            if (checkingClass(jQuery(this), 'active')) {
                $linkItemMenu.addClass('active');
                $linkItemMenu.addClass('current-active');
            }
        }
    });

    // Bing open and close functions
    jQuery('.menu-close').bind('click', closeMenu);
    jQuery('.total-menu-btn').bind('click', openMenu);

    function checkingClass(element, checkClass) {
        if (jQuery(element).hasClass(checkClass)) {
            return true;
        }
        return false;
    }

    // Action functions 
    function openMenu() {
        jQuery('.total-menu-wrapper').slideDown();
    }

    function closeMenu() {
        jQuery('.total-menu-wrapper').slideUp();
    }

    // Responsive view collapse items.

    function clickColapse(event) {

    }

    // Selected item detects the menu that is open close it and open the corresponding item.
    function itemMenuClickEvent(event) {
        if (!checkingClass(jQuery(this), 'active')) {
            jQuery(this).addClass('active');
            $hoveredParent.removeClass('active');
            $hoveredParent = jQuery(this);
        }
        jQuery('.active-menu').removeClass('in');
        jQuery('.active-menu').removeClass('active-menu');
        if (jQuery(this).attr('id')) {
            $menuSubmenuItem = jQuery(this).attr('id').replace(/#/g, '');
            jQuery('#' + $menuSubmenuItem).addClass('active-menu');
            jQuery('#' + $menuSubmenuItem).addClass('in');
        }
    }

    if (typeof isHoverEvent !== 'undefined') {
        console.log(isHoverEvent);
        if (isHoverEvent) {
            jQuery('.caption').each(function() {
                imgTitleCaption = jQuery(this).attr('title');
                imgCaption = '';
                if (jQuery(this).attr('alt')) {
                    imgCaption = '<p>' + jQuery(this).attr('alt') + '</p>'
                }
                $currentImage = jQuery(this).wrap('<div class="grid"><figure class="effect-bubba"></figure></div>');
                jQuery(this).parent().append('<figcaption><h2>' + imgTitleCaption + '</h2>' + imgCaption + '</figcaption>');
            });
        }
    }

});
