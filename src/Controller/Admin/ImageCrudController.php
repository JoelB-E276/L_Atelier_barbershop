<?php

namespace App\Controller\Admin;

use App\Entity\Admin;
use App\Entity\Image;
use App\Entity\Category;
use Vich\UploaderBundle\Form\Type\VichImageType;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
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
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use Proxies\__CG__\App\Entity\Admin as EntityAdmin;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;


/**
 * @IsGranted("ROLE_ADMIN")
 */
class ImageCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Image::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('admin', 'Auteur')
                ->hideWhenCreating()
                ->hideWhenUpdating(),
            TextField::new('imageName', 'Nom du fichier')
                ->OnlyOnIndex(),
            TextareaField::new('imageFile', 'Image')
                ->setFormType(VichImageType::class)
                ->OnlyWhenCreating()
                ->setRequired(true),
             /* Create thumbnail after uploalding */
            ImageField::new('imageName', 'Image')
                ->onlyOnIndex()
                ->setBasePath('/image'),
            /* Get Category data with configureFilters() */
            AssociationField::new('category', 'Categorie')
                ->setRequired(true),
            TextField::new('imageAlt', 'Attribut HTML "ALT"(courte description pour référencement naturel)'),                            
           ];
    }

    /* Function to change titles of pages */
    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setPageTitle('new', 'Ajouter une image')
            ->setPageTitle('edit', 'Modifier')
        ;
    }
    
    /* Function to add Category Entity in form */
    public function configureFilters(Filters $filters): Filters
    {
        return $filters
            ->add(EntityFilter::new(Category::class))
            ->add(EntityFilter::new(Admin::class))
            
        ;
    }
   
    public function createEntity(string $entityFqcn)
    {
        $image = new Image();
        $image->setAdmin($this->getUser());

        return $image;
    }  
    
    public function updatedEntity()
    {
        $image = new Image();
        $image->setAdmin($this->getUser());

        return $image;
    }  
}
  

