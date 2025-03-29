<?php

namespace App\Http\Controllers;
use App\Models\Lawyer;
use App\Models\Cases;

use Illuminate\Http\Request;

class CaseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $case = Cases::with('lawer')->paginate(8);
        return view('case.index', compact('case'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $lawyer = Lawyer::all();
        $status = ['open', 'in_progress', 'appealed'];
        return view('case.create', compact('lawyer','status'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    { 
        $request->validate([
            'lawer_id' => 'required|', 
            'case_number' => 'required|numeric',   
            'title' => 'required|max:255',        
            'status' => 'required',                   
        ]);
        Cases::create($request->all());

        return redirect()->route('case.index')->with('success', 'Vụ án đã được thêm thành công!');
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
        $case = Cases::findOrFail($id);
        $lawyer = Lawyer::all();
        $status = ['open', 'in_progress','appealed'];
        return view('case.edit', compact('case','lawyer','status'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'lawer_id' => 'required|', 
            'case_number' => 'required|numeric',   
            'title' => 'required|max:255',         
            'status' => 'required',                   
        ]);

        $case = Cases::find($id);
        if (!$case) {
            return redirect()->route('case.index')->with('error', 'Không tìm thấy vụ án!');
        } 
        // Cập nhật thông tin
        $case->update($request->all());
    
        // Điều hướng trở lại trang index với thông báo thành công
        return redirect()->route('case.index')->with('success', 'Vụ án được cập nhật thành công');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $case = Cases::findOrFail($id);
        $case -> delete();

        return redirect()->route('case.index')->with('success', 'Vụ án đã được xóa thành công!');
    }
}
