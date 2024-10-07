<?php

namespace App\Http\Controllers;

use App\Models\Gudang;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class GudangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if($request->ajax()){
            return DataTables::of(Gudang::all())
            ->addColumn('action', function($row){
                $btn = "<a href='/gudang/" . $row->id . "/edit' class='btn btn-danger btn-sm ' style='margin-right:5px'><i class='bi bi-pencil-square'></i></a>";
                $btn .= '<button type="button" onclick="alert_delete(\'' . $row->id . '\')" class="btn btn-danger btn-sm"><i class="bi bi-trash-fill"></i></button>';
                return $btn;
            })
            ->rawColumns(['action'])
            ->addIndexColumn()
            ->make(true);
        }

        return view('gudang.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('gudang.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'location' => 'required',
            'capacity' => 'required',
            'status' => 'required|in:aktif,tidak_aktif',
            'opening_hour' => 'required|date_format:H:i',
            'closing_hour' => 'required|date_format:H:i|after:opening_hour',
        ]);

        Gudang::create($request->all());
    
        return redirect(route('gudang.index'))->with('success', 'Data gudang berhasil disimpan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data['gudang'] = Gudang::findOrFail($id);
        return view('gudang.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required',
            'location' => 'required',
            'capacity' => 'required',
            'status' => 'required|in:aktif,tidak_aktif',
        ]);

        $data = Gudang::findOrFail($id);
        $data->update($request->all());

        return redirect(route('gudang.index'))->with('success', 'Data gudang berhasil di update!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $gudang = Gudang::findOrFail($id);
        return $gudang->delete();
    }

}
