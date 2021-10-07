<?php

namespace App\Controller\Admin;

use App\Entity\Compagnie;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;

class CompagnieCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Compagnie::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')
            ->onlyOnIndex(),
            TextField::new('name'),
            DateTimeField::new('create_at')->onlyOnIndex(),
            DateTimeField::new('update_ate')->onlyOnIndex(),

        ];
    }
    
}
