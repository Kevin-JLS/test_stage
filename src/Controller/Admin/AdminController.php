<?php

namespace App\Controller\Admin;

use App\Entity\Article;
use App\Form\ArticlesType;
use Cocur\Slugify\Slugify;
use App\Repository\ArticleRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class AdminController extends AbstractController
{
     #[Route('/admin', name: 'app_admin')]
     public function index(ArticleRepository $articleRepository): Response
     {
          $articles = $articleRepository->findAll();

          return $this->render('admin/index.html.twig', [
               'articles' => $articles,
          ]);
     }

     #[Route('/admin/create', name: 'admin_create')]
     public function create(Request $request, EntityManagerInterface $em): Response
     {
          $article = new Article();

          $form = $this->createForm(ArticlesType::class, $article);
          $form->handleRequest($request);

          if ($form->isSubmitted() && $form->isValid()) {

               // Upload de l'image
               /** @var UploadedFile */
               $picture = $form->get('img')->getData();
               $folder = $this->getParameter('article.folder');
               $extension = $picture->guessExtension() ?? 'bin';
               $filename = pathinfo($picture->getClientOriginalName(), PATHINFO_FILENAME) . '-' . bin2hex(random_bytes(3)) . '.' . $extension;    
               $picture->move($folder, $filename);

               $article->setPicture($filename);

               // Slug
               $slugify = new Slugify();
               $slug = $slugify->slugify($article->getTitle()); 
               $article->setSlug($slug);

               // Date time
               $article->setDateCreated(new \DateTime('now'));
               
               $em->persist($article);
               $em->flush();

               return $this->redirectToRoute('app_admin');
          }

          return $this->render('admin/create.html.twig', [
               'form'         => $form->createView(),
               'article'      => $article,
          ]);
     }

     #[Route('/admin/edit/{id}', name: 'admin_edit')]
     public function edit($id, ArticleRepository $articleRepository, Request $request, EntityManagerInterface $em): Response
     {
          $article = $articleRepository->findOneBy(['id' => $id]);

          $form = $this->createForm(ArticlesType::class, $article);
          $form->handleRequest($request);

          if ($form->isSubmitted() && $form->isValid()) {

               // Upload de l'image
               /** @var UploadedFile */
               $picture = $form->get('img')->getData();
               $folder = $this->getParameter('article.folder');
               $extension = $picture->guessExtension() ?? 'bin';
               $filename = pathinfo($picture->getClientOriginalName(), PATHINFO_FILENAME) . '-' . bin2hex(random_bytes(3)) . '.' . $extension;    
               $picture->move($folder, $filename);

               $article->setPicture($filename);

               // Slug
               $slugify = new Slugify();
               $slug = $slugify->slugify($article->getTitle()); 
               $article->setSlug($slug);
               
               // Created_at
               $article->setDateCreated(new \DateTime('now'));
               
               $em->persist($article);
               $em->flush();

               return $this->redirectToRoute('app_admin');
          }

          return $this->render('admin/edit.html.twig', [
               'form'    => $form->createView(),
               'article' => $article
          ]);
     }

     #[Route('/admin/delete/{id}', name: 'admin_delete')]
     public function delete($id, ArticleRepository $articleRepository, EntityManagerInterface $em): Response
     {
          $article = $articleRepository->findOneBy(['id' => $id]);

          $em->remove($article);
          $em->flush();

          return $this->redirectToRoute('app_admin');
     }

}