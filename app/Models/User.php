<?php

namespace App\Models;

use App\Domain\Enums\RoleEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Carbon;
use Illuminate\Support\Collection;
use Laravel\Passport\HasApiTokens;

/**
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $password
 * @property string $remember_token
 * @property int $role_id
 * @property Role $role
 * @property Collection $notes
 * @property Carbon $created_at
 * @property Carbon $updated_at
 */
class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role_id',
    ];

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
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    /**
     * @return HasOne
     */
    public function role(): hasOne
    {
        return $this->hasOne(Role::class, 'id', 'role_id');
    }

    /**
     * @return HasMany
     */
    public function notes(): hasMany
    {
        return $this->hasMany(Note::class);
    }

    /**
     * @return bool
     */
    public function isAdmin(): bool
    {
        return $this->role->id == RoleEnum::admin->value;
    }

    /**
     * @return string
     */
    public function routeNotificationForMail(): string
    {
        return $this->email;
    }
}
