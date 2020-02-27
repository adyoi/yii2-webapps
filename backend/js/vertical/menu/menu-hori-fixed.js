"use strict!"
$( document ).ready(function() {
    // variable
    var noofdays = 1;                       //  total no of days cookie will store
    var Navbarbg = "themelight1";                //  navbar color                themelight1 / theme1
    var headerbg = "theme1";           //  header color                theme1 / theme2 / theme3 / theme4 / theme5 / theme6
    var menucaption = "theme1";             //  menu caption color          theme1 / theme2 / theme3 / theme4 / theme5 / theme6 / theme7 / theme8 / theme9
    var bgpattern = "theme1";               //  background color            theme1 / theme2 / theme3 / theme4 / theme5 / theme6
    var activeitemtheme = "theme1";         //  menu active color           theme1 / theme2 / theme3 / theme4 / theme5 / theme6 / theme7 / theme8 / theme9 / theme10 / theme11 / theme12
    var frametype = "theme1";               //  preset frame color          theme1 / theme2 / theme3 / theme4 / theme5 / theme6
    var layout_type = "light";              //  theme layout color          dark / light
    var layout_width = "wide";              //  theme layout size           wide / box
    var menu_effect_desktop = "shrink";     //  navbar effect in desktop    shrink / overlay / push
    var menu_effect_tablet = "overlay";     //  navbar effect in tablet     shrink / overlay / push
    var menu_effect_phone = "overlay";      //  navbar effect in phone      shrink / overlay / push
    var menu_icon_style = "st2";            //  navbar menu icon            st1 / st2
	$('.pcoded-navbar .pcoded-hasmenu').attr('subitem-icon', 'style1');
	$( "#pcoded" ).pcodedmenu({
		themelayout: 'horizontal',
		horizontalMenuplacement: 'top',
		horizontalBrandItem: true,
		horizontalLeftNavItem: true,
		horizontalRightItem: true,
		horizontalSearchItem: true,
		horizontalMobileMenu: true,
		MenuTrigger: 'hover',
		SubMenuTrigger: 'hover',
		activeMenuClass: 'active',
		ThemeBackgroundPattern: bgpattern,
		HeaderBackground: headerbg,
        LHeaderBackground: menucaption,
		NavbarBackground: Navbarbg,
		ActiveItemBackground: activeitemtheme,
		SubItemBackground: 'theme2',
        LogoTheme: 'theme1', // Value should be theme1/theme2/theme3/theme4/theme5/theme6
		menutype: menu_icon_style,
        freamtype: frametype,
		layouttype: layout_type,
		ActiveItemStyle: 'style1',
		ItemBorder: true,
		ItemBorderStyle: 'none',
		SubItemBorder: true,
		DropDownIconStyle: 'style1',
		FixedNavbarPosition: true,
		FixedHeaderPosition: true,
		horizontalNavIsCentered: false,
		horizontalstickynavigation: false,
		horizontalNavigationMenuIcon: true,
	});
    /* layout type Change function Start */
    function handlelayouttheme() {
        $('.theme-color > a.Layout-type').on("click", function() {
            var layout = $(this).attr("layout-type");
            $('.pcoded').attr("layout-type", layout);
            if (layout == 'dark') {
                $('.pcoded-header').attr("header-theme", "theme6");
                $('.pcoded-navbar').attr("navbar-theme", "theme1");
                $('.pcoded-navbar').attr("active-item-theme", "theme1");
                $('.pcoded').attr("fream-type", "theme1");
                $('body').addClass('dark');
                $('body').attr("themebg-pattern", "theme1");
                $('.pcoded-navigation-label').attr("menu-title-theme", "theme1");
            }
            if (layout == 'light') {
                $('.pcoded-header').attr("header-theme", "themelight1");
                $('.pcoded-navbar').attr("navbar-theme", "themelight1");
                $('.pcoded-navigation-label').attr("menu-title-theme", "theme2");
                $('.pcoded-navbar').attr("active-item-theme", "theme1");
                $('.pcoded').attr("fream-type", "theme1");
                $('body').removeClass('dark');
                $('body').attr("themebg-pattern", "theme1");
            }
        });
    };
    handlelayouttheme();

    /* Left header Theme Change function Start */
    function handleleftheadertheme() {
        $('.theme-color > a.leftheader-theme').on("click", function() {
            var lheadertheme = $(this).attr("menu-caption");
            $('.pcoded-navigation-label').attr("menu-title-theme", lheadertheme);
        });
    };
    handleleftheadertheme();
    /* Left header Theme Change function Close */
    /* header Theme Change function Start */
    function handleheaderthemefull() {
        $('.theme-color > a.header-theme-full').on("click", function() {
            var headertheme = $(this).attr("header-theme");
            var activeitem = $(this).attr("active-item-color");
            $('.pcoded-header').attr("header-theme", headertheme);
            $('.navbar-logo').attr("logo-theme", headertheme);
            $('.pcoded-navbar').attr("active-item-theme", activeitem);
            $('.pcoded').attr("fream-type", headertheme);
            $('body').attr("themebg-pattern", headertheme);
            if(headertheme == "theme6"){
                $('.pcoded-navbar').attr("active-item-theme", "theme1");
            }
        });
    };
    handleheaderthemefull();
    function handleheadertheme() {
        $('.theme-color > a.header-theme').on("click", function() {
            var headertheme = $(this).attr("header-theme");
            var activeitem = $(this).attr("active-item-color");
            $('.pcoded-header').attr("header-theme", headertheme);
            $('.pcoded-navbar').attr("active-item-theme", activeitem);
            $('.pcoded').attr("fream-type", headertheme);
            $('body').attr("themebg-pattern", headertheme);
            if(headertheme == "theme6"){
                $('.pcoded-navbar').attr("active-item-theme", "theme1");
            }
        });
    };
    handleheadertheme();
    /* header Theme Change function Close */
    /* Navbar Theme Change function Start */
    function handlenavbartheme() {
        $('.theme-color > a.navbar-theme').on("click", function() {
            var navbartheme = $(this).attr("navbar-theme");
            $('.pcoded-navbar').attr("navbar-theme", navbartheme);
            if (navbartheme == 'themelight1') {
                $('.pcoded-navigation-label').attr("menu-title-theme", "theme2");
            }
            if (navbartheme == 'theme1') {
                $('.pcoded-navigation-label').attr("menu-title-theme", "theme1");
            }
        });
    };

    handlenavbartheme();
    /* Navbar Theme Change function Close */
    /* Active Item Theme Change function Start */
    function handleactiveitemtheme() {
        $('.theme-color > a.active-item-theme').on("click", function() {
            var activeitemtheme = $(this).attr("active-item-theme");
            $('.pcoded-navbar').attr("active-item-theme", activeitemtheme);
        });
    };

    handleactiveitemtheme();
    /* Active Item Theme Change function Close */

    /* Theme background pattren Change function Start */
    function handlethemebgpattern() {
        $('.theme-color > a.themebg-pattern').on("click", function() {
            var themebgpattern = $(this).attr("themebg-pattern");
            $('body').attr("themebg-pattern", themebgpattern);
        });
    };

    handlethemebgpattern();
    /* Theme background pattren Change function Close */

    /* Theme Layout Change function start*/
    function handlethemeverticallayout() {
        $('#theme-layout').change(function() {
            if ($(this).is(":checked")) {
                $('.pcoded').attr('vertical-layout', "box");
                $('#bg-pattern-visiblity').removeClass('d-none');

            } else {
                $('.pcoded').attr('vertical-layout', "wide");
                $('#bg-pattern-visiblity').addClass('d-none');
            }
        });
    };
    handlethemeverticallayout();
    /* Theme Layout Change function Close*/
    /* Menu effect change function start*/
    function handleverticalMenueffect() {
        $('#vertical-menu-effect').val('shrink').on('change', function(get_value) {
            get_value = $(this).val();
            $('.pcoded').attr('vertical-effect', get_value);
        });
    };

    handleverticalMenueffect();
    /* Menu effect change function Close*/

    /* Vertical Item border Style change function Start*/
    function handleverticalboderstyle() {
        $('#vertical-border-style').val('solid').on('change', function(get_value) {
            get_value = $(this).val();
            $('.pcoded-navbar .pcoded-item').attr('item-border-style', get_value);
        });
    };

    handleverticalboderstyle();
    /* Vertical Item border Style change function Close*/

    /* Vertical Dropdown Icon change function Start*/
    function handleVerticalDropDownIconStyle() {
        $('#vertical-dropdown-icon').val('style1').on('change', function(get_value) {
            get_value = $(this).val();
            $('.pcoded-navbar .pcoded-hasmenu').attr('dropdown-icon', get_value);
        });
    };

    handleVerticalDropDownIconStyle();
    /* Vertical Dropdown Icon change function Close*/
    /* Vertical SubItem Icon change function Start*/

    function handleVerticalSubMenuItemIconStyle() {
        $('#vertical-subitem-icon').val('style5').on('change', function(get_value) {
            get_value = $(this).val();
            $('.pcoded-navbar .pcoded-hasmenu').attr('subitem-icon', get_value);
        });
    };

    handleVerticalSubMenuItemIconStyle();
    /* Vertical SubItem Icon change function Close*/
    /* Vertical Navbar Position change function Start*/
    function handlesidebarposition() {
        $('#sidebar-position').change(function() {
            if ($(this).is(":checked")) {
                $('.pcoded-navbar').attr("pcoded-navbar-position", 'fixed');
                $('.pcoded-header .pcoded-left-header').attr("pcoded-lheader-position", 'fixed');
            } else {
                $('.pcoded-navbar').attr("pcoded-navbar-position", 'absolute');
                $('.pcoded-header .pcoded-left-header').attr("pcoded-lheader-position", 'relative');
            }
        });
    };

    handlesidebarposition();
    /* Vertical Navbar Position change function Close*/
    /* Vertical Header Position change function Start*/
    function handleheaderposition() {
        $('#header-position').change(function() {
            if ($(this).is(":checked")) {
                $('.pcoded-header').attr("pcoded-header-position", 'fixed');
                $('.pcoded-navbar').attr("pcoded-header-position", 'fixed');
                $('.pcoded-main-container').css('margin-top', $(".pcoded-header").outerHeight());
            } else {
                $('.pcoded-header').attr("pcoded-header-position", 'relative');
                $('.pcoded-navbar').attr("pcoded-header-position", 'relative');
                $('.pcoded-main-container').css('margin-top', '0px');
            }
        });
    };
    handleheaderposition();
    /* Vertical Header Position change function Close*/
    /*  collapseable Left Header Change Function Start here*/
    function handlecollapseLeftHeader() {
        $('#collapse-left-header').change(function() {
            if ($(this).is(":checked")) {
                $('.pcoded-header, .pcoded ').removeClass('iscollapsed');
                $('.pcoded-header, .pcoded').addClass('nocollapsed');
            } else {
                $('.pcoded-header, .pcoded').addClass('iscollapsed');
                $('.pcoded-header, .pcoded').removeClass('nocollapsed');
            }
        });
    };
    handlecollapseLeftHeader();
    /*  collapseable Left Header Change Function Close here*/
});
function handlemenutype(get_value) {
	$('.pcoded').attr('nav-type', get_value);
};

handlemenutype("st2");
