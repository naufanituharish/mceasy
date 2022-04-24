<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeePermit extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'employee_permit';

    /**
     * The attributes that are mass assignable.
     * @var array
     */
    protected $fillable = [
        'permit_date',
        'permit_duration',
        'notes',
    ];

    /**
     * The attributes that aren't mass assignable.
     * @var array
     */
    protected $guarded = [];

    /**
     * The relation to employee.
     */
    public function employee()
    {
        return $this->belongsTo(Employee::class, 'employee_id', 'id');
    }
}
