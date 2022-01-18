<?php declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'todos';
    protected $fillable = [
        'title',
        'description',
    ];
    protected $guarded = [
        'id',
        'created_at',
        'updated_at',
    ];
}