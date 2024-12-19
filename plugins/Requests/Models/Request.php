<?php

namespace Plugins\Requests\Models;

use Illuminate\Database\Eloquent\Model;

class Request extends Model
{
    protected $fillable = [
        'request_number',
        'status',
        'gender',
        'name',
        'first_name',
        'last_name',
        'street',
        'house_number',
        'addition',
        'postal_code',
        'city',
        'email',
        'phone',
        'custom_questions'
    ];

    public function getStatusAttribute()
    {
        switch($this->getRawOriginal('status')) {
            case 'Nieuw':
                return '<span class="badge badge-info">Nieuw</span>';
            case 'Verzonden':
                return '<span class="badge badge-success">Verzonden</span>';
            case 'Geannuleerd':
                return '<span class="badge badge-danger">Geannuleerd</span>';
                
        }
    }
}
