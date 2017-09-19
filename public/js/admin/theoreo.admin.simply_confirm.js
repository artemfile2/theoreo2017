function simply_confirm(url, elem, question, title, success_mess, error_mess) {
    $.prompt(question, {
        title: title,
        buttons: { "Да!": true, "Отменить": false },
        submit: function(e,v,m,f){
            if(v){
                $.get(url, function( data ) {
                    if($.isNumeric(data)){
                        if(data >0){
                            elem.slideUp();
                            $.prompt(success_mess);
                        }else{
                            $.prompt(error_mess);
                        }
                    }else{
                        $.prompt(data);
                    }
                });
            }
        }
    });
}
