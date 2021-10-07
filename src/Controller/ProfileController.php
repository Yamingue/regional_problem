<?php

namespace App\Controller;

use App\Entity\Problem;
use App\Form\ProblemType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProfileController extends AbstractController
{
    /**
     * @Route("/profile", name="profile")
     */
    public function index(): Response
    {
        $problem = new Problem();
        $problem_form = $this->createForm(ProblemType::class,$problem);
        return $this->render('profile/index.html.twig', [
            'problem_form' => $problem_form->createView(),
        ]);
    }
}
