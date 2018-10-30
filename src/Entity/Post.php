<?php

declare(strict_types=1);

namespace App\Entity;

final class Post
{
    private $id;

    private $titre;

    private $auteur;

    private $contenu;

    private $date;



    public function __construct(string $id, string $titre, string $auteur, string $contenu, \DateTimeImmutable $date)
    {
        $this->id = $id;
        $this->titre = $titre;
        $this->auteur = $auteur;
        $this->contenu = $contenu;
        $this->date = $date;
    }
}
