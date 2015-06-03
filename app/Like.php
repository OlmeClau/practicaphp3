<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Like extends Model {

	//
	protected $guarded = array();
	public function review()
	{
		return $this->belongsTo('App\Review');

	}

}
