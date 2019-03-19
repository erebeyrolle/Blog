<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Mon Blog - Articles</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet"  href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
                            integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
                            crossorigin="anonymous">
    <link   rel="stylesheet"    href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
                                integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr"
                                crossorigin="anonymous">   
    <link rel="stylesheet" type="text/css" media="screen" href="CommentsBoot.css" />
</head>

<body>
    <header>
        <!-- Fixed navbar -->
        <nav class=" navbar navbar-expand-md navbar-dark fixed-top bg-dark">
            <a class="navbar-brand" href="#">Mon Blog</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-md-end" id="navbarCollapse">
                <ul class="navbar-nav">
                    <li class="nav-item active">
                        <a class="nav-link" href="#">Home<span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="Articles.php">Articles</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="Users.php">Users</a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
<main>
    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <h1 class="display-4 align">Titre de l'article</h1>
                <img src="https://via.placeholder.com/1000x300?text=Image de l'article" class="img-fluid col-12 " alt="Responsive image">
        </div>
    </div>
    
    <section>
        <h5 class="modal-title">Titre de l'article<h5><br/>
        <article>
            Lorem ipsum dolor sit amet, consectetur adipiscing elit.
            Suspendisse ac luctus purus. In hac habitasse platea dictumst.
            Suspendisse eget elit eu leo dictum iaculis eu semper arcu.
            
            Donec commodo mattis dolor non ultrices.
            Nunc eros eros, fringilla vel vulputate in, efficitur ut risus.
            Nunc fermentum justo non ullamcorper dictum.
            
            Morbi lobortis congue justo, non congue sapien pharetra sed.
            Proin aliquam ipsum sit amet urna rutrum consectetur.
            Integer erat tellus, euismod eu lectus quis, cursus rhoncus nunc.
            
            Etiam ante eros, rutrum gravida pulvinar non, placerat sed ante.
            Curabitur sagittis, massa ac scelerisque consectetur, velit mauris vehicula quam,
            porta consectetur urna massa in mauris.
            
            In finibus nisi elit, non maximus diam convallis et.
            Cras in nibh id augue tincidunt blandit sed in sem.
            Nullam eu arcu nunc. Curabitur consectetur ultricies turpis, et faucibus purus rutrum eu.
            Etiam rutrum et enim vel sollicitudin.
        </article>
        <form>
            <div class="form-group">
                
                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                
            </div>
            <div class="form-group">
                
                <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
            </div>
            
            <button id="OKbtn" class="btn btn-primary">Post Comments</button>
        </form>
    </section>
    
        <section id=parentNode>
          
        </section>
    </main>
    
    <script src="http://code.jquery.com/jquery-3.3.1.js"
			integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
			crossorigin="anonymous"></script>
    <!--<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
                integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
                crossorigin="anonymous"></script>-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
                integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
                crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
                integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
                crossorigin="anonymous"></script>
    <script src="jQueryAjax.js"></script>
</body>
</html>