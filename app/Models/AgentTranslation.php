<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AgentTranslation extends Model
{
    use HasFactory;

    protected $table = 'agent_translations';
    protected $fillable = ['about', 'locale'];
}
