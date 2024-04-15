<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
<<<<<<< HEAD
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Str;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
=======

class User extends Authenticatable
{
    use HasFactory, Notifiable;
>>>>>>> e0e52116a513c334aa5bf04915070437adae30de

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
<<<<<<< HEAD
        'nom',
        'prenom',
        'email',
        'password',
        'role',
        'matricule',
    ];
    protected static function boot()
{
    parent::boot();

    static::creating(function ($user) {
        // Set matricule and password
        $user->matricule = Str::random(8);
        $user->password = Str::random(12);
    });

}



=======
        'name',
        'email',
        'password',
    ];
>>>>>>> e0e52116a513c334aa5bf04915070437adae30de

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
<<<<<<< HEAD
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
=======
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
}
>>>>>>> e0e52116a513c334aa5bf04915070437adae30de
