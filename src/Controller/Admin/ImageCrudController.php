<?php

namespace App\Controller\Admin;

use App\Entity\Image;
use Vich\UploaderBundle\Form\Type\VichImageType;
use Symfony\Component\HttpFoundation\File\File;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class ImageCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Image::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('imageName', 'Nom du fichier')
            ->OnlyOnIndex(),
            TextareaField::new('imageFile', 'Image')
            ->setFormType(VichImageType::class)
            ->OnlyWhenCreating(),
             ImageField::new('imageName', 'Image')
            ->onlyOnIndex()
            ->setBasePath('/image'),
            



           ];
    }
    
}
  

