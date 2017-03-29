<?php
namespace App\PiplModules\admin\Models;
use Illuminate\Database\Eloquent\Model;

class City extends Model 
{
	use \Dimsav\Translatable\Translatable;

        public $translatedAttributes = ['name'];
        protected $fillable = ['name','state_id','country_id'];
	
	public function state()
	{
		return $this->belongsTo('App\PiplModules\admin\Models\State');
	}
        public function country()
	{
		return $this->belongsTo('App\PiplModules\admin\Models\Country');
	}

}