<?php

namespace App\Controller\Admin;

use App\Entity\TeacherLanguage;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class TeacherLanguageCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return TeacherLanguage::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            AssociationField::new('teacher'),
            AssociationField::new('language'),

        ];
    }

}
