<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
class TechnologyHistory extends Model
{
    protected $fillable = [
        'technology_id',
        'name',
        'state_id',
        'type_id',
        'description',
        'description_classification',
        'status',
        'user_id',
    ];

    protected $with = ['type', 'state'];

    public function technology()
    {
        return $this->belongsTo(Technology::class);
    }

    public function type()
    {
        return $this->belongsTo(Type::class);
    }

    public function state()
    {
        return $this->belongsTo(State::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
