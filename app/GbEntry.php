<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\GbEntry
 *
 * @property int $id
 * @property int $user_id
 * @property int $parent_id
 * @property string $title
 * @property string $content
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\App\GbEntry whereContent($value)
 * @method static \Illuminate\Database\Query\Builder|\App\GbEntry whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\GbEntry whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\GbEntry whereParentId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\GbEntry whereTitle($value)
 * @method static \Illuminate\Database\Query\Builder|\App\GbEntry whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\GbEntry whereUserId($value)
 * @mixin \Eloquent
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\GbEntry[] $children
 * @property-read \App\GbEntry|null $parent
 * @property-read \App\User|null $user
 */
class GbEntry extends Model
{
    protected $table = 'gb_entries';

    protected $fillable = ['title', 'content'];

    public function parent() {
        return $this->belongsTo(GbEntry::class);
    }

    public function children() {
        return $this->hasMany(GbEntry::class, 'parent_id');
    }

    public function user() {
        return $this->belongsTo(User::class);
    }
}
