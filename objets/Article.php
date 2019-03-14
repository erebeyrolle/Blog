<?php
// Création de la class Article

class Article
{
    // Atttributs
    public $id;
    public $title;
    public $content;
    public $UpLike;
    public $DnLike;

    // Création de la méthode

    public function getArticle()
    {
        return $this->$id.$this->$title.$this->$content;
    }

    public function getUpLike()
    {
        return $this->$UpLike;
    }

    public function getDnLike()
    {
        return $this->$DnLike;
    }
}

?>