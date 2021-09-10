<?php

namespace App\Controller;

use App\Entity\Service;
use App\Entity\OpeningHours;
use App\Repository\OpeningHoursRepository;
use App\Repository\ServiceRepository;
Use App\Repository\ImageRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class IndexController extends AbstractController
{
    #[Route('/', name: 'index')]
    public function index(ServiceRepository $ServiceRepository, ImageRepository $imageRepository,OpeningHoursRepository $openingHoursRepository ): Response
    {
        $services = $ServiceRepository->findall();
        $img = $imageRepository->findall();
        $openingHours = $openingHoursRepository->findAll();

        return $this->render('index/index.html.twig', [
            'services' => $services,
            'imag' => $img,
            'openingHours' => $openingHours,
        ]);
    }
}
