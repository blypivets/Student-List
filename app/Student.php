<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Student extends Model
{
	/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['first_name', 'last_name', 'sex', 'birthdate', 'group', 'faculty'];


    /**
     * Get the age of the student.
     * 
     * @return integer number of years of student 
     */
    public function getAgeAttribute()
    {
    	return Carbon::parse($this->attributes['birthdate'])->age;
    }
    
}
