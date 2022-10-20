<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Model;

class Employe extends Model
{
    use HasFactory,HasTranslations;

    public $translatable = ['name'];
    protected $guarded =[];


    public function gender()
    {
        return $this->belongsTo(Gender::class, 'gender_id');
    }

    public function nationalitie()
    {
        return $this->belongsTo(Nationalitie::class, 'nationalitie_id');
    }

    public function blood()
    {
        return $this->belongsTo(Blood::class, 'blood_id');
    }

    public function specialization()
    {
        return $this->belongsTo('App\Models\Specialization', 'specialization_id');
    }

    public function religion()
    {
        return $this->belongsTo('App\Models\Religion', 'religion_id');
    }
}
