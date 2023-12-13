<?php

namespace App\Http\Controllers;

use App\Models\Staff;
use Illuminate\Http\Request;

class StaffController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $staffMembers = Staff::all();
        return view('staff.index', compact('staffMembers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('staff.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'area' => 'required',
            'description' => 'required',
            'level' => 'required',
            'areaType' => 'required',
            'titular' => 'required',
        ]);

        Staff::create($data);
        return redirect()->route('staffs.index');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $staffMember = Staff::find($id);
        return view('staff.show', compact('staffMember'));
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Staff $staff)
    {
        return view('staff.edit', compact('staff'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Staff $staff)
    {
        $data = $request->validate([
            'area' => 'required',
            'description' => 'required',
            'level' => 'required',
            'areaType' => 'required',
            'titular' => 'required',
        ]);

        $staff->update($data);

        return redirect()->route('staffs.index')->with('success', 'Los cambios se guardaron correctamente.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Staff $staff)
    {
        $message = 'Miembro del personal eliminado con éxito';

        try {
            $staff->delete();
        } catch (\Exception $e) {
            $message = 'Error al eliminar el miembro del personal';
        }
        return redirect()->route('staffs.index')->with('message', $message);
    }
}
