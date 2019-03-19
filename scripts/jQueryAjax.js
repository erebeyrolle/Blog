$('#OKbtn').click(function() {
    jQuery.ajax({

        url: "controllers/article_show_ajax_jquery.php",
        type: "POST",
        //dataType: "json",
        // data:{
        //     title:$("#title").val(),
        //     content:$("#content").val()
        // },
        success: function(article) {
            //response = jQuery.parseJSON(article);
            //alert(response.title);
            //alert(response.content);
            alert(article.title);
            alert(article.content);
            $('.card-title:first').text(article.title);
            $('.card-text:first').text(article.content);
            $('.col-md-4').clone().appendTo('#newCard');




        },
        //Return Error Function
        error: function(error, x, y) {
            alert(error, x, y);
        }
    });
});