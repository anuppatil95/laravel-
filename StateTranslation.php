<?php
namespace App\PiplModules\admin\Models;

use Illuminate\Database\Eloquent\Model as Eloquent ;

class StateTranslation extends Eloquent
{

    public $timestamps = true;
    protected $fillable = array('name');

}