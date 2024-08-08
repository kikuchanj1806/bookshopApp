<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tag;
use Illuminate\Support\Facades\Session;

class TagController extends Controller
{
    public function index()
    {
        $tags = Tag::paginate(10);
        return view('admin.tags.index', compact('tags'));
    }

    public function create()
    {
        return view('admin.tags.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:tags|max:255',
        ]);

        try {
            Tag::create($request->all());
            Session::flash('success', 'Tạo tag thành công');
        } catch (\Exception $e) {
            Session::flash('error', 'Tạo tag thất bại: ' . $e->getMessage());
        }

        return redirect()->route('admin.tags.index');
    }

    public function edit($id)
    {
        $tag = Tag::findOrFail($id);
        return view('admin.tags.edit', compact('tag'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|unique:tags,name,' . $id . '|max:255',
        ]);

        try {
            $tag = Tag::findOrFail($id);
            $tag->update($request->all());
            Session::flash('success', 'Cập nhật tag thành công');
        } catch (\Exception $e) {
            Session::flash('error', 'Cập nhật tag thất bại: ' . $e->getMessage());
        }

        return redirect()->route('admin.tags.index');
    }

    public function destroy($id)
    {
        try {
            Tag::destroy($id);
            Session::flash('success', 'Xóa tag thành công');
        } catch (\Exception $e) {
            Session::flash('error', 'Xóa tag thất bại: ' . $e->getMessage());
        }

        return redirect()->route('admin.tags.index');
    }
}
