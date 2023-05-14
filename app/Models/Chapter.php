<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chapter extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $fillable = [
        'ten_chapter','chapter_truyen_id','tomtat_chapter','noidung_chapter','kichhoat_chapter'
    ];
    protected $primaryKey = 'chapter_id';
    protected $table = 'chapter';

    public function Truyen()
    {
      return $this->belongsTo('App\Models\Truyen','chapter_truyen_id');
    }
}
