<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\TelescopeEntry
 *
 * @property integer $sequence
 * @property string $uuid
 * @property string $batch_id
 * @property string $family_hash
 * @property boolean $should_display_on_index
 * @property string $type
 * @property string $content
 * @property string $created_at
 * @property TelescopeEntriesTag[] $telescopeEntriesTags
 * @property-read int|null $telescope_entries_tags_count
 * @method static \Illuminate\Database\Eloquent\Builder|TelescopeEntry newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TelescopeEntry newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TelescopeEntry query()
 * @method static \Illuminate\Database\Eloquent\Builder|TelescopeEntry whereBatchId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TelescopeEntry whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TelescopeEntry whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TelescopeEntry whereFamilyHash($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TelescopeEntry whereSequence($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TelescopeEntry whereShouldDisplayOnIndex($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TelescopeEntry whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TelescopeEntry whereUuid($value)
 * @mixin \Eloquent
 */
class TelescopeEntry extends Model
{
    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'sequence';

    /**
     * @var array
     */
    protected $fillable = ['uuid', 'batch_id', 'family_hash', 'should_display_on_index', 'type', 'content', 'created_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function telescopeEntriesTags()
    {
        return $this->hasMany('App\Models\TelescopeEntriesTag', 'entry_uuid', 'uuid');
    }
}
