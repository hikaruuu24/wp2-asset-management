<?php

namespace App\Models;

use CodeIgniter\Model;

class Type extends Model
{
    protected $table = 'type';
    protected $primaryKey = 'id';
    protected $allowedFields = ['name', 'timestamp'];
}
