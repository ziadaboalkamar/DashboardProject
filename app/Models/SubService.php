<?php

namespace App\Models;

use App\Models\Services;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SubService extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'name_en',
        'description',
        'description_en',
        'image',
        'service_id',
      
    ];
    protected $timestamp = true;

    public function services(){
        return $this->belongsTo(Services::class,'service_id');
 
    }
}
