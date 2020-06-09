<?php

namespace App\Http\Controllers;

use App\Menu;
use Illuminate\Http\Request;
use App\Components\Recusive;
use Illuminate\Support\Str;

class MenuController extends Controller
{
    private $menu;

    public function __construct(Menu $menu)
    {
        $this->menu = $menu;
    }

    public function index()
    {
        $menus = $this->menu->latest()->paginate(5);
        return view('menu.index', compact('menus'));
    }

    // public function create()
    // {
    //     $htmlOption = $this->getCategory(null);

    //     return view('category.add', compact('htmlOption'));
    // }
    
    // public function store(Request $request)
    // {
    //     $this->category->create([
    //         'name' => $request->name,
    //         'parent_id' => $request->parent_id,
    //         'slug' => Str::of($request->name)->slug('-')
    //     ]);

    //     return redirect()->route('categories.index')->with('success', 'Tạo mới danh mục thành công!');
    // }

    // public function getCategory($parentId)
    // {
    //     $data = $this->category->all();
    //     $recusive = new Recusive($data);
    //     $htmlOption = $recusive->categoryRecusive($parentId);

    //     return $htmlOption;
    // }

    // public function edit($id)
    // {
    //     $category = $this->category->find($id);
    //     $htmlOption = $this->getCategory($category->parent_id);
        
    //     return view('category.edit', compact('category', 'htmlOption'));
    // }

    // public function update($id, Request $request)
    // {
    //     $this->category->find($id)->update([
    //         'name' => $request->name,
    //         'parent_id' => $request->parent_id,
    //         'slug' => Str::of($request->name)->slug('-')
    //     ]);

    //     return redirect()->route('categories.index')->with('success', 'Sửa danh mục thành công!');
    // }

    // public function delete($id)
    // {
    //     $this->category->find($id)->delete();

    //     return redirect()->route('categories.index')->with('success', 'Xóa danh mục thành công!');
    // }
}
 