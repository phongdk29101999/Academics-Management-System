<?php
namespace App\Model\Entity;
use Cake\ORM\Entity;

class Branch extends Entity{
    protected $_accessible = [
        "name" => true,
        "description" => true,
        "college_id" => true,
        "start_date" => true,
        "end_date" => true,
        "total_seats" => true,
        "total_durations" => true,
        "status" => true,
        "created_at" => true,
    ];
}
?>