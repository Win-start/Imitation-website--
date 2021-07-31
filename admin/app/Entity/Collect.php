<?php
namespace App\Entity;

use Illuminate\Database\Eloquent\Model;

class Collect extends Model{
    protected $table = 'collect';
    protected $primaryKey = 'collect_id';
    public $timestamps = false;
}
