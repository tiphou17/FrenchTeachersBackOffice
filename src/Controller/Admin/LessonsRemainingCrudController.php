<?php

namespace App\Controller\Admin;

use App\Entity\LessonsRemaining;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class LessonsRemainingCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return LessonsRemaining::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')
                ->hideOnForm(),
            AssociationField::new('teacher'),
            AssociationField::new('user'),
            AssociationField::new('type'),
            IntegerField::new('balance')
        ];
    }

}
