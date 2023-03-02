<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function color()
    {
        return $this->belongsTo(Color::class);
    }

    public function tape()
    {
        return $this->belongsTo(Tape::class);
    }

    public function handle()
    {
        return $this->belongsTo(Handle::class);
    }

    public function width()
    {
        return $this->belongsTo(Width::class);
    }

    public function height()
    {
        return $this->belongsTo(Height::class);
    }

    public function open()
    {
        return $this->belongsTo(Open::class);
    }

    public function decoration()
    {
        return $this->belongsTo(Decoration::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
