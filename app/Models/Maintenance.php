<?php

namespace App\Models;

use CodeIgniter\Model;

class Maintenance extends Model
{
    protected $table = 'maintenance';
    protected $primaryKey = 'id';
    protected $allowedFields = ['name', 'status', 'priority', 'completion_date', 'image', 'task', 'asset_id', 'user_id', 'timestamp', 'document'];
}
