<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    public $timestamps = true;

    protected $table = "courses";

    protected $primaryKey = "id";

    public function teacher() {
        return $this->belongsTo(Teacher::class);
    }
}
