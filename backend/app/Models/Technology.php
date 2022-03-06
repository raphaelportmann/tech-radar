<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
class Technology extends Model
{
    protected $fillable = [
        'name',
        'state_id',
        'type_id',
        'description',
        'description_classification',
        'status',
        'user_id',
    ];

    protected $with = ['type', 'state'];

    public function technologyHistories()
    {
        return $this->hasMany(TechnologyHistory::class);
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

    public function getModelLabel()
    {
        return $this->name;
    }
}
