<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AlertGroup extends Model
{
    protected $table = "alertgroup";

    protected $fillable = ['alertid', 'nodename', 'nodeipaddress', 'location', 'cpuload', 'memoryused', 'status'];
}
