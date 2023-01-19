<?php

namespace App\Models;

use Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class Lancamento extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'lancamentos';
    protected $fillable = [
        'id',
        'user_id',
        'categoria_id',
        'tipo',
        'valor',
        'data',
        'descricao'
    ];

    /**
     * Get the user associated with the Lancamento
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function categoria(): HasOne
    {
        return $this->hasOne(Categoria::class, 'id', 'categoria_id');
    }

    /**
     * Get the user that owns the Lancamento
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    
    public function setvalorAttribute($value)
    {
        $this->attributes['valor'] = str_replace(',', '.', str_replace('.', '', $value));;
    }
}
