<?php

namespace App\Controller\Admin;

use App\Entity\Images;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;


class ImagesCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Images::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            AssociationField::new('image_club'),
            AssociationField::new('image_utilisateur'),
            TextField::new('nom', 'Nom'),
            ImageField::new('photo', 'Votre image')
                    ->setBasePath('assets/images/')
                    ->setUploadDir('public/assets/images')
                    ->setUploadedFileNamePattern('[randomhash].[extension]')
                    ->setRequired(true),
        ];
    }

}