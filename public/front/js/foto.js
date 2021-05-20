$(document).ready(function($) {
    $('.popup-open').click(function() {
        $('.popup-fade').fadeIn();
        return false;
    }); 
    
    $('.popup-close').click(function() {
        $(this).parents('.popup-fade').fadeOut();
        return false;
    });     

    $(document).keydown(function(e) {
        if (e.keyCode === 27) {
            e.stopPropagation();
            $('.popup-fade').fadeOut();
        }
    });
});

function registr(){
    var reg = $("#registr");
    var ent = $("#entry");
    reg.css("display", "none");
    ent.css("display", "block");
    reg.append();
    ent.append();
}

function entry(){
    var reg = $("#registr");
    var ent = $("#entry");
    reg.css("display", "block");
    ent.css("display", "none");
    reg.append();
    ent.append();

}