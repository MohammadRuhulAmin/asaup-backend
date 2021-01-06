<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Partner extends Model
{
    protected $fillable = [
        'partner_company_name',
        'partner_company_address','partner_company_contact','partner_company_logo',
        'partner_company_status'
    ];

}
