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
                	if (jQuery(this).parent().hasClass('active') && jQuery(this).hasClass('active')) {
                		$menuItemElement.addClass('active');
                	}
                } else {
                    $itemCloneElement = jQuery(this).clone().appendTo('.wrapper-submenu-items').attr('id', jQuery(this).attr('id') + '-total-menu');
                    if (jQuery(this).hasClass('in')) {
                        $itemCloneElement.attr('active', 'true');
                    }
                }
            });
        } else {
            jQuery('.wrapper-items').append(jQuery(this).children('a'));
        }
    });

	jQuery('.menu-close').bind('click', closeMenu);
	jQuery('.total-menu-btn').bind('click', openMenu);

	function openMenu() {
		jQuery('.total-menu-wrapper').slideDown();
	}

	function closeMenu() {
		jQuery('.total-menu-wrapper').slideUp();
	}

    function itemMenuClickEvent() {
        jQuery('*[active="true"]').removeClass('in');
        jQuery('*[active="true"]').height(0);
        jQuery('*[active="true"]').removeAttr('active');
        $menuSubmenuItem = jQuery(this).attr('href');
        console.log($menuSubmenuItem);
        jQuery($menuSubmenuItem).attr('active', 'true');
    }
});
