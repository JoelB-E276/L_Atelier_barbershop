<?php

namespace App\Controller\Admin;

use App\Entity\Admin;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;


class AdminCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Admin::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('username', 'Identifiant')
            ->setPermission('ROLE_SUPER_ADMIN'),
            ChoiceField::new('roles', 'Roles')
            ->setPermission('ROLE_SUPER_ADMIN')
            ->allowMultipleChoices()
            ->autocomplete()
            ->setChoices([  'User' => 'ROLE_USER',
                            'Admin' => 'ROLE_ADMIN',
                            'SuperAdmin' => 'ROLE_SUPER_ADMIN'])
            ,
        ];
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setPageTitle('index', 'Gestion des comptes utilisateurs')
            ->setHelp('index', 'Toujours garder un utilisateur avec le role "SUPER_ADMIN" ')
            ->setPageTitle('edit', 'Toujours garder un utilisateur avec le role "SUPER_ADMIN" !')

        ;
    }


}
