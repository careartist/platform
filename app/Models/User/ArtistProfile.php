<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Model;
use App\Models\User\ArtistProfileBio;
use App\Models\Artist\Event;
use App\User;

class ArtistProfile extends Model
{

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'artist_profiles';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'cui_number',
        'legal_name',
        'authority',
        'approved',
        'rejected',
        'operated_by',
        'operated_at',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function artist_bio()
    {
        return $this->hasOne(ArtistProfileBio::class, 'profile_id', 'id');
    }

    public function artist_events()
    {
        return $this->hasMany(Event::class, 'profile_id', 'id');
    }
}