<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    public $timestamps = true;

    protected $table = "teachers";

    protected $primaryKey = "id";

    public function courses() {
        return $this->hasMany(Course::class);
    }
}
