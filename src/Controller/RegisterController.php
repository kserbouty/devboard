<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\RegisterFormType;
use App\Security\CustomAuthenticator;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\UserAuthenticatorInterface;

class RegisterController extends AbstractController
{
    #[Route('/register', name: 'register')]
    public function register(
        Request $request,
        UserPasswordHasherInterface $userPasswordHasher,
        UserAuthenticatorInterface $userAuthenticator,
        CustomAuthenticator $authenticator,
        EntityManagerInterface $entityManager): Response
    {
        $user = new User();
        $register_form = $this->createForm(RegisterFormType::class, $user);
        $register_form->handleRequest($request);

        if ($register_form->isSubmitted() && $register_form->isValid()) {
            $user->setPassword(
                $userPasswordHasher->hashPassword(
                    $user,
                    $register_form->get('password')->getData()
                )
            );

            $entityManager->persist($user);
            $entityManager->flush();

            return $userAuthenticator->authenticateUser(
                $user,
                $authenticator,
                $request
            );
        }

        return $this->renderForm('auth/register.html.twig', [
            'check_message' => 'Agree on terms to proceed',
            'register_form' => $register_form
        ]);
    }
}
