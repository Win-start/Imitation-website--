<?php

namespace App\Entity;

use Illuminate\Database\Eloquent\Model;

class Store extends Model {

    protected $table = 'store';
    protected $primaryKey = 'lo_id';
    public $timestamps = false;
}
