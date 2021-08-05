<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Division;
use App\Models\District;
use DataTables;

class DivisionsController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth:admin');
  }
  
  public function index()
  {
    if (request()->ajax()) {

      $divisions = Division::orderBy('id', 'asc')->get();

      $datatable = DataTables::of($divisions)
        ->addIndexColumn()
        ->addColumn(
          'action',
          function ($row) {
            $csrf = "" . csrf_field() . "";
            $method_delete = "" . method_field("post") . "";
            $html = '';

            $html .= '<a class="btn waves-effect waves-light btn-success btn-sm btn-circle ml-1 p-1 " title="Edit Blog Details" href="' . route('admin.division.edit', $row->id) . '"><i class="fa fa-edit"></i></a>';

            $html .= '<a class="btn waves-effect waves-light btn-danger btn-sm btn-circle ml-1 p-1 text-white" title="Delete Admin" id="deleteItem' . $row->id . '"><i class="fa fa-trash"></i></a>';

            $html .= '<script>
                                    $("#deleteItem' . $row->id . '").click(function(){
                                        swal.fire({ title: "Are you sure?",text: "Advertisement will be deleted as trashed !",type: "warning",showCancelButton: true,confirmButtonColor: "#DD6B55",confirmButtonText: "Yes, delete it!"
                                        }).then((result) => { if (result.value) {$("#deletePermanentForm' . $row->id . '").submit();}})
                                    });
                                </script>';

            $deleteRoute =  route('admin.division.delete', $row->id);
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
        });
        
        $rawColumns = ['action', 'title'];
        return $datatable->rawColumns($rawColumns)
          ->make(true);
    }
    // $divisions = Division::orderBy('priority', 'asc')->get();
    return view('backend.pages.divisions.index');
  }

  public function create()
  {
    return view('backend.pages.divisions.create');
  }

  public function store(Request $request)
  {
    $this->validate($request, [
      'name'  => 'required',
      'priority'  => 'required',
    ],
    [
      'name.required'  => 'Please provide a division name',
      'priority.required'  => 'Please provide a division priority',
    ]);

    $division = new Division();
    $division->name = $request->name;
    $division->priority = $request->priority;
    $division->save();

    session()->flash('success', 'A new division has added successfully !!');
    return redirect()->route('admin.divisions');

  }

  public function edit($id)
  {
    $division= Division::find($id);
    if (!is_null($division)) {
      return view('backend.pages.divisions.edit', compact('division'));
    }else {
      return resirect()->route('admin.divisions');
    }
  }


    public function update(Request $request, $id)
    {
      $this->validate($request, [
        'name'  => 'required',
        'priority'  => 'required',
      ],
      [
        'name.required'  => 'Please provide a division name',
        'priority.required'  => 'Please provide a division priority',
      ]);

      $division = Division::find($id);
      $division->name = $request->name;
      $division->priority = $request->priority;
      $division->save();

      session()->flash('success', 'Division has updated successfully !!');
      return redirect()->route('admin.divisions');

    }

    public function delete($id)
    {
      $division = Division::find($id);
      if (!is_null($division)) {
        //Delete all the districts for this division
        $districts = District::where('division_id', $division->id)->get();
        foreach ($districts as $district) {
          $district->delete();
        }
        $division->delete();
      }
      session()->flash('success', 'Division has deleted successfully !!');
      return back();

    }
}
