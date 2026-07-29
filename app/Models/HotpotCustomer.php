<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
// app/Models/HotpotCustomer.php
class HotpotCustomer extends Model
{
    protected $fillable = ['name', 'phone', 'table_number'];
}
