<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Model;
use App\Models\User\ArtistProfile;
use App\User;

class RoleRequest extends Model
{

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'role_requests';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'artist_profile_id',
        'user_id',
        'role',
    ];

    public function user()
    {
    	return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function artist_profile()
    {
        return $this->belongsTo(ArtistProfile::class, 'user_id', 'user_id');
    }
}
