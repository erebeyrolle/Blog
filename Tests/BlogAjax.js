function sendComment() {

    var xhr = new XMLHttpRequest();

    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && xhr.status == 200) {
            //document.getElementById('getLastContent').innerHTML = xhr.responseText;
            // Intégration du commentaire dans un nouveau paragraphe HTML
            var newElementChild = document.createElement('p');
            newElementChild.innerHTML = document.getElementById('content').value;
            var elementParent = document.getElementById('parentNode');
            elementParent.appendChild(newElementChild);
        }
    }

    var content = document.getElementById('content').value;
    //alert(content);
    xhr.open('POST', 'save_comment.php');
    // 1ère méthode de passage en POST avec AJAX
    // xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    // 2ème méthode de passage en POST avec AJAX, plus propre
    var data = new FormData();
    data.append('content', content);
    //data.append('Membre', Membre) on réalise un data.append pour chaque valeur que l'on veut ajouter à la DB
    xhr.send(data);

}