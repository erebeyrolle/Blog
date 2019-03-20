// Création variable id pour PHP
var idNew = 1000;
$(document).ajaxStart(function(){
    $('.sr-only').show();
    $('#OKbtn').hide();
});
$('#OKbtn').click(function() {
    jQuery.ajax({

        url: "controllers/article_show_ajax_jquery.php",
        type: "POST",
        dataType: "json",
         data:{
        //     title:$("#title").val(),
        //     content:$("#content").val()
            // Envoi de l'id à php
            id : idNew
         },
        success: function(article) {
            //Bouclage de la réponse qui est un objet avec ses attributs         
            for(var i=0; i<3; i++){
            
            $('.card-title:first').html(article[i].title);
            $('.card-text:first').html(article[i].content);
            $('.col-md-4:first').clone().attr('id','article '+article[i].id).appendTo('#newCard').css('display','inherit');
            // Modification id à chaque itération de la boucle FOR
            idNew = article[i].id;
            }
            
        },
        //Return Error Function
        error: function(error, x, y) {
            alert( x, y);
        }
    });
});