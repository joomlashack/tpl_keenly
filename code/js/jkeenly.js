jQuery(document).ready(function($) {
    $totalMenu = jQuery('.moduletable_ktotalmenu').children('.menu').children();
    $hoveredParent = $();
    // Rendering menu 
    jQuery($totalMenu).each(function() {
        if (jQuery(this).hasClass('parent')) {
            //Menu item submenu
            $menuParent = jQuery(this).children();
            jQuery($menuParent).each(function() {
                if (jQuery(this).is('a')) {
                    $menuItemElement = jQuery(this).clone().appendTo('.wrapper-items').bind('mouseenter', itemMenuClickEvent);
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

    // Selected item detects the menu that is open close it and open the corresponding item.
    function itemMenuClickEvent(event) {
        if (!checkingClass(jQuery(this),'active')) {
            jQuery(this).addClass('active');
            $hoveredParent.removeClass('active');
            $hoveredParent = jQuery(this);
        }
        jQuery('.active-menu').removeClass('in');
        jQuery('.active-menu').removeClass('active-menu');
        $menuSubmenuItem = jQuery(this).attr('href');
        jQuery($menuSubmenuItem).addClass('active-menu');
        jQuery($menuSubmenuItem).addClass('in');
    }
});
