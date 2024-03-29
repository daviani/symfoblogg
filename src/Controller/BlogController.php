<?php

namespace App\Controller;

use App\Entity\Article;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BlogController extends AbstractController
{
    /**
     * @Route("/blog", name="blog")
     */
    public function index() {
        $repo = $this -> getDoctrine () -> getRepository (Article::class);

        $articles = $repo -> findAll ();

        return $this -> render ('blog/index.html.twig', [
         'controller_name' => 'BlogController', 'articles' => $articles
                                                      ]
        );
    }

    /**
     * @route("/", name ="home")
     */
    public function home() {
        return $this -> render ('blog/home.html.twig', [
                                                         'title' => 'Bienvenue sur le blog',
                                                     ]
        );
    }

    /**
     * @Route("/blog/{id}", name="blog_show")
     * @param $id = $id of article
     *
     * @return Response
     */

    public function show($id) {

        $repo = $this -> getDoctrine () -> getRepository (Article::class);

        $article = $repo -> find ($id);

        return $this -> render ('blog/show.html.twig', [
            'article' => $article
        ]
        );
    }

}
