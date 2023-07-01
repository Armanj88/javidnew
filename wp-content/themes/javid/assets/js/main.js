// search form

jQuery(function (search){
    search("#search-btn").click(function(){
        search("#header-search").show(500);
        search("#header-search input").focus();
    })
    search("#search-close").click(function () {
        search("#header-search").hide(500)
    })
})