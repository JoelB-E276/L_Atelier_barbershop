<?php

namespace App\Controller;

Use App\Repository\ImageRepository; 
use App\Repository\ServiceRepository;
Use App\Repository\CategoryRepository; 
use App\Repository\InformationRepository;
use App\Repository\OpeningHoursRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class IndexController extends AbstractController
{
    #[Route('/', name: 'index')]
    public function index(ServiceRepository $ServiceRepository, ImageRepository $imageRepository,OpeningHoursRepository $openingHoursRepository,InformationRepository $informationRepository, CategoryRepository $categoryRepository ): Response
    {
        $services = $ServiceRepository->findall();
        $img = $imageRepository->findall();
        $opening = $openingHoursRepository->findAll();
        $info = $informationRepository->findAll();

        return $this->render('index/index.html.twig', [
            'services' => $services,
            'images' => $img,
            'openingHours' => $opening,
            'informations' => $info,
        ]);
    }
}
