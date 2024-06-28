<?php

namespace App\Controller\Admin;

use App\Entity\Package;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\ArrayField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\CollectionField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;

class PackageCrudController extends AbstractCrudController
{
    public const PACKAGE_BASE_PATH = 'upload/images/packages';
    public const PACKAGE_UPLOAD_DIR = 'public/upload/images/packages';
    public static function getEntityFqcn(): string
    {
        return Package::class;
    }

    public function configureActions(Actions $actions): Actions
    {
        return $actions
            // ...
            ->add(Crud::PAGE_INDEX, Action::DETAIL)

        ;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('title'),
            TextEditorField::new('description')
                ->hideOnIndex(),
            ImageField::new('image')
                ->setBasePath(self::PACKAGE_BASE_PATH)
                ->setUploadDir(self::PACKAGE_UPLOAD_DIR),
            IntegerField::new('nb_lessons'),
            AssociationField::new('type'),

        ];
    }

}
