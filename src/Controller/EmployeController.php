<?php

namespace App\Controller;

use App\Entity\Employe;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class EmployeController extends AbstractController
{
    /**
     * @Route("/employe", name="app_employe")
     */
    public function index(ManagerRegistry $doctrine): Response
    {
        // SELECT * FROM eploye WHERE ville = "strasbourg" ORDER BY nom ASC
        $employes = $doctrine->getRepository(Employe::class)->findBy(["ville" => "STRASBOURG"], ["nom" => "ASC"]);
        return $this->render('employe/index.html.twig', [
            "employes" => $employes
        ]);
    }
     /**
     * @Route("/employe/{id}", name="show_employe")
     */
    public function show(Employe $employe): Response
    {
        return $this->render('employe/show.html.twig', [
            "employe" => $employe
        ]);
        
    }
    
}   
