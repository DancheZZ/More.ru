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

    $(document).mouseup(function (e) {
    var container = $('.popup-fade');
    if (container.has(e.target).length === 0)
    {
        container.fadeOut();     
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

var error = 0;

function validate_email(){
    var mail = $("#email1");
    var em = $("#mail_error");  
    var sub = $("#sub");
    em.remove();
    var pattern = /^[a-z0-9_-]+@[a-z0-9-]+\.[a-z]{2,6}$/i;
    var div = $("#block_header");
    var p = $("<p></p>");
    var reg = $("#registr");
        if (mail.val().search(pattern) == -1){
            p.attr("id", "mail_error");
            mail.focus();
            div.css("height", "640px");
            p.html("Неверно введен mail");
            p.css("color", "red");
            mail.parent().append(p);
            error += 1;
            sub.attr("disabled", "disabled");
            reg.css("height", "860px");
            return false;
        }
    error = 0;
    reg.css("height", "740px");
    div.css("height", "520px");
    sub.removeAttr('disabled');
}

function validate_phone(){
    var phone = $("#phone1");
    var em = $("#phone_error");  
    var sub = $("#sub");
    var reg = $("#registr");
    em.remove();
    var pattern = /^(\+7|7|8)?[\s\-]?\(?[489][0-9]{2}\)?[\s\-]?[0-9]{3}[\s\-]?[0-9]{2}[\s\-]?[0-9]{2}$/;
    var p = $("<p></p>");
    var div = $("#block_header");
    var sub = $("#sub");
    var reg = $("#registr");
        if (phone.val().search(pattern) == -1){
            p.attr("id", "phone_error");
            div.css("height", "640px");
            reg.css("height", "860px");
            phone.focus();
            p.html("Неверно введен телефон");
            p.css("color", "red");
            phone.parent().append(p);
            error = error + 1;
            sub.attr("disabled", "disabled");
            return false;
        }
    error = 0;
    reg.css("height", "740px");
    div.css("height", "520px");
    sub.removeAttr('disabled');
}


function validate_password(){
    var pas1 = $("#password1");
    var pas2 = $("#password-confirm1");
    var em = $("#pas_error");  
    var sub = $("#sub");
    var div = $("#block_header");
    var reg = $("#registr");
    em.remove();
    var p = $("<p></p>");
        if (pas1.val() != pas2.val()){
            div.css("height", "640px");
            p.attr("id", "pas_error");
            p.html("Пароли не совпадают");
            p.css("color", "red");
            pas2.parent().append(p);
            reg.css("height", "860px");
            error += 1;
            sub.attr("disabled", "disabled");
            return false;
        }
    error = 0;
    reg.css("height", "740px");
    div.css("height", "520px");
    sub.removeAttr('disabled');
}

function proverka(){
    var sub = $("#sub");
    var surname = $("#surname1");
    var name = $("#name1");
    var phone = $("#phone1");
    var email = $("#email1");
    var password = $("#password1");
    var name = $("#password-confirm1");

    if ((surname.val() == "")||(name.val() == "")||(phone.val() == "")||(email.val() == "")||(password.val() == "")){
        sub.attr("disabled", "disabled");
        return false;
    }

    if (error != 0){
        sub.attr("disabled", "disabled");
        return false;
    }
}

function prov(){
    var mail = $("#email2");
    var sub = $("#sub1");
    if (mail.val() == ""){
        sub.attr("disabled", "disabled");
        return false;
    }
    alert("Ваш вопрос уже расматривается!");
}

function validate_email_quest(){
    var mail = $("#email2");
    var em = $("#mail_gue_error");  
    var sub = $("#sub1");
    em.remove();
    var pattern = /^[a-z0-9_-]+@[a-z0-9-]+\.[a-z]{2,6}$/i;
    var p = $("<p></p>");
        if (mail.val().search(pattern) == -1){
            p.attr("id", "mail_gue_error");
            mail.focus();
            p.html("Неверно введен mail");
            p.css("color", "red");
            p.css("margin-top", "-100px");
            mail.parent().append(p);
            error += 1;
            return false;
        }
    error = 0;
    sub.removeAttr('disabled');
}