// search form

jQuery(document).ready(function() {

    jQuery(function (search){
        search("#search-btn").click(function(){
            search("#header-search").show(500);
            search("#header-search input").focus();
        })
        search("#search-close").click(function () {
            search("#header-search").hide(500)
        })
    });


    jQuery('#header-search').on('click', function(event) {
       if (!jQuery(event.target).is("#searchform-input-header")) {
           jQuery('#header-search').hide(500);
       }
    });
});


