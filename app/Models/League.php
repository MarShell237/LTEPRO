<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class League extends Model
{
    protected $fillable = ['name', 'country', 'logo'];
    public function fixtures() { return $this->hasMany(\App\Models\Fixture::class); }
}
