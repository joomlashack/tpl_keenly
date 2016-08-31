jQuery(document).ready(function($) {
    // Bing open and close Total positions

    jQuery('.menu-close').bind('click', closeMenu);

    jQuery('.total-menu-btn').bind('click', openMenu);

    function openMenu() {
        jQuery('.total-menu-wrapper').slideDown();
        alignElement(jQuery('.total-menu .menu'));
    }

    function closeMenu() {
        jQuery('.total-menu-wrapper').slideUp();
    }

    // Alignment submenu

    jQuery('.total-menu .menu > .parent').bind('hover', function () {
        alignElement(jQuery(this).children('.submenu'));
    });

    // Alignment Element

    var elementHeight, windowHeight, elementPadding;

    function alignElement(element) {
        elementHeight = element.height();
        windowHeight = jQuery(window).height();

        if (windowHeight > elementHeight) {
            elementPadding = (windowHeight - elementHeight) / 2;
            element.css({
                'padding-bottom' : elementPadding,
                'padding-top' : elementPadding
            });
        }

    }

    // Label Position

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
