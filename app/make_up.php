<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class make_up extends Model
{
    protected $table = 'make_up';
    protected $fillable = [
                            'merek',
                            'kategori',
                            'warna',
                        ];
}
