<?php
namespace App;
use Illuminate\Database\Eloquent\Model;

class Admin_goods extends Model
{
    public $primaryKey='gid';
    protected $table = 'admin_goods';
}
