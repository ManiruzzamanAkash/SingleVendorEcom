<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Category;
use App\Helpers\StringHelper;
use Image;
use File;
use DataTables;

class CategoriesController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth:admin');
  }

  public function index(Request $request)
  {  

    if (request()->ajax()) {

      $categories = Category::orderBy('id', 'asc')->get();

      $datatable = DataTables::of($categories)
        ->addIndexColumn()
        ->addColumn(
          'action',
          function ($row) {
            $csrf = "" . csrf_field() . "";
            $method_delete = "" . method_field("post") . "";
            $html = '';

            $html .= '<a class="btn waves-effect waves-light btn-success btn-sm btn-circle ml-1 p-1 " title="Edit Blog Details" href="' . route('admin.category.edit', $row->id) . '"><i class="fa fa-edit"></i></a>';

            $html .= '<a class="btn waves-effect waves-light btn-danger btn-sm btn-circle ml-1 p-1 text-white" title="Delete Admin" id="deleteItem' . $row->id . '"><i class="fa fa-trash"></i></a>';

            $html .= '<script>
                        $("#deleteItem' . $row->id . '").click(function(){
                            swal.fire({ title: "Are you sure?",text: "Category will be deleted !",type: "warning",showCancelButton: true,confirmButtonColor: "#DD6B55",confirmButtonText: "Yes, delete it!"
                            }).then((result) => { if (result.value) {$("#deletePermanentForm' . $row->id . '").submit();}})
                        });
                      </script>';

            $deleteRoute =  route('admin.category.delete', $row->id);
            $html .= '
                  <form id="deletePermanentForm' . $row->id . '" action="' . $deleteRoute . '" method="post" style="display:none">' . $csrf . $method_delete . '
                      <button type="submit" class="btn waves-effect waves-light btn-rounded btn-success"><i
                              class="fa fa-check"></i> Confirm Permanent Delete</button>
                      <button type="button" class="btn waves-effect waves-light btn-rounded btn-secondary" data-dismiss="modal"><i
                              class="fa fa-times"></i> Cancel</button>
                  </form>';

            return $html;
          }
        )

        ->editColumn('name', function ($row) {
          $html = $row->name;
          $html .= '<br /><a href="' . route('categories.show', $row->slug) . '" target="_blank"><i class="fa fa-link"></i> View</a>';
          return $html;
        })->escapeColumns([])
        
        ->editColumn('show_homepage', function ($row) {
          return $row->show_homepage ? '<span class="badge badge-success">Yes</span>' : '<span class="badge badge-warning">No</span>';
        })->escapeColumns([])

        ->editColumn('show_navbar', function ($row) {
          return $row->show_navbar ? '<span class="badge badge-success">Yes</span>' : '<span class="badge badge-warning">No</span>';
        })->escapeColumns([])

        ->editColumn('status', function ($row) {
          return $row->status ? '<span class="badge badge-success">Active</span>' : '<span class="badge badge-danger">Inactive</span>';
        })->escapeColumns([])

        ->editColumn('image', function ($row) {
          if ($row->image != null) {
            return "<img height='50px' width='50px' src='" . asset('images/categories/' . $row->image) . "' class='img img-display-list' />";
        }
        return '-';
        })

        ->editColumn('parent_id', function ($row) {
          
          if ($row->parent_id == null) {
            return '<span>-</span>';
          } else {
            return Category::where('parent_id', $row->parent_id)->first()->name;
          }
        });
        
        $rawColumns = ['action', 'title', 'parent_id', 'image'];
        return $datatable->rawColumns($rawColumns)
          ->make(true);
    }

    
    return view('backend.pages.categories.index');
  }

  public function create()
  {
    $main_categories = Category::orderBy('name', 'desc')->where('parent_id', NULL)->get();
    return view('backend.pages.categories.create', compact('main_categories'));
  }

  public function store(Request $request)
  {
    $this->validate(
      $request,
      [
        'name'  => 'required',
        'image'  => 'nullable|image',
        'slug'  => 'nullable|unique:categories',
      ],
      [
        'name.required'  => 'Please provide a category name',
        'image.image'  => 'Please provide a valid image with .jpg, .png, .gif, .jpeg exrension..',
      ]
    );

    $category                    = new Category();
    $category->name              = $request->name;
    $category->sub_header        = $request->sub_header;
    $category->slider_name       = $request->slider_name;
    $category->slider_slogan     = $request->slider_slogan;

    $category->show_homepage     = $request->show_homepage;
    $category->show_navbar       = $request->show_navbar;
    $category->homepage_priority = $request->homepage_priority;
    $category->navbar_priority   = $request->navbar_priority;
    $category->status            = $request->status;

    if (empty($request->slug)) {
      $category->slug = StringHelper::createSlug($request->name, 'Category', 'slug', '-');
    } else {
      $category->slug = StringHelper::createSlug($request->slug, 'Category', 'slug', '-');
    }
    $category->description = $request->description;
    $category->parent_id = $request->parent_id;
    //insert images also

    if ($request->image > 0) {
      $image = $request->file('image');
      $img = time() . '.' . $image->getClientOriginalExtension();
      $location = ('images/categories/' . $img);
      Image::make($image)->save($location);
      $category->image = $img;
    }
    $category->save();

    session()->flash('success', 'A new category has added successfully !!');
    return redirect()->route('admin.categories');
  }

  public function edit($id)
  {
    $main_categories = Category::orderBy('name', 'desc')->where('parent_id', NULL)->get();
    $category = Category::find($id);
    if (!is_null($category)) {
      return view('backend.pages.categories.edit', compact('category', 'main_categories'));
    } else {
      return resirect()->route('admin.categories');
    }
  }


  public function update(Request $request, $id)
  {
    $category = Category::find($id);
    $this->validate(
      $request,
      [
        'name'  => 'required',
        'image'  => 'nullable|image',
        'slug'  => 'nullable|unique:categories,slug,' . $category->id,
      ],
      [
        'name.required'  => 'Please provide a category name',
        'image.image'  => 'Please provide a valid image with .jpg, .png, .gif, .jpeg exrension..',
      ]
    );

    $category->name              = $request->name;
    $category->sub_header        = $request->sub_header;
    $category->slider_name       = $request->slider_name;
    $category->slider_slogan     = $request->slider_slogan;
    
    $category->show_homepage     = $request->show_homepage;
    $category->show_navbar       = $request->show_navbar;
    $category->homepage_priority = $request->homepage_priority;
    $category->navbar_priority   = $request->navbar_priority;
    $category->status            = $request->status;

    if (empty($request->slug)) {
      $category->slug = StringHelper::createSlug($request->name, 'Category', 'slug', '-');
    } else {
      $category->slug = $request->slug;
    }
    $category->description = $request->description;
    $category->parent_id = $request->parent_id;
    //insert images also
    if ($request->image > 0) {
      //Delete the old image from folder

      if (File::exists('images/categories/' . $category->image)) {
        File::delete('images/categories/' . $category->image);
      }

      $image = $request->file('image');
      $img = time() . '.' . $image->getClientOriginalExtension();
      $location = ('images/categories/' . $img);
      Image::make($image)->save($location);
      $category->image = $img;
    }
    $category->save();

    session()->flash('success', 'Category has updated successfully !!');
    return redirect()->route('admin.categories');
  }

  public function delete($id)
  {
    $category = Category::find($id);
    if (!is_null($category)) {
      // If it is parent category, then delete all its sub category
      if ($category->parent_id == NULL) {
        // Delete sub categories
        $sub_categories = Category::orderBy('name', 'desc')->where('parent_id', $category->id)->get();

        foreach ($sub_categories as $sub) {
          // Delete category image
          if (File::exists('images/categories/' . $sub->image)) {
            File::delete('images/categories/' . $sub->image);
          }
          $sub->delete();
        }
      }

      // Delete category image
      if (File::exists('images/categories/' . $category->image)) {
        File::delete('images/categories/' . $category->image);
      }
      $category->delete();
    }
    session()->flash('success', 'Brand has deleted successfully !!');
    return back();
  }
}
