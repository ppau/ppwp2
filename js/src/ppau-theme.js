var $ = jQuery;

$(function(){
    // Drawer menu collapse toggle.
    $(".menu-item-has-children").each(function(){
        var submenu = $(this).find(".sub-menu:first");
        $(submenu).toggleClass('hidden');
        var a = $(this).find("a:first").click(function(e){
            $(submenu).toggleClass('hidden');
            e.preventDefault();
            return false;
        });
    });

    // Drawer close button
    $("#drawer_close_button").click(function(){
        var layout = document.querySelector('.mdl-layout');
        layout.MaterialLayout.toggleDrawer();
    });

    // IE viewport fix
    (function() {
      if (navigator.userAgent.match(/IEMobile\/10\.0/)) {
        var msViewportStyle = document.createElement("style");
        msViewportStyle.appendChild(
          document.createTextNode("@-ms-viewport{width:auto!important}")
        );
        document.getElementsByTagName("head")[0].appendChild(msViewportStyle);
      }
    })();

});

