<?php

declare(strict_types=1);

namespace App\Controller\Auth;

use App\Form\PasswordResetType;
use App\Repository\UserRepository;
use App\Service\Mailer\AuthMailer;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Uid\Uuid;

class ResetPwdController extends AbstractController
{
    #[Route('/forgot', name: 'page_forgot')]
    public function forgotPassword(
        Request $request,
        UserRepository $userRepository,
        AuthMailer $authMailer,
        EntityManagerInterface $entityManager
    ): Response {
        $email = $request->get('_email');
        if ($email) {
            $user = $userRepository->findOneBy(['email' => $email]);
            if ($user) {
                $resetPasswordToken = Uuid::v4()->toRfc4122();
                $user->setResetPasswordToken($resetPasswordToken);
                $entityManager->flush();
                $authMailer->sendForgotEmail($user);
                $this->addFlash('success', 'E-mail envoyé !');
            } else {
                $this->addFlash('error', 'Aucun utilisateur trouvé avec cet e-mail');
            }
        }

        return $this->render('auth/forgot.html.twig');
    }

    #[Route('/reset/{uid}', name: 'page_reset')]
    public function resetPassword(
        string $uid,
        UserRepository $userRepository,
        Request $request,
        EntityManagerInterface $entityManager
    ): Response {
        $user = $userRepository->findOneBy(['resetPasswordToken' => $uid]);

        if (!$user) {
            $this->addFlash('error', 'Token de réinitialisation invalide');
            return $this->redirectToRoute('page_forgot');
        }

        $form = $this->createForm(PasswordResetType::class, ['email' => $user->getEmail()]);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();
            if ($data['plainPassword'] === $data['repeatPassword']) {
                $user->setResetPasswordToken(null);
                $user->setPlainPassword($data['plainPassword']);
                $entityManager->flush();

                $this->addFlash('success', 'Mot de passe réinitialisé');
                return $this->redirectToRoute('page_login');
            }

            $this->addFlash('error', 'Les mots de passe ne correspondent pas');
        }

        return $this->render('auth/reset.html.twig', [
            'user' => $user,
            'form' => $form->createView(),
        ]);
    }
}
