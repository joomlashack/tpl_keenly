jQuery(document).ready(function($) {
    $totalMenu = jQuery('.moduletable_ktotalmenu').children('.menu').children();
    jQuery('.total-menu-wrapper').append('<div class="total-menu-container"><div class="menu-close"><i class="icon-remove"></i></div><div class="menu-items"><div class="wrapper-items"></div></div><div class="submenu-items"><div class="wrapper-submenu-items"></div></div></div>');

    // Rendering menu 
    jQuery($totalMenu).each(function() {
        if (jQuery(this).hasClass('parent')) {
            //Menu item submenu
            $menuParent = jQuery(this).children();
            jQuery($menuParent).each(function() {
                if (jQuery(this).is('a')) {
                    $menuItemElement = jQuery(this).clone().appendTo('.wrapper-items').attr('href', jQuery(this).attr('href') + '-total-menu').bind('click', itemMenuClickEvent);
                    if (checkingClass(jQuery(this).parent(), 'active')) {
                        $menuItemElement.addClass('active');
                    }
                } else {
                    $itemCloneElement = jQuery(this).clone().appendTo('.wrapper-submenu-items').attr('id', jQuery(this).attr('id') + '-total-menu');
                    if (jQuery(this).hasClass('in')) {
                        $itemCloneElement.addClass('active-menu');
                    }
                    jQuery(this).children().each(function () {
                    	if (checkingClass(jQuery(this), 'deeper')) {
                    		jQuery(this).children('a').attr('href', jQuery(this).attr('href') + '-total-menu');
                    		jQuery(this).children('ul').attr('id', jQuery(this).attr('id') + '-total-menu');
                    	}
                    });
                }
            });
        } else {
            $linkItemMenu = jQuery(this).children('a').clone().appendTo('.wrapper-items');
            if (checkingClass(jQuery(this), 'active')) {
                $linkItemMenu.addClass('active');
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
    function itemMenuClickEvent() {
        jQuery('.active-menu').removeClass('in');
        jQuery('.active-menu').height(0);
        jQuery('.active-menu').removeClass('active-menu');
        $menuSubmenuItem = jQuery(this).attr('href');
        jQuery($menuSubmenuItem).addClass('active-menu');
    }
});
