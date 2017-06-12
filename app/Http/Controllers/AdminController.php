<?php

namespace App\Http\Controllers;

use App\Manufacturer;
use App\Group;
use App\Spare;

use App\Http\Requests;
use Illuminate\Http\Request;

class AdminController extends Controller
{

    public function __construct()
    {
      $this->middleware('auth');
    }

    public function index()
    {
      $manufacturers = Manufacturer::get();
      $spares = Spare::get();
      $groups = Group::get();

      return view('admin.index', [
        'manufacturers' => $manufacturers,
        'spares' => $spares,
        'groups' => $groups
      ]);
    }

    public function storeSpare(Request $request)
    {
      $this->validate($request, [
        'name' => 'required|max:255',
        'weight' => 'required',
        'price' => 'required',
        'manufacturer' => 'required',
        'group' => 'required',
      ]);

      Spare::insert([
        'name' => $request->name,
        'weight' => $request->weight,
        'price' => $request->price,
        'manufacturer_id' => $request->manufacturer,
        'group_id' => $request->group,
      ]);

      return redirect('/admin');
    }

    public function destroySpare(Request $request, Spare $spare)
    {
      $spare->delete();

      return redirect('/admin');
    }

    public function storeManufacturer(Request $request)
    {
      $this->validate($request, [
        'name' => 'required|max:255',
      ]);

      Manufacturer::insert([
        'name' => $request->name,
      ]);

      return redirect('/admin');
    }

    public function destroyManufacturer(Request $request, Manufacturer $manufacturer, Spare $spare)
    {
      $manufacturer->delete();
      $spare->where('manufacturer_id', '=', $request->manufacturer->id)->delete();

      return redirect('/admin');
    }

    public function storeGroup(Request $request)
    {
      $this->validate($request, [
        'name' => 'required|max:255',
      ]);

      Group::insert([
        'name' => $request->name,
      ]);

      return redirect('/admin');
    }

    public function destroyGroup(Request $request, Groupr $group, Spare $spare)
    {
      $group->delete();
      $spare->where('group_id', '=', $request->group->id)->delete();

      return redirect('/admin');
    }
}
