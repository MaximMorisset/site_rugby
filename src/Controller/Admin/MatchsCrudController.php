<?php

namespace App\Controller\Admin;

use App\Entity\Matchs;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class MatchsCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Matchs::class;
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
