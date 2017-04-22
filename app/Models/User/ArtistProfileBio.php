<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Model;

class ArtistProfileBio extends Model
{

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'artist_profiles_bio';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'bio',
        'tags',
    ];
}
