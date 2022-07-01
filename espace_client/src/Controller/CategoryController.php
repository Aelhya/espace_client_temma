<?php

namespace App\Controller;
use App\Entity\Category;
use App\Repository\CategoryRepository;
use App\Repository\FileRepository;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/')]
class CategoryController extends AbstractController
{
    #[Route('/', name: 'app_user_category_index', methods: ['GET'])]
    public function index(CategoryRepository $categoryRepository, UserRepository $userRepository): Response
    {
        if ($this->getUser() != null) {
            if ($this->getUser()->getRoles() === ["ROLE_USER", "ROLE_ADMIN"]) {
                return $this->redirectToRoute('app_admin_index');
            }
            return $this->render('category/index.html.twig', [
                'user'=> $this->getUser(),
                'categories' => $categoryRepository->findAll(),
            ]);
        }else{
            return $this->redirectToRoute('app_login');
        }
    }

    #[Route('/file/{id}', name: 'app_category_show', methods: ['GET'])]
    public function show(): Response
    {
        return $this->render('category/show.html.twig'/*, [
            'category' => $category,
            'files' => $fileRepository->findByUserAndCategory('tesJkU8 ', $category_label)
        ]*/);
    }
}
