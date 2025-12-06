<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Models\Traits\WIBTimezone;

class Guru extends Model {
    use WIBTimezone;

    protected $table = 'guru';
    protected $fillable = ['nip','nama','mapel'];
}