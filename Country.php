<?php
namespace App\PiplModules\admin\Models;

use Illuminate\Database\Eloquent\Model;

class Country extends Model 
{
 use \Dimsav\Translatable\Translatable;

    public $translatedAttributes = ['name'];
    protected $fillable = ['name'];

}