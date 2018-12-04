window.onload = addHomeScreenButton();

function addHomeScreenButton() {
    
    if(window.location.href === "https://www.comunicavalencia.es"){
        jQuery('#header-text-nav-container .news-bar .inner-wrap').prepend('<a href="https://www.comunicavalencia.es" id="multipageMasterHome"></a>');
    }
    
}