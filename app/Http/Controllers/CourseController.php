<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StoreCourseRequest;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.courses.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = category::all();
        return view('admin.courses.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCourseRequest $request)
    {
        DB::transaction(function () use ($request) {
            $validated = $request->validated();

            if (isset($validated['name'])) {
                $validated['slug'] = Str::slug($validated['name']);
            }

            if ($request->hasFile('cover')) {
                $coverPath = $request->file('cover')->store('Course', 'public');
                $validated['cover'] = $coverPath;
            }

            $newAbout = Course::create($validated);

        });

        return redirect()->route('dashboard');
    }

    /**
     * Display the specified resource.
     */
    public function show(Course $course)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Course $course)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Course $course)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Course $course)
    {
        //
    }
}
