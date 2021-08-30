<?php

namespace App\Traits;

use Carbon\Carbon;
use Illuminate\Support\Facades\Log;

use App\Models\Company;

trait CompanyTrait 
{   
    public function getCompany()
    {
    	return Company::getCompanyDetails();
    }
}