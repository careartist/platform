<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Model;
use App\Models\User\Address;
use App\Models\User\ArtistProfile;

class Profile extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'screen_name',
        'first_name',
        'last_name',
        'subdomain',
        'avatar',
        'address_id',
        'account_type',
        'user_id',
    ];

    public function address()
    {
        return $this->hasOne(Address::class, 'id', 'address_id');
    }

    public function artist_profile()
    {
        return $this->hasOne(ArtistProfile::class, 'user_id', 'id');
    }
}
