<?php

namespace App\Controller\Admin;

use App\Entity\Image;
use App\Entity\Information;
use Vich\UploaderBundle\Form\Type\VichImageType;
use EasyCorp\Bundle\EasyAdminBundle\Field\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class InformationCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Information::class;
    }



    
    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('name','Nom de l\'enseigne'),
            TextField::new('adress','Adresse'),
            TextField::new('city','Ville'),
            NumberField::new('postalCode', 'Code postale'),
            TextField::new('phoneNumber', 'Téléphone'),
            TextareaField::new('image')
            ->setFormType(VichImageType::class)
            ->onlyWhenCreating(),
            ImageField::new('image')
            ->onlyOnIndex()
            ->setBasePath('/image'),
           /*  ->setFormType(VichImageType::class)
            ->OnlyWhenCreating(), */

  
/*           TextField::new('googlemaps','Lien Google Maps'),
 */         TextField::new('siret', 'Numéro Siret')

        ];
    }

}
