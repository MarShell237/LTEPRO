<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class League extends Model
{
    protected $fillable = ['name', 'country', 'logo'];
    public function matches() { return $this->hasMany(\App\Models\Match::class); }
}
