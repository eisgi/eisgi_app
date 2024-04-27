<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seance extends Model
{
    /**
     * La clé primaire associée à la table.
     *
     * @var string
     */
    protected $primaryKey = 'ordreSeance';

    /**
     * Indique si les identifiants sont auto-incrémentés.
     *
     * @var bool
     */
    public $incrementing = false;

    /**
     * Indique si le modèle doit être horodaté.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * Les attributs pouvant être assignés en masse.
     *
     * @var array
     */
    protected $fillable = [
        'ordreSeance',
    ];

    /**
     * Les attributs qui devraient être convertis.
     *
     * @var array
     */
    protected $casts = [
        'ordreSeance' => 'integer',
    ];
}
