<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Models\Traits\WIBTimezone;

class Kelas extends Model {
    use WIBTimezone;
    
    protected $table = 'kelas';
    protected $fillable = ['kode','nama','kapasitas'];
}