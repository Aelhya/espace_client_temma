<?php

namespace App\Controller;
use App\Entity\Category;
use App\Entity\User;
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

//    #[Route('/file/{id}', name: 'app_category_show', methods: ['GET'])]
//    public function show(): Response
//    {
//        return $this->render('file/index.html.twig'/*, [
//            'category' => $category,
//            'files' => $fileRepository->findByUserAndCategory('tesJkU8 ', $category_label)
//        ]*/);
//    }

    #[Route('/{category_label}/files', name: 'app_category_show', methods: ['GET'])]
    public function show(FileRepository $fileRepository, UserRepository $userRepository, CategoryRepository $categoryRepository,
                              string         $category_label): Response
    {
        /** @var User $user */
        $user = $this->getUser();

        return $this->render('file/index.html.twig', [
            'user' => $user,
            'category' => $categoryRepository->findOneByLabel($category_label),
            'files' => $fileRepository->findByUserAndCategory($user->getLogin(), $category_label),
        ]);
    }
}
