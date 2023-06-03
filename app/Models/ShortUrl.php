<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\ShortUrl
 *
 * @method static \Illuminate\Database\Eloquent\Builder|ShortUrl newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ShortUrl newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ShortUrl query()
 * @property int $id
 * @property string $original_url
 * @property string $hash
 * @property int $user_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|ShortUrl whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShortUrl whereHash($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShortUrl whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShortUrl whereOriginalUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShortUrl whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShortUrl whereUserId($value)
 * @property-read string $shortend_url
 * @mixin \Eloquent
 */
class ShortUrl extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'original_url',
        'hash',
        'user_id',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [];

    public function getShortendUrlAttribute(): string
    {
        return route('redirect.link', $this->hash);
    }
}
