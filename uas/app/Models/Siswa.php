<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Models\Traits\WIBTimezone;

class Siswa extends Model {
    use WIBTimezone;
    
    protected $table = 'siswa';
    protected $fillable = ['nim','nama','kelas'];
}