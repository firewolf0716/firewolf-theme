jQuery(document).ready(function($){ 
    
    // show more item function

    var size_item = $(".sub_search_conditions.todofuken .condition_item").size();
    x=4;
    $('.sub_search_conditions.todofuken .condition_item:lt('+x+')').show();

    $('#more').click(function(){

        for (var x = 5; x <= size_item; x++) {
            $('.sub_search_conditions.todofuken .condition_item:nth-of-type('+x+')').show();
        }

        $('#less').show();
        $('#more').hide();
    });

    $('#less').click(function(){

        for (var x = 5; x <= size_item; x++) {
            $('.sub_search_conditions.todofuken .condition_item:nth-of-type('+x+')').hide();
        }

        $('#more').show();
        $('#less').hide();
    });

});