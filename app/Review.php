<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model {
	protected $connection = 'sqlite';


	//
public function movie()
	{
		return $this->belongsTo('App\Movie');
	}
	public function user()
	{
		return $this->belongsTo('App\User');
	}
	protected $guarded = array();
	public function likes()
	{
		return $this->hasMany('App\Like');
	}
	

}
