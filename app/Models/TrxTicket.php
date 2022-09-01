<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrxTicket extends Model
{
    use HasFactory;

    protected $table = "trx_ticket";
    protected $fillable = ['alertid', 'chatid', 'title', 'tickettype','source','description','outletcode','outletreported','product','application','module','submodule','casetype'];
}
