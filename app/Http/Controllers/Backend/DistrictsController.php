<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\District;
use App\Models\Division;
use DataTables;

class DistrictsController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth:admin');
  }
  
  public function index()
  {
    if (request()->ajax()) {

      $districts = District::orderBy('id', 'asc')->get();

      $datatable = DataTables::of($districts)
        ->addIndexColumn()
        ->addColumn(
          'action',
          function ($row) {
            $csrf = "" . csrf_field() . "";
            $method_delete = "" . method_field("post") . "";
            $html = '';

            $html .= '<a class="btn waves-effect waves-light btn-success btn-sm btn-circle ml-1 p-1 " title="Edit Blog Details" href="' . route('admin.district.edit', $row->id) . '"><i class="fa fa-edit"></i></a>';

            $html .= '<a class="btn waves-effect waves-light btn-danger btn-sm btn-circle ml-1 p-1 text-white" title="Delete Admin" id="deleteItem' . $row->id . '"><i class="fa fa-trash"></i></a>';

            $html .= '<script>
                                    $("#deleteItem' . $row->id . '").click(function(){
                                        swal.fire({ title: "Are you sure?",text: "Advertisement will be deleted as trashed !",type: "warning",showCancelButton: true,confirmButtonColor: "#DD6B55",confirmButtonText: "Yes, delete it!"
                                        }).then((result) => { if (result.value) {$("#deletePermanentForm' . $row->id . '").submit();}})
                                    });
                                </script>';

            $deleteRoute =  route('admin.district.delete', $row->id);
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

        ->editColumn('division_id', function ($row) {
          // $productImage = ProductImage::where('product_id', $row->id)->first();
          return $row->division->name;
        });
        
        $rawColumns = ['action','title', 'division_id'];
        return $datatable->rawColumns($rawColumns)
          ->make(true);
    }
    //$districts = District::orderBy('name', 'asc')->get();
    return view('backend.pages.districts.index');
  }

  public function create()
  {
    $divisions = Division::orderBy('priority', 'asc')->get();
    return view('backend.pages.districts.create', compact('divisions'));
  }

  public function store(Request $request)
  {
    $this->validate($request, [
      'name'  => 'required',
      'division_id'  => 'required',
    ],
    [
      'name.required'  => 'Please provide a district name',
      'division_id.required'  => 'Please provide a division for the district',
    ]);

    $district = new District();
    $district->name = $request->name;
    $district->division_id = $request->division_id;
    $district->save();

    session()->flash('success', 'A new district has added successfully !!');
    return redirect()->route('admin.districts');

  }

  public function edit($id)
  {
    $divisions = Division::orderBy('priority', 'asc')->get();
    $district= District::find($id);
    if (!is_null($district)) {
      return view('backend.pages.districts.edit', compact('district', 'divisions'));
    }else {
      return resirect()->route('admin.districts');
    }
  }


    public function update(Request $request, $id)
    {
      $this->validate($request, [
        'name'  => 'required',
        'division_id'  => 'required',
      ],
      [
        'name.required'  => 'Please provide a district name',
        'division_id.required'  => 'Please provide a division for the district',
      ]);

      $district = District::find($id);
      $district->name = $request->name;
      $district->division_id = $request->division_id;
      $district->save();

      session()->flash('success', 'District has updated successfully !!');
      return redirect()->route('admin.districts');

    }

    public function delete($id)
    {
      $district = District::find($id);
      if (!is_null($district)) {
        $district->delete();
      }
      session()->flash('success', 'District has deleted successfully !!');
      return back();

    }
}
