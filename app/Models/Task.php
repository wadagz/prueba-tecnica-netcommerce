<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Task extends Model
{
    use HasFactory;

    public $table = 'tasks';

    public $fillable = [
        'name',
        'description',
        'is_completed',
        'start_at',
        'expired_at',
    ];

    /**
     * Relation BelongsTo with Model Company.
     *
     * @return BelongsTo<Company, $this>
     */
    public function companies(): BelongsTo
    {
        return $this->belongsTo(Company::class);
    }
}
