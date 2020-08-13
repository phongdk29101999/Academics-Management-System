<?php
namespace App\Model\Entity;
use Cake\ORM\Entity;

class College extends Entity{
    protected $_accessible = [
        "name" => true,
        "short_name" => true,
        "description" => true,
        "location" => true,
        "total_faculty" => true,
        "contact_number" => true,
        "email" => true,
        "cover_image" => true,
        "status" => true, 
    ];
}
?>