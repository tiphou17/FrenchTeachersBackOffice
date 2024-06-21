<?php

namespace App\Controller\Admin;

use App\Entity\Teacher;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\EmailField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TelephoneField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class TeacherCrudController extends AbstractCrudController
{
    public const TEACHER_BASE_PATH = 'upload/images/teachers';
    public const TEACHER_UPLOAD_DIR = 'public/upload/images/teachers';
    public static function getEntityFqcn(): string
    {
        return Teacher::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('name'),
            TextField::new('hook_sentence'),
            TextEditorField::new('description'),
            TelephoneField::new('phone_number'),
            EmailField::new('email'),
            TextField::new('status'),
            ImageField::new('photo')
                ->setBasePath(self::TEACHER_BASE_PATH)
                ->setUploadDir(self::TEACHER_UPLOAD_DIR),
        ];
    }

}
