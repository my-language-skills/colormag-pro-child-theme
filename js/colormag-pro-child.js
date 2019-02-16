var x = window.matchMedia("(max-width: 768px)");

window.onload = addHomeScreenButton();

function addHomeScreenButton() {

    jQuery('#header-text-nav-container .news-bar .inner-wrap').prepend('<a href="https://www.comunicavalencia.es" id="multipageMasterHome"></a>');

    colormagproChildResize(x); // Call listener function at run time
    x.addListener(colormagproChildResize); // Attach listener function on state changes 

}

window.addEventListener("resize", colormagproChildResize);

function colormagproChildResize() {

    if (x.matches) { // If media query matches
        var w = window.innerWidth;
        var wtemp = w / 10;
        w = w - wtemp;
        document.getElementById("site-navigation").style.width = "50px";
        document.getElementById("site-navigation").style.padding_left = "3%";
        if (document.getElementById("menu-primary")) {
            document.getElementById("menu-primary").style.width = w + 'px';
            document.getElementById("menu-primary").style.overflow = "hidden";
        } else if (document.getElementById("menu-primario")) {
            document.getElementById("menu-primario").style.width = w + 'px';
            document.getElementById("menu-primario").style.overflow = "hidden";
        }
    } else {
        if (document.getElementById("menu-primary")) {
            document.getElementById("menu-primary").style.width = "100%";
        } else if (document.getElementById("menu-primario")) {
            document.getElementById("menu-primario").style.width = "100%";
        }
        document.getElementById("site-navigation").style.width = "100%";
        document.getElementById("site-navigation").style.padding_left = "0";
    }
}