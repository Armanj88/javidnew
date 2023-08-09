// function responsive_menu_open(){
//     let responsive_menu = document.getElementById('responsive-menu');
//     if (responsive_menu.className === "responsive-menu") {
//         responsive_menu.className += " opened";
//     } else {
//         responsive_menu.className = "responsive-menu";
//     }
// }

jQuery(document).ready(function(){
    jQuery('body').on('click', function(event){
        let responsive_menu = document.getElementById('responsive-menu');
        if (!jQuery(event.target).is("#responsive-menu-icon")) {
            if (!jQuery(event.target).is('.menu-item')) {
                if (responsive_menu.className === "responsive-menu opened") {
                    responsive_menu.className = "responsive-menu";
                }
            }
        }
    });
    jQuery('#responsive-menu-icon').on('click', function(event) {
        let responsive_menu = document.getElementById('responsive-menu');
        if (responsive_menu.className === "responsive-menu") {
            responsive_menu.className += " opened";
        } else {
            responsive_menu.className = "responsive-menu";
        }
    });
    jQuery('#responsive-menu-icon-fa').on('click', function(event) {
        let responsive_menu = document.getElementById('responsive-menu');
        if (responsive_menu.className === "responsive-menu") {
            responsive_menu.className += " opened";
        } else {
            responsive_menu.className = "responsive-menu";
        }
    });
    jQuery(document).ready(function(){
        jQuery('#responsive-menu ul li').click(function(event){
            let class_name = event.target.className;
            let classes = class_name.split(' ');
            let class_id = classes[classes.length - 1];
            jQuery(`#responsive-menu .${class_id} > ul`).toggle(500);
        })
    });
});