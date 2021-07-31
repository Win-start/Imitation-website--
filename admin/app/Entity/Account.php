<?php
namespace App\Entity;

use Illuminate\Database\Eloquent\Model;

class Account extends Model{
    protected $table = 'account';
    protected $primaryKey = 'account_id';
    public $timestamps = false;
}
