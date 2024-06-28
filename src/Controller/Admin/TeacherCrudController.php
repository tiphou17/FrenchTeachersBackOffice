<?php

namespace App\Controller\Admin;

use App\Entity\Teacher;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\CollectionField;
use EasyCorp\Bundle\EasyAdminBundle\Field\EmailField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TelephoneField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;

class TeacherCrudController extends AbstractCrudController
{
    public function configureActions(Actions $actions): Actions
    {
        return $actions
            // ...
            ->add(Crud::PAGE_INDEX, Action::DETAIL)

        ;
    }

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
            TextField::new('hook_sentence')
                ->hideOnIndex(),
            TextareaField::new('description')
                ->hideOnIndex(),
            TelephoneField::new('phone_number'),
            EmailField::new('email'),
            TextField::new('status'),
            ImageField::new('photo')
                ->setBasePath(self::TEACHER_BASE_PATH)
                ->setUploadDir(self::TEACHER_UPLOAD_DIR),
            TextField::new('video_path')
                ->hideOnIndex(),
            TextField::new('calendar_path')
                ->hideOnIndex(),
            CollectionField::new('teacherLanguages')
                ->hideOnForm()



        ];
    }

}
