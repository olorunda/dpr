<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class institution extends Model
{
    //
	protected $table="institutions";

	protected $fillable = [
		'user_ref', 'iname', 'sname', 'pname', 'course', 'istart_date', 'iend_date', 'sstart_date', 'send_date', 'pstart_date', 'pend_date',  'degree', 'grade', 'ifile', 'sfile', 'pfile'
	];
}
