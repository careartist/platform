<?php

namespace App\Models\Artist;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'artist_events';
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'description',
        'type',
        'price',
        'contact_name',
        'contact_email',
        'contact_phone',
        'start_at',
        'end_at',
        'profile_id',
    ];
}