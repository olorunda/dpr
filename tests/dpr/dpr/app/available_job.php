<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class available_job extends Model
{
    //
	protected $table='available_jobs';
	protected $fillable=['ref_no','position','qualification','description','type'];
}
