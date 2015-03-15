<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Task extends Model {

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'due_date'];


    public function getDates()
    {
        return array(static::CREATED_AT, static::UPDATED_AT, 'due_date');
    }

}