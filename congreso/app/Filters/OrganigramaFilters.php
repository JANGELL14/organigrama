<?php

namespace App\Filters;
use Illuminate\Http\Request;
use App\Filters\ApiFilters;

class OrganigramaFilters extends ApiFilters{

    protected $safeParams = [
        'area' => ['eq'],
        'description' => ['eq'],
        'level' => ['eq', 'gt', 'lt'],
        'areaType' => ['eq'],
        'titular' => ['eq'],
    ];

    protected $columMap =[

    ];
    protected $operatorMap =[
        'eq' => '=',
        'lt' => '<',
        'lte' => '<=',
        'gt' => '>',
        'gte' => '>='

    ];


}
