<?php

namespace App\Http\Controllers;

use App\Models\Report;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use Symfony\Component\HttpFoundation\Response;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        echo json_encode(Report::all());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if ($request->post('name')) {
            if (!$request->post('email')) {
                return response()->json(['error' => 'Email is required'], Response::HTTP_BAD_REQUEST);
            } else if (!$request->post('description')) {
                return response()->json(['error' => 'Description is required'], Response::HTTP_BAD_REQUEST);
            }
        } else {
            return response()->json(['error' => 'Name is required'], Response::HTTP_BAD_REQUEST);
        }
        $report = new Report();
        $report->name = $request->post('name');
        $report->email = $request->post('email');
        $report->description = $request->post('description');
        $report->latitude = $request->post('latitude');
        $report->longitude = $request->post('longitude');
        if($request->hasFile('image')){
            $image = $request->file('image');
            $filename = time() . '.png';
            Storage::put('public/images/' . $filename, file_get_contents($image));
            $report->image = $filename;
        }
        $report->save();
    }

    /**
     * Display the specified resource.
     */
    public function show(Report $report) {}

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Report $report)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Report $report)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $report = Report::find($id);

        if (!$report) {
            return response()->json(['message' => 'Report not found'], 404);
        }

        $report->delete();

        return response()->json(['message' => 'Report deleted successfully']);
    }
}
