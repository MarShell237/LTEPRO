<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    protected $fillable = ['name', 'logo', 'country', 'league_id'];

    // Relation avec les joueurs
    public function players() { return $this->hasMany(\App\Models\Player::class); }

    // Relation avec les matchs à domicile
    public function matchesHome() { return $this->hasMany(\App\Models\Match::class, 'home_team_id'); }

    // Relation avec les matchs à l'extérieur
    public function matchesAway() { return $this->hasMany(\App\Models\Match::class, 'away_team_id'); }

    // Relation avec la ligue
    public function league() { return $this->belongsTo(League::class); }

    // Scope pour filtrer par pays
    public function scopeOfCountry($query, $country)
    {
        return $query->where('country', $country);
    }

    // Accessor pour le logo complet
    public function getLogoUrlAttribute()
    {
        return $this->logo ? asset('storage/' . $this->logo) : asset('images/default_team.png');
    }
}
