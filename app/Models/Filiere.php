<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\OptionFiliere;
class Filiere extends Model
{
    public $incrementing = false; 
    protected $primaryKey = 'codeFiliere';
    protected $fillable = [
        'codeFiliere',
        'libelleFiliere',
    ];
    public $timestamps = false;


    public function options()
    {
        return $this->hasMany(OptionFiliere::class, 'codeFiliere', 'codeFiliere');
    }
    use HasFactory;
}
