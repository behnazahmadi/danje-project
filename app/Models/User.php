<?php

namespace App\Models;

use App\Jobs\sendEmailResetPasswordToUser;
use App\Jobs\sendEmailVerifyToUser;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Jetstream\HasTeams;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use HasTeams;
    use Notifiable;
    use TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name', 'email', 'password',"phone",
        "status","role","profile_image","about_me"
    ];


    public function roles(): BelongsToMany
    {
        return $this->belongsToMany(Role::class);
    }

    public function permissions(): BelongsToMany
    {
        return $this->belongsToMany(Permission::class);
    }

    public function hasPermission($permission): bool
    {
        return $this->permissions->contains("name",$permission->name) || $this->hasRole($permission->roles);
    }

    public function hasRole($roles): bool
    {
        return !! $roles->intersect($this->roles)->all();
    }

    public function blogs(): HasMany
    {
        return $this->hasMany(Blog::class);
    }

    public function messages(): BelongsToMany
    {
        return $this->belongsToMany(Message::class)->withTimestamps();
    }

    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class);
    }

    public function sendEmailVerificationNotification()
    {
        sendEmailVerifyToUser::dispatch($this);
    }

    public function sendPasswordResetNotification($token)
    {
        sendEmailResetPasswordToUser::dispatch($this,$token);
    }

    public function scopeLatestpaginate($query,$number)
    {
        return $query->latest()->paginate($number);
    }

    public function addComment($content): Model
    {
        return $this->comments()->create($content);
    }

    public function tickets(): HasMany
    {
        return $this->hasMany(Ticket::class);
    }


    public function checkPassword($data): bool
    {
        return Hash::check($data['old_password'], $this->password) ;
    }

    public function bookmarks(): HasMany
    {
        return $this->hasMany(Bookmark::class);
    }

    public function isBookmarked($blog): bool
    {
        return $this->bookmarks()->where("bookmarkable_id",$blog->id)->exists();
    }

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url',
    ];
}
