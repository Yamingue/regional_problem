<?php

namespace App\Controller\Admin;

use App\Entity\Zone;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;

class ZoneCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Zone::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
       
            yield IdField::new('id')->onlyOnIndex();
            yield TextField::new('name');
            yield DateTimeField::new('create_at')->onlyOnIndex();
            yield DateTimeField::new('update_at')->onlyOnIndex();
        
    }

}
