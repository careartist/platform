<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Model;
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
        'uap_number',
        'legal_name',
        'authority',
        'phone_number',
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
}