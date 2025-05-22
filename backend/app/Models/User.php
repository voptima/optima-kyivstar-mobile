<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;

class User extends Model
{
    use HasFactory, HasApiTokens, Notifiable;

    protected $fillable = [
        'surname', 'name', 'patronymic', 'phone', 'class', 'session_expires_at', 'active'
    ];

    protected $dates = ['session_expires_at'];
}
