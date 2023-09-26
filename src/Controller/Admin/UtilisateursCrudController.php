<?php

namespace App\Controller\Admin;

use App\Entity\Utilisateurs;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class UtilisateursCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Utilisateurs::class;
    }

    /*
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id'),
            TextField::new('title'),
            TextEditorField::new('description'),
        ];
    }
    */
}
