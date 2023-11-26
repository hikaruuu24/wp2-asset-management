<?php

namespace App\Models;

use CodeIgniter\Model;

class MaintenanceTask extends Model
{
    protected $table = 'maintenance_task';
    protected $primaryKey = 'id';
    protected $allowedFields = ['maintenance_id', 'task', 'timestamp'];
}
