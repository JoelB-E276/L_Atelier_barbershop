<?php

namespace App\Controller\Admin;

use App\Entity\Image;
use App\Entity\Information;
use Vich\UploaderBundle\Form\Type\VichImageType;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
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
            ChoiceField::new('category', 'Catégorie')
                ->autocomplete()
                ->setChoices([ 
                    'Barbe' => 'beardTrim',
                    'Coupe Femme' =>'ladiesCut',
                    'Coupe Homme' => 'gentsCut',
                    'Galerie Barbe' => 'beardGalery',
                    'Galerie Femme' => 'ladiesGalery',
                    'Galerie Homme' => 'gentsGalery',
                    'Salon' => 'store',
                    'Les Marques' => 'brand',
                    'Logo Header' =>'headerLogo',
                    'Devanture' =>'storefront',
                    ]),
            ChoiceField::new('area', 'Ordre d\'affichage')
                ->autocomplete()
                ->setChoices([
                    'Logo Header' =>'headerLogo',
                    'Devanture' =>'storefront',
                    'Barbe' => 'beardTrim',
                    'Coupe Femme' =>'ladiesCut',
                    'Coupe Homme' => 'gentsCut',
                    'Galerie Barbe' => 'beardGalery',
                    ]),
            TextField::new('imageAlt', 'Champ HTML "ALT"'),
                                          
           ];
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setPageTitle('new', 'Ajouter une image')
            ->setPageTitle('edit', 'Modifier')


        ;
    }
    
}
  

