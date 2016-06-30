jQuery(document).ready(function($) {
    $totalMenu = jQuery('.wrapper-submenu-items').children('.moduletable').children('.menu').children();
    $hoveredParent = $();
    colapsedMenu = '';

    // Rendering menu

    jQuery($totalMenu).each(function() {


        if (jQuery(this).hasClass('parent')) {
            //Menu item submenu
            $menuParent = jQuery(this).children();

            jQuery(this).bind('click', clickColapse);
            $menuItemElement = jQuery(this).clone().appendTo('.wrapper-items .menu').bind('mouseenter', itemMenuHover);
            $menuItemLinkItem = $menuItemElement.attr('href');
            $menuItemElement.attr('id', $menuItemLinkItem);
            if (checkingClass(jQuery(this).parent(), 'active')) {
                $menuItemElement.addClass('active');
            }

        } else {
            $linkItemMenu = jQuery(this).clone().appendTo('.wrapper-items .menu').bind('mouseenter', itemMenuHover);
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
        innerModulePosition();
        absoluteSpace();
    }

    function closeMenu() {
        jQuery('.total-menu-wrapper').slideUp();
    }

    // Responsive view collapse items.

    function clickColapse() {
        colapsedMenu = jQuery(this).attr('href');
    }

    // Selected item detects the menu that is open close it and open the corresponding item.
    function itemMenuHover(event) {
        $menuSubmenuItem = jQuery(this).attr('class').replace(/active|deeper|parent|dropdown|current/g, '');
        jQuery('.menu-items .menu > li').removeClass('show-submenu');
        jQuery('.submenu-items .menu > li').removeClass('show-submenu');
        jQuery('.' + $menuSubmenuItem).addClass('show-submenu');

        if (checkingClass(jQuery(this), 'parent')) {
            jQuery('.total-menu-inner').children('.moduletable').css({
                opacity: 0.2
            });
        } else {
            jQuery('.total-menu-inner').children('.moduletable').css({
                opacity: 1
            });
        }
    }

    function absoluteSpace() {
        absoluteHeight = jQuery('.total-menu-inner').children().height();
        jQuery('.total-menu-inner').height(absoluteHeight);
    }

    jQuery(window).resize(function() {
        absoluteSpace();
        innerModulePosition();
    });


    function innerModulePosition() {
        if (jQuery(window).width() > 768) {
            containerWidth = jQuery('.submenu-items').width();
            moduleWidth = jQuery('.total-menu-inner').children('.moduletable').width();
            marginLeftRight = (containerWidth - moduleWidth) / 2;
            jQuery('.total-menu-inner').children('.moduletable').attr('style', 'margin-left:' + marginLeftRight + 'px;margin-right:' + marginLeftRight + 'px;');
        } else {
            jQuery('.total-menu-inner').children('.moduletable').removeAttr('style');
            jQuery('.in').each(function() {
                if (jQuery(this).attr('id') != colapsedMenu) {
                    jQuery(this).removeClass('in');
                }
            });
        }
    }

    jQuery('.label-position').hover(function() {
        jQuery('body').toggleClass('bd-color-one');
        jQuery('.wrapper-toolbar .navbar-inner').toggleClass('bg-color-one');
    });

});

if (typeof isHoverEvent !== 'undefined') {
    if (isHoverEvent) {

        var JCaption = function(c) {
            return;
        }

        jQuery(window).load(function($) {
            $imgToHover = jQuery('img[class="caption "]');
            $imgToHover.push(jQuery('#full-image-img'));
            $imgToHover.each(function() {
                imgTitleCaption = jQuery(this).attr('title');
                imgCaption = '';
                if (jQuery(this).attr('alt')) {
                    imgCaption = '<p>' + jQuery(this).attr('alt') + '</p>'
                    $currentImage = jQuery(this).slice(-2).wrap('<div class="grid"><figure class="effect-bubba"></figure></div>');
                    jQuery(this).parent().append('<figcaption><h2>' + imgTitleCaption + '</h2>' + imgCaption + '</figcaption>');
                    jQuery('p[class="img_caption"]').remove();
                }
            });
        });
    }
}
