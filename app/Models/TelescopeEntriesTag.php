<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\TelescopeEntriesTag
 *
 * @property string $entry_uuid
 * @property string $tag
 * @property TelescopeEntry $telescopeEntry
 * @method static \Illuminate\Database\Eloquent\Builder|TelescopeEntriesTag newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TelescopeEntriesTag newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TelescopeEntriesTag query()
 * @method static \Illuminate\Database\Eloquent\Builder|TelescopeEntriesTag whereEntryUuid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TelescopeEntriesTag whereTag($value)
 * @mixin \Eloquent
 */
class TelescopeEntriesTag extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['entry_uuid', 'tag'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function telescopeEntry()
    {
        return $this->belongsTo('App\Models\TelescopeEntry', 'entry_uuid', 'uuid');
    }
}
