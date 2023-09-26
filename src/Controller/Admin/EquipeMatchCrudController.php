<?php

namespace App\Controller\Admin;

use App\Entity\EquipeMatch;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class EquipeMatchCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return EquipeMatch::class;
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
