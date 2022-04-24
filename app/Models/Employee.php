<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     * @var array
     */
    protected $fillable = [
        'reg_id',
        'name',
        'address',
        'birth_date',
        'join_date',
    ];

    /**
     * The attributes that aren't mass assignable.
     * @var array
     */
    protected $guarded = [];

    /**
     * The relation to employeePermit.
     */
    public function permit()
    {
        return $this->hasMany(EmployeePermit::class);
    }
}
