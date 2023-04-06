<?php

namespace App\Controller;

use App\Entity\Article;
use App\Form\ArticleFormType;
use App\Repository\ArticleRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ArticleController extends AbstractController
{
    private $entityManager;
    private $articleRepository;

    public function __construct(EntityManagerInterface $entityManager, ArticleRepository $articleRepository) 
    {
        $this->entityManager = $entityManager;
        $this->articleRepository = $articleRepository;
    }

    #[Route('/article', name: 'app_article')]
    public function index(): Response
    {
        return $this->render('article/index.html.twig', [
            'controller_name' => 'ArticleController',
        ]);
    }

    #[Route('/article/edit/{id}', name: 'article_edit')]
    public function editArticle(Article $article, Request $request): Response
    {
        $form = $this->createForm(ArticleFormType::class, $article);

        $form->handleRequest($request);
        $image = $form->get('image')->getData();
        $imageFromUrl = $form->get('imageFromUrl')->getData();

        if ($form->isSubmitted() && $form->isValid())
        {
            if($image)
            {
                if($article->getImage() != null)
                {
                    if(file_exists($this->getParameter('kernel.project_dir') . $article->getImage()) || $article->getImage() != null)
                    {
                        $this->getParameter('kernel.project_dir') . $article->getImage();

                        $newFileName = uniqid() . '.' . $image->guessExtension();

                        try {
                            $image->move(
                                $this->getParameter('kernel.project_dir') . '/public/uploads',
                                $newFileName);
                            
                        } catch (FileException $e) {
                            return new Response($e->getMessage());
                        }

                        if($form->get('title')->getData() != $article->getTitle())
                            $article->setTitle($form->get('title')->getData());
                        if($form->get('text')->getData() != $article->getText())
                            $article->setText($form->get('text')->getData());

                        $article->setImage('/uploads/' . $newFileName);
                        $article->setUpdatedAt(new \DateTime());

                        $this->entityManager->persist($article);
                        $this->entityManager->flush();

                        return $this->redirectToRoute('home');
                    }
                }
            }
            elseif ($imageFromUrl) 
            {
                if($form->get('title')->getData() != $article->getTitle())
                    $article->setTitle($form->get('title')->getData());
                if($form->get('text')->getData() != $article->getText())
                    $article->setText($form->get('text')->getData());


                $article->setImage($imageFromUrl);
                $article->setUpdatedAt(new \DateTime());

                $this->entityManager->persist($article);
                $this->entityManager->flush();

                return $this->redirectToRoute('home');
            }
            else
            {
                if($form->get('title')->getData() != $article->getTitle())
                    $article->setTitle($form->get('title')->getData());
                if($form->get('text')->getData() != $article->getText())
                    $article->setText($form->get('text')->getData());

                // $article->setTitle($form->get('title')->getData());
                // $article->setText($form->get('text')->getData());
                $article->setUpdatedAt(new \DateTime());

                $this->entityManager->persist($article);
                $this->entityManager->flush();

                return $this->redirectToRoute('home');
            }
        }

        
        return $this->render('pages/edit.html.twig', [
            'form' => $form->createView(),
            'article' => $article,
        ]);
    }
}
