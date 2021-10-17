<?php

namespace App\Controller;

use App\Entity\Image;
use App\Entity\Category;
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
        $opening = $openingHoursRepository->findAll();
        $info = $informationRepository->findAll();
        // Currently used in the template for the loops
        $img = $imageRepository->findall(); 
         
        //   WORK IN PROGRESS   
        // Get images by Category, the statments are ID of Categories
        $ladiesImg = $imageRepository->findByCategory(3);
        $beardImg = $imageRepository->findByCategory(1);
        $gentsImg = $imageRepository->findByCategory(2);
        $brandImg = $imageRepository->findByCategory(4);
        $storefrontImg = $imageRepository->findByCategory(5);
        $logoHeaderImg = $imageRepository->findByCategory(6);

        // Retrives Category Id 
        foreach($img as $key){
            $image = new Image();
            $image->setCategory($key->getCategory());
        }

       
        return $this->render('index/index.html.twig', [
            'services' => $services,
            'images' => $img,
            'openingHours' => $opening,
            'informations' => $info,
            /* 'ladiesImg' => $ladiesImg,
            'gentsImg' => $gentsImg,
            'beardImg' => $beardImg,
            'brandImg' =>   $brandImg,
            'storefrontImg' => $storefrontImg,
            'logoHeaderImg' => $logoHeaderImg, */
        ]);
    }
}
