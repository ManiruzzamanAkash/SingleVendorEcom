<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Brand;
use App\Helpers\StringHelper;
use Image;
use File;
use DataTables;

class BrandsController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth:admin');
  }
  
  public function index()
  {
    if (request()->ajax()) {
      
      $brands = Brand::orderBy('id', 'desc')->get();
      
      $datatable = DataTables::of($brands)
          ->addIndexColumn()
          ->addColumn(
              'action',
              function ($row) {
                  $csrf = "" . csrf_field() . "";
                  $method_delete = "" . method_field("post") . "";
                  $html = '';

                  $html .= '<a class="btn waves-effect waves-light btn-success btn-sm btn-circle ml-1 p-1 " title="Edit Blog Details" href="' . route('admin.brand.edit', $row->id) . '"><i class="fa fa-edit"></i></a>';

                  $html .= '<a class="btn waves-effect waves-light btn-danger btn-sm btn-circle ml-1 p-1 text-white" title="Delete Admin" id="deleteItem' . $row->id . '"><i class="fa fa-trash"></i></a>';

                  $html .= '<script>
                                    $("#deleteItem' . $row->id . '").click(function(){
                                        swal.fire({ title: "Are you sure?",text: "Advertisement will be deleted as trashed !",type: "warning",showCancelButton: true,confirmButtonColor: "#DD6B55",confirmButtonText: "Yes, delete it!"
                                        }).then((result) => { if (result.value) {$("#deletePermanentForm' . $row->id . '").submit();}})
                                    });
                                </script>';
                  
                  $deleteRoute =  route('admin.brand.delete', $row->id);
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

          ->editColumn('title', function ($row) {
              return $row->title;
          })
          ->editColumn('image', function ($row) {
            if ($row->image != null) {
              return "<img height='50px' width='50px' src='" . asset('images/brands/' . $row->image) . "' class='img img-display-list' />";
          }
          return '-';
          });
      $rawColumns = ['action', 'title', 'image'];
      return $datatable->rawColumns($rawColumns)
          ->make(true);
  }
    // $brands = Brand::orderBy('id', 'desc')->get();
     return view('backend.pages.brands.index');
  }

  public function create()
  {
    return view('backend.pages.brands.create');
  }

  public function store(Request $request)
  {
    $this->validate($request, [
      'name'  => 'required',
      'image'  => 'nullable|image',
      'slug'  => 'nullable|unique:brands'
    ],
    [
      'name.required'  => 'Please provide a brand name',
      'image.image'  => 'Please provide a valid image with .jpg, .png, .gif, .jpeg exrension..',
    ]);

    $brand = new Brand();
    $brand->name = $request->name;
    if (empty($request->slug)) {
        $brand->slug = StringHelper::createSlug($request->name, 'Brand', 'slug', '-');
      }else{
        $brand->slug = StringHelper::createSlug($request->slug, 'Brand', 'slug', '-');
      }
    $brand->description = $request->description;
    //insert images also
    
    // count($request->image) > 0
    if ($request->hasFile('image')) {
        $image = $request->file('image');
        $img = time() . '.'. $image->getClientOriginalExtension();
        $location = 'images/brands/' .$img;
        Image::make($image)->save($location);
        $brand->image = $img;
    }
    $brand->save();

    session()->flash('success', 'A new brand has added successfully !!');
    return redirect()->route('admin.brands');

  }

  public function edit($id)
  {
    $brand= Brand::find($id);
    if (!is_null($brand)) {
      return view('backend.pages.brands.edit', compact('brand'));
    }else {
      return resirect()->route('admin.brands');
    }
  }


    public function update(Request $request, $id)
    {

      $brand = Brand::find($id);
      
      $this->validate($request, [
        'name'  => 'required',
        'image'  => 'nullable|image',
        'slug'  => 'nullable|unique:brands,slug,'.$brand->id,
      ],
      [
        'name.required'  => 'Please provide a brand name',
        'image.image'  => 'Please provide a valid image with .jpg, .png, .gif, .jpeg exrension..',
      ]);

      $brand->name = $request->name;
      if (empty($request->slug)) {
        $brand->slug = StringHelper::createSlug($request->name, 'Brand', 'slug', '-');
      }else{
        $brand->slug = $request->slug;
      }
      $brand->description = $request->description;
      //insert images also
      if ($request->image) {
        //Delete the old image from folder

          if (File::exists('images/brands/'.$brand->image)) {
            File::delete('images/brands/'.$brand->image);
          }

          $image = $request->file('image');
          $img = time() . '.'. $image->getClientOriginalExtension();
          $location = 'images/brands/' .$img;
          Image::make($image)->save($location);
          $brand->image = $img;
      }
      $brand->save();

      session()->flash('success', 'Brand has updated successfully !!');
      return redirect()->route('admin.brands');

    }

    public function delete($id)
    {
      $brand = Brand::find($id);
      if (!is_null($brand)) {
        // Delete brand image
        if (File::exists('images/brands/'.$brand->image)) {
          File::delete('images/brands/'.$brand->image);
        }
        $brand->delete();
      }
      session()->flash('success', 'Brand has deleted successfully !!');
      return back();

    }
}
