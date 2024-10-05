<?php

namespace App\Http\Controllers;

use App\Http\Requests\StudentRequest;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class StudentController extends Controller
{
    const VIEW_PATH = 'student.';
    public function index(Request $request)
    {
        $search = $request->input('search');
        $sortBy = $request->input('sort_by', 'id');  // Mặc định là sắp xếp theo 'id'
        $sortOrder = $request->input('sort_order', 'asc');  // Mặc định là 'asc' (tăng dần)
    
        // Truy vấn dữ liệu với tìm kiếm và sắp xếp sau khi tìm kiếm
        $data = Student::query()
            ->when($search, function ($query, $search) {
                return $query->where(function ($query) use ($search) {
                    $query->where('name', 'like', "%{$search}%")
                        ->orWhere('tel', 'like', "%{$search}%")
                        ->orWhere('gender', 'like', "%{$search}%")
                        ->orWhere('address', 'like', "%{$search}%");
                });
            })
            ->orderBy($sortBy, $sortOrder)  // Sắp xếp kết quả đã tìm kiếm theo cột và thứ tự
            ->paginate(5);
    
        return view(self::VIEW_PATH . __FUNCTION__, compact('data', 'search', 'sortBy', 'sortOrder'));
    }
    






    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view(view: self::VIEW_PATH . __FUNCTION__);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StudentRequest $request)
    {
        if ($request->isMethod('POST')) {
            $data = $request->except('_token');

            if ($request->hasFile('image')) {
                $fileName = $request->file('image')->store('upload/student', 'public');
            } else {
                $fileName = null;
            }
            $data['image'] = $fileName;

            Student::create($data);;

            return redirect()->route('student.index');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = Student::query()->findOrFail($id);

        return view(self::VIEW_PATH . __FUNCTION__, compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $model = Student::query()->findOrFail($id);
        return view(self::VIEW_PATH . __FUNCTION__, compact('model'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StudentRequest $request, string $id)
    {

        $model = Student::query()->findOrFail($id);

        if ($request->isMethod('put')) {
            $data = $request->except('_token');

            if ($request->hasFile('image')) {
                $fileName = $request->file('image')->store('upload/student',  'public');
            } else {
                $fileName = $model->image;
            }
            $data['image'] = $fileName;
            $cureeImage = $model->image;

            $model->update($data);

            if ($cureeImage && $cureeImage != '' && Storage::disk('public')->exists($cureeImage)) {
                Storage::disk('public')->delete($cureeImage);
            }
            return redirect()->route('student.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $model = Student::query()->findOrFail($id);

        $cureeImage = $model->image;

        $model->delete();

        if ($cureeImage && Storage::disk('public')->exists($cureeImage)) {
            Storage::disk('public')->delete($cureeImage);
        }
        return redirect()->route('student.index');
    }
}
