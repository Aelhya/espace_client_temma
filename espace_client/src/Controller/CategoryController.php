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
    #[Route('/admin/{user_login}', name: 'app_user_category_index', methods: ['GET'])]
    public function index(CategoryRepository $categoryRepository, UserRepository $userRepository, string $user_login): Response
    {
        return $this->render('category/index.html.twig', [
            'user'=> $userRepository->findOneByLogin($user_login),
            'categories' => $categoryRepository->findAll(),
        ]);
    }
}
