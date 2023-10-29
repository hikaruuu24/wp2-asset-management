<?php

namespace App\Models;

use CodeIgniter\Model;

class Asset extends Model
{
    protected $table = 'asset';
    protected $primaryKey = 'id';
    protected $allowedFields = ['name', 'purchase_date', 'price', 'image', 'description', 'type_id', 'category_id', 'timestamp'];
}
