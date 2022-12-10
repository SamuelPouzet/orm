<?php
require_once '../Orm/Master/ORM.php';
require_once 'Entity/ForumEntity.php';
require_once 'Entity/CategoryEntity.php';
$connexion = new ORM();
$entityx = $connexion->getRepository(CategoryEntity::class)->findBy([
    'name'=>'encore une sous catégorie',
]);
print_r( $entityx );
