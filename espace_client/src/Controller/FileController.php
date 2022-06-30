<?php

namespace App\Controller;

use App\Entity\File;
use App\Entity\User;
use App\Repository\CategoryRepository;
use App\Repository\FileRepository;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/')]
class FileController extends AbstractController
{
    #[Route('/admin/{user_login}/{category_label}', name: 'app_file_index', methods: ['GET'])]
    public function index(FileRepository $fileRepository, UserRepository $userRepository, CategoryRepository $categoryRepository,
                          string         $user_login, string $category_label): Response
    {
        return $this->render('file/index.html.twig', [
            'user' => $userRepository->findOneByLogin($user_login),
            'category' => $categoryRepository->findOneByLabel($category_label),
            'files' => $fileRepository->findByUserAndCategory($user_login, $category_label),
        ]);
    }

    // TODO : bug lors de la déconnexion
    #[Route('/{category_label}', name: 'app_user_file_index', methods: ['GET'])]
    public function indexUser(FileRepository $fileRepository, UserRepository $userRepository, CategoryRepository $categoryRepository,
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

    #[Route('/admin/file/{id}/user_login={user_login}&category_label={category_label}', name: 'app_file_delete', methods: ['POST'])]
    public function delete(Request $request, File $file, FileRepository $fileRepository,
                           string  $user_login, string $category_label): Response
    {
        if ($this->isCsrfTokenValid('delete' . $file->getId(), $request->request->get('_token'))) {
            $fileRepository->remove($file, true);
        }
        return $this->redirectToRoute('app_file_index', [
            'user_login' => $user_login,
            'category_label' => $category_label,
        ], Response::HTTP_SEE_OTHER);
    }
}
