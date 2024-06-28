<?php

namespace App\Controller\Admin;

use App\Entity\Content;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;


class ContentCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Content::class;
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
            IdField::new('id')
                ->hideOnForm(),
            TextField::new('component_name')
            // ->setDisabled(true)
            ,
            TextareaField::new('value'),
        ];
    }

}
