<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Team as TeamModel;
use App\Models\League as LeagueModel;

class Fixture extends Model
{
    protected $fillable = [
        'home_team_id', 'away_team_id', 'league_id', 'date', 'score_home', 'score_away', 'status'
    ];

    // Relation équipe à domicile
    public function homeTeam() { return $this->belongsTo(TeamModel::class, 'home_team_id'); }

    // Relation équipe à l'extérieur
    public function awayTeam() { return $this->belongsTo(TeamModel::class, 'away_team_id'); }

    // Relation avec la ligue
    public function league() { return $this->belongsTo(LeagueModel::class); }

    // Scope pour les matchs en direct
    public function scopeLive($query)
    {
        return $query->where('status', 'live');
    }

    // Accessor pour le score formaté
    public function getScoreAttribute()
    {
        return $this->score_home . ' - ' . $this->score_away;
    }
}
