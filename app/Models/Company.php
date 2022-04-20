<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'cellphone',
        'code',
        'description',
        'cep',
        'uf',
        'city',
        'neighborhood',
        'street',
        'img',
        'stars',

        'sunday-is-open',
        'sunday-from',
        'sunday-to',
        'sunday-lunch-from',
        'sunday-lunch-to',

        'monday-is-open',
        'monday-from',
        'monday-to',
        'monday-lunch-from',
        'monday-lunch-to',

        'tuesday-is-open',
        'tuesday-from',
        'tuesday-to',
        'tuesday-lunch-from',
        'tuesday-lunch-to',

        'wednesday-is-open',
        'wednesday-from',
        'wednesday-to',
        'wednesday-lunch-from',
        'wednesday-lunch-to',

        'thursday-is-open',
        'thursday-from',
        'thursday-to',
        'thursday-lunch-from',
        'thursday-lunch-to',

        'friday-is-open',
        'friday-from',
        'friday-to',
        'friday-lunch-from',
        'friday-lunch-to',

        'saturnday-is-open',
        'saturnday-from',
        'saturnday-to',
        'saturnday-lunch-from',
        'saturnday-lunch-to',

        'holiday-is-open',
        'holiday-from',
        'holiday-to',
        'holiday-lunch-from',
        'holiday-lunch-to',
    ];
}
