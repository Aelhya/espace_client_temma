<?php

namespace App\Controller;

use App\Entity\Category;
use App\Entity\User;
use App\Form\CategoryType;
use App\Repository\CategoryRepository;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/')]
class CategoryController extends AbstractController
{
    #[Route('/admin/{user_login}', name: 'app_admin_category_index', methods: ['GET'])]
    public function index(CategoryRepository $categoryRepository, UserRepository $userRepository, string $user_login): Response
    {
        return $this->render('admin/category.html.twig', [
            'user'=> $userRepository->findOneByLogin($user_login),
            'categories' => $categoryRepository->findAll(),
        ]);
    }

    #[Route('/', name: 'app_user_category_index', methods: ['GET'])]
    public function indexUser(CategoryRepository $categoryRepository, UserRepository $userRepository): Response
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
}
