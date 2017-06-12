<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Spare;
use App\Group;
use App\Manufacturer;

use App\Http\Requests;

class HomeController extends Controller
{
	public function index(Request $request)
  {
		if ($request->manufacturer == 0 or $request->manufacturer == '') {
			$signManufacturer = '!=';
		}	else {
			$signManufacturer = '=';
		}
		if ($request->group == 0 or $request->group == '') {
			$signGroup = '!=';
		}	else {
			$signGroup = '=';
		}

		$filter['price_from'] = ( $request->price_from == '' ) ? 0 : $request->price_from;
		$filter['price_before'] = ( $request->price_before == '' ) ? 100000 : $request->price_before;
		$filter['weight_from'] = ( $request->weight_from == '' ) ? 0 : $request->weight_from;
		$filter['weight_before'] = ( $request->weight_before == '' ) ? 100000 : $request->weight_before;
		$filter['manufacturer'] = ( $request->manufacturer == '' ) ? 0 : $request->manufacturer;
		$filter['group'] = ( $request->group == '' ) ? 0 : $request->group;

		$filter = (object) $filter;

		$manufacturers = Manufacturer::get();
		$groups = Group::get();
		$spares = Spare::where([
				['price', '>', $filter->price_from],
				['price', '<', $filter->price_before],
				['weight', '>', $filter->weight_from],
				['weight', '<', $filter->weight_before],
				['manufacturer_id', $signManufacturer, $request->manufacturer],
				['group_id', $signGroup, $request->group],
		])->paginate(3);

		$spares->setPath('/');

		return view('home', [
			'manufacturers' => $manufacturers,
			'spares' => $spares,
			'groups' => $groups,
			'filter' => $filter
		]);
  }
}
