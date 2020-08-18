<?php
namespace App\Model\Entity;
use Cake\ORM\Entity;

class Staff extends Entity{
    protected $_accessible = [
        "name" => true,
        "email" => true,
        "phone_no" => true,
        "college_id" => true,
        "branch_id" => true,
        "designation" => true,
        "staff_type" => true,
        "address" => true,
        "blood_group" => true,
        "gender" => true,
        "profile_image" => true,
        "dob" => true,
        "status" => true,
        "create_at" => true,
    ];
}
?>