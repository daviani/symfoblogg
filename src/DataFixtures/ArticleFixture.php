<?php

namespace App\DataFixtures;

use App\Entity\Article;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class ArticleFixture extends Fixture
{
    public function load(ObjectManager $manager) {
        for ($i = 1; $i <= 10; $i ++) {
            $article = new Article();

            $article -> setTitle ("Titre de l'article n°$i")
                     -> setContent ("<p>Contenu de l'Article n°$i")
                     -> setImage ("http://lorempixel.com/output/cats-q-c-800-150.jpg")
                     -> setCreateAt (new \DateTime());
            $manager -> persist ($article);
        }
        $manager -> flush ();
    }
}
