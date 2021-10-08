<?php

namespace App\Controller;

use App\Repository\CompagnieRepository;
use App\Repository\ProblemRepository;
use App\Repository\ZoneRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class IndexController extends AbstractController
{
    /**
     * @Route("/", name="index")
     */
    public function index( ZoneRepository $zoneRepository, CompagnieRepository $compagnieRepository,ProblemRepository $problemRepository ): Response
    {
       
        return $this->render('index/index.html.twig', [
            'zones' => $zoneRepository->findAll(),
            'compagnies' => $compagnieRepository->findAll(),
            'problems' =>$problemRepository->findAll()
        ]);
    }
}
