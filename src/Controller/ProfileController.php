<?php

namespace App\Controller;

use App\Entity\Problem;
use App\Form\ProblemType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProfileController extends AbstractController
{
    /**
     * @Route("/profile", name="profile")
     */
    public function index(Request $req ): Response
    {
        $problem = new Problem();
        $problem->setAuthor($this->getUser());
        $problem_form = $this->createForm(ProblemType::class,$problem);
        $problem_form->handleRequest($req);
        if ($problem_form->isSubmitted() && $problem_form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($problem);
            $em->flush();
            return $this->redirectToRoute("profile");
        }
        return $this->render('profile/index.html.twig', [
            'problem_form' => $problem_form->createView(),
        ]);
    }
}
