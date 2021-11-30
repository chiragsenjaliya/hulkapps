<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Storage;

class PDFDoc extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'pdf_docs';

    protected $appends = ['file_path'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'file_name',
        'mime_type',
        'size',
    ];

    public function getFilePathAttribute()
    {
        return Storage::disk('public')->url('pdfs/'.$this->file_name);
    }
}
