// New User's blog creation function (id, lastname, firstname & email)
function createUser() {
    var xhr = new XMLHttpRequest();

    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && xhr.status == 200)
        // Variables definitions with JSON datas from DB
        {
            var lastname = (JSON.parse(xhr.response)).lastname;
            var firstname = (JSON.parse(xhr.response)).firstname;
            var email = (JSON.parse(xhr.response)).email;
            var id = (JSON.parse(xhr.response)).id;
            // 
            var newPar = document.createElement('p');
            newPar.innerHTML = lastname + ' ' + firstname +
                " <input onclick='showUser(id) 'type='submit' value='Voir'>" +
                " <input onclick='updateUser(id) 'type='submit' value='Modifier'>" +
                " <input onclick='deleteUser(id) 'type='submit' value='Effacer'>";
            var elementParent = document.getElementById('parentNode');
            elementParent.appendChild(newPar);
            //newPar.insertBefore(newPar,newPar.firstChild);
        }
    };
    // AJAX request to write into the DB
    // Keeping inputs values and pushing in variables for the POST
    var lastname = document.getElementById('lastname').value;
    var firstname = document.getElementById('firstname').value;
    var email = document.getElementById('email').value;

    xhr.open('POST', './controllers/user_add.php');
    // 1ère méthode de passage en POST avec AJAX
    // xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    // 2ème méthode de passage en POST avec AJAX, plus propre
    var data = new FormData();
    data.append('lastname', lastname);
    data.append('firstname', firstname);
    data.append('email', email);

    xhr.send(data);
}
// Showing User's blog function by id creation (lastname & firstname)
function showUser(id) {
    var xhr = new XMLHttpRequest();

    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && xhr.status == 200) {
            // On affecte les valeurs en retour du serveur à une variable
            var user = JSON.parse(xhr.response);
            // Récupération de la valeur de l'input HTML grace à son identifiant, affection à une variable
            var lastname = document.getElementById('lastname');
            // On attribue la valeur récupérée par JSON à l'élément html que l'on veut modifier
            lastname.value = user.lastname;
            // Récupération de la valeur de l'input HTML grace à son identifiant, affection à une variable
            var firstname = document.getElementById('firstname');
            // On attribue la valeur récupérée par JSON à l'élément html que l'on veut modifier
            firstname.value = user.firstname;
            //Récupération de la valeur de l'input HTML grace à son identifiant, affection à une variable
            var email = document.getElementById('email');
            // On attribue la valeur récupérée par JSON à l'élément html que l'on veut modifier
            email.value = user.email;
        }
    };
    xhr.open('POST', './controllers/user_show.php');
    var data = new FormData();
    data.append('id', id);

    xhr.send(data);
}
// Deleting User's blog function by id creation (lastname & firstname)
function deleteUser(id) {
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
    xhr.open('POST', './controllers/user_delete.php');
    var data = new FormData();
    data.append('id', id);

    xhr.send(data);
}

// Création fonction mise à jour élément (lastname & firstname)
function updateUser(id) {
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
            newPar.innerHTML = document.getElementById("lastname").value +
                document.getElementById("firstname").value
                // document.getElementById(" email ").value
            node.insertBefore(newPar, node.firstChild);
            //node.appendChild(newPar);
            // Création de 3 nouveaux noeuds 'Input' dans le parent 'Paragraphe'
            // Récupération de l'id du noeud parent
            //var nodeIn = document.getElementById('id');

            var newInput1 = document.createElement('input');
            newInput1.setAttribute("onclick", 'showUser(id)');
            newInput1.setAttribute("type", "button");
            newInput1.setAttribute("value", "Voir");
            newPar.appendChild(newInput1);

            var newInput2 = document.createElement('input');
            newInput2.setAttribute("onclick", 'updateUser(id)');
            newInput2.setAttribute("type", "button");
            newInput2.setAttribute("value", "Modifier");
            newPar.appendChild(newInput2);

            var newInput3 = document.createElement('input');
            newInput3.setAttribute("onclick", 'deleteUser(id)');
            newInput3.setAttribute("type", "button");
            newInput3.setAttribute("value", "Effacer");
            newPar.appendChild(newInput3);
        }
    };


    var lastname = document.getElementById('lastname').value;
    var firstname = document.getElementById('firstname').value;
    var email = document.getElementById('email').value;

    xhr.open('POST', './controllers/user_update.php');
    var data = new FormData();
    data.append('id', id);
    data.append('lastname', lastname);
    data.append('firstname', firstname);
    data.append('email', email);
    xhr.send(data);
}