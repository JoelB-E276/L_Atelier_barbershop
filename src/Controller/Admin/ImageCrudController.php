<?php

namespace App\Controller\Admin;

use App\Entity\Image;
use App\Entity\Category;
use Vich\UploaderBundle\Form\Type\VichImageType;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Field\ArrayField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\CollectionField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Filter\EntityFilter;
use EasyCorp\Bundle\EasyAdminBundle\Config\Filters;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;

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
            AssociationField::new('categories'),
            
              
            
            /* ChoiceField::new('category', 'Catégorie')
                ->autocomplete()
                ->setChoices([ 
                    'Barbe' => 'beardTrim',
                    'Coupe Femme' =>'ladiesCut',
                    'Coupe Homme' => 'gentsCut',
                    'Galerie Barbe' => 'beardGalery',
                    'Galerie Femme' => 'ladiesGalery',
                    'Galerie Homme' => 'gentsGalery',
                    'Salon' => 'saloon',
                    'Les Marques' => 'brand',
                    'Logo Header' =>'headerLogo',
                    'Logo Navbar' =>'navLogo',
                    'Logo Footer' =>'footererLogo',
                    'Devanture' =>'storefront',
                    ]),
            ChoiceField::new('subcategory', 'Ordre d\'affichage')
                ->autocomplete()
                ->setChoices([
                    '1' =>'first',
                    '2' =>'second',
                    '3' => 'third',
                    'A la suite' => 'next',
                    ]), */
            TextField::new('imageAlt', 'Attribut HTML "ALT"'),
                                          
           ];
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setPageTitle('new', 'Ajouter une image')
            ->setPageTitle('edit', 'Modifier')


        ;
    }

    public function configureFilters(Filters $filters): Filters
    {
        return $filters
            ->add(EntityFilter::new(Category::class))
            
        ;
    }
    
}
  

