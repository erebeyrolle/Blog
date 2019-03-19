$('#OKbtn').click(function(){
    
        $.ajax({
            url:"controllers/article_show_ajax_jquery.php",
            type:"POST",
            // data:{
            //     title:$("#title").val(),
            //     content:$("#content").val()
            // },
            success : function(article){
                //console.log(article);
                alert('OK');
                alert('article');
                $('.card-title:first').text(article.title);
                $('.card-text:first').text(article.content);
                $('.col-md-4').clone().appendTo('#newCard');




            },
            dataType: "json"
            }
        );
    }
);
