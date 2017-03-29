<?php
namespace App\PiplModules\admin\Models;

use Illuminate\Database\Eloquent\Model;

class GlobalSetting extends Model 
{
	 protected $fillable = ['name','value','validate','lang_id'];

}