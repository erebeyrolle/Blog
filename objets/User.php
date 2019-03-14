<?php
// Création de la class Article

class User
{
    // Atttributs
    public $id;
    public $lastname;
    public $firstname;
    public $email;

    // Création de la méthode

    public function getUser()
    {
        return $this->$id.$this->$lastname.$this->$firstname.$this->$email;
    }
}

?>