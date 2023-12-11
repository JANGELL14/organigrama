<?php

namespace App\Http\Controllers;

use App\Filters\OrganigramaFilters;
use App\Http\Requests\StoreOrganigramaRequest;
use App\Http\Requests\UpdateOrganigramaRequest;
use App\Http\Resources\OrganigramaCollection;
use App\Http\Resources\OrganigramaResource;
use App\Models\Staff;
use Illuminate\Http\Request;

class ApiOrganigramaController extends Controller
{
    public function index(Request $request)
    {
        $filter = new OrganigramaFilters();
        $queryItems = $filter->transform($request);

        $staff = Staff::where($queryItems);
        return new OrganigramaCollection($staff->paginate()->appends($request->query()));
    }

    public function store(StoreOrganigramaRequest $request)
    {
        $staff = Staff::create($request->all());
        return response()->json(['message' => 'Registro creado exitosamente', 'data' => new OrganigramaResource($staff)]);
    }

    public function show(Staff $staff)
    {
        return new OrganigramaResource($staff);
    }

    public function update(UpdateOrganigramaRequest $request, Staff $staff)
    {
        $staff->update($request->all());
        return response()->json(['message' => 'Registro actualizado exitosamente', 'data' => new OrganigramaResource($staff)]);
    }

    public function destroy(Staff $staff)
    {
        $staff->delete();

        return response()->json(['message' => 'Registro eliminado exitosamente']);
    }
}
