// Création fonction ajout nouvel élément (title & article)

function addArticle() {
    var xhr = new XMLHttpRequest();

    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && xhr.status == 200)
        // Variables definitions with JSON datas from DB
        {
            var title = (JSON.parse(xhr.response)).title;
            var content = (JSON.parse(xhr.response)).content;
            var id = (JSON.parse(xhr.response)).id;
            //
            var newPar = document.createElement('p');
            newPar.innerHTML = "Titre: " + title + " => Contenu article: " + content;

            var elementParent = document.getElementById('parentNode');
            elementParent.appendChild(newPar);

        }
    };


    // Requête AJAX pour écrire dans la DB
    var title = document.getElementById('title').value;
    var content = document.getElementById('content').value;

    xhr.open('POST', './controllers/article_add.php');
    // 1ère méthode de passage en POST avec AJAX
    // xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    // 2ème méthode de passage en POST avec AJAX, plus propre
    var data = new FormData();
    data.append('title', title);
    data.append('content', content);
    //data.append('Membre', Membre) on réalise un data.append pour chaque valeur que l'on veut ajouter à la DB
    xhr.send(data);

}

// Showing Article's blog function by id creation (title & content)
function showArticle(id) {
    var xhr = new XMLHttpRequest();

    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && xhr.status == 200) {
            // On affecte les valeurs en retour du serveur à une variable
            var article = JSON.parse(xhr.response);
            // Récupération de la valeur de l'input HTML grace à son identifiant, affection à une variable
            var title = document.getElementById('title');
            // On attribue la valeur récupérée par JSON à l'élément html que l'on veut modifier
            title.value = article.title;
            // Récupération de la valeur de l'input HTML grace à son identifiant, affection à une variable
            var content = document.getElementById('content');
            // On attribue la valeur récupérée par JSON à l'élément html que l'on veut modifier
            content.value = article.content;

        }
    };
    xhr.open('POST', './controllers/article_show.php');
    var data = new FormData();
    data.append('id', id);

    xhr.send(data);
}

// Deleting Article's blog function by id creation (title & content)
function deleteArticle(id) {
    var xhr = new XMLHttpRequest();

    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && xhr.status == 200) { // On affecte les valeurs en retour du serveur à une variable
            //var user = JSON.parse(xhr.response);
            var node = document.getElementById('parentNode');
            // Récupération de l'élément HTML grace à son identifiant
            //id.value=user.id;
            var nodeUser = document.getElementById(id);

            node.removeChild(nodeUser);
        }
    };
    xhr.open('POST', './controllers/article_delete.php');
    var data = new FormData();
    data.append('id', id);

    xhr.send(data);
}

// Création fonction mise à jour élément (title & article)
function updateArticle(id) {
    var xhr = new XMLHttpRequest();

    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && xhr.status == 200) {
            // Récupération du noeud parent
            var node = document.getElementById('parentNode');
            // Récupération de l'élément HTML grace à son identifiant (noeud enfant)
            var nodeUser = document.getElementById(id);
            // Suppression du noeud voulu dans le parent
            node.removeChild(nodeUser);

            // Création d'un nouveau noeud 'Paragraphe' dans le parent 'Section'
            var newPar = document.createElement('p');
            newPar.setAttribute("id", id);
            newPar.innerHTML = document.getElementById("title").value +
                document.getElementById("content").value

            node.insertBefore(newPar, node.firstChild);
            //node.appendChild(newPar);
            // Création de 3 nouveaux noeuds 'Input' dans le parent 'Paragraphe'
            // Récupération de l'id du noeud parent
            //var nodeIn = document.getElementById('id');

            var newInput1 = document.createElement('input');
            newInput1.setAttribute("onclick", 'showArticle(id)');
            newInput1.setAttribute("type", "button");
            newInput1.setAttribute("value", "Voir");
            newPar.appendChild(newInput1);

            var newInput2 = document.createElement('input');
            newInput2.setAttribute("onclick", 'updateArticle(id)');
            newInput2.setAttribute("type", "button");
            newInput2.setAttribute("value", "Modifier");
            newPar.appendChild(newInput2);

            var newInput3 = document.createElement('input');
            newInput3.setAttribute("onclick", 'deleteArticle(id)');
            newInput3.setAttribute("type", "button");
            newInput3.setAttribute("value", "Effacer");
            newPar.appendChild(newInput3);
        }
    };


    var title = document.getElementById('title').value;
    var content = document.getElementById('content').value;


    xhr.open('POST', './controllers/article_update.php');
    var data = new FormData();
    data.append('id', id);
    data.append('title', title);
    data.append('content', content);

    xhr.send(data);
}

// Fonction pour les "Likes" positifs
function UpLike(id) {
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && xhr.status == 200) {
            document.getElementById('UpLike').innerHTML = xhr.responseText;
            // Intégration de la valeur du "Like" positif dans un nouveau paragraphe HTML
            //var newElementChild = document.createElement('td');
            //newElementChild.innerHTML = document.getElementById('UpLike').value;
            //var elementParent = document.getElementById('parentNode');
            //elementParent.appendChild(newElementChild);
        }
    }

    //var UpLike = document.getElementById('UpLike').value;


    xhr.open('POST', './controllers/add_UpLike.php');
    // 1ère méthode de passage en POST avec AJAX
    // xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    // 2ème méthode de passage en POST avec AJAX, plus propre
    var data = new FormData();
    data.append('id', id);
    data.append('UpLike', UpLike);

    xhr.send(data);


}

// Fonction pour les "Likes" négatifs
function DnLike(id) {
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && xhr.status == 200) {
            document.getElementById('DnLike').innerHTML = xhr.responseText;
            // Intégration de la valeur du "Like" négatif dans un nouveau paragraphe HTML
            var newElementChild = document.createElement('td');
            newElementChild.innerHTML = document.getElementById('DnLike').value;
            var elementParent = document.getElementById('parentNode');
            elementParent.appendChild(newElementChild);
        }
    }

    var DnLike = document.getElementById('DnLike').value;
    alert(DnLike);
    xhr.open('POST', './controllers/add_DnLike.php');
    // 1ère méthode de passage en POST avec AJAX
    // xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    // 2ème méthode de passage en POST avec AJAX, plus propre
    var data = new FormData();
    data.append('DnLike', DnLike);
    //data.append('Membre', Membre) on réalise un data.append pour chaque valeur que l'on veut ajouter à la DB
    xhr.send(data);
    var INL = 0
    INL = INL + 1;
    console.log(DnLike);
    return INL;
}