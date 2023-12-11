<?php

namespace App\Filters;
use Illuminate\Http\Request;

class ApiFilters{

    protected $safeParams =[];
    protected $columMap =[];
    protected $operatorMap =[];

    public function transform(Request $request){
        $eloQuery = [];

        foreach($this->safeParams as $parm => $operators){
            $query = $request->query($parm);
            if(!isset($query)){
                continue;
            }
            $colum = $this->columMap[$parm] ?? $parm;
            foreach($operators as $operator){
                if(isset($query[$operator])){
                    $eloQuery[] = [$colum, $this->operatorMap[$operator], $query[$operator]];
                }
            }
        }
        return $eloQuery;
    }
}
