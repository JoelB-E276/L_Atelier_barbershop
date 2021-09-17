<?php

namespace App\Controller\Admin;

use App\Entity\Image;
use App\Entity\Service;
use Vich\UploaderBundle\Form\Type\VichImageType;
use Symfony\Component\HttpFoundation\File\File;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\CollectionField;

class ServiceCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Service::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('title', 'Titre'),
            TextField::new('text', 'Texte'),
            TextField::new('price', 'Tarif'),
            TextField::new('type', 'Type de prestation'),
            ImageField::new('imageName', 'Image')->onlyOnIndex()->setBasePath('/image'),
            /* ImageField::new('image')
            ->setUploadDir('public/image')
            ->setBasePath('public/image')
            ->setFormTypeOption('multiple', true)
            ->onlyOnForms(), */
             TextareaField::new('imageFile')
            ->setFormType(VichImageType::class)->hideOnIndex(),
            ChoiceField::new('type', 'Type de prestation')
            ->setChoices([
                'Coupe' => 'Coupe',
                'Barbe' => 'Barbe',
                'Coloration / Défrisage' => 'Coloration / Défrisage'
            ])

           
        ];
    }
    
}
 # app/src/controller/Admin/UsersCrudController.php
   /* public function configureFields(string $pageName): iterable
    {
        return [ChoiceField::new('roles')
                ->setLabel("Rol")
                ->setChoices([ 
                        'SUPERADMIN' => 'ROLE_ADMIN',
                        'ADMIN' => 'ROLE_MANAGER',
                        ])      
                        ->allowMultipleChoices(false)
                        ->renderExpanded(true)
                        ->setFormType(RoleType::class)]
    }

    ChoiceField::new('roles', 'Roles')
                    ->allowMultipleChoices()
                    ->autocomplete()
                    ->setChoices([  'User' => 'ROLE_USER',
                                    'Admin' => 'ROLE_ADMIN',
                                    'SuperAdmin' => 'ROLE_SUPER_ADMIN']
                                ) */