<?php

namespace App\Controller\Admin;

use App\Entity\Information;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
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
            TextField::new('instagram', 'Lien Instagram'),
            TextField::new('facebook','Lien Facebook'),
/*             TextField::new('googlemaps','Lien Google Maps'),
 */            TextField::new('siret', 'Numéro Siret')

        ];
    }

}
