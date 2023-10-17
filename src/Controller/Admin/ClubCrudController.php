<?php

namespace App\Controller\Admin;

use App\Entity\Club;
use App\Entity\Images;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class ClubCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Club::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('nom'),
            IntegerField::new('telephone'),
            AssociationField::new('fondateur'),
            TextField::new('clubhouse'),
            IntegerField::new('code_postale'),
            TextField::new('ville'),
            AssociationField::new('images'),
        ];
    }
    
}
