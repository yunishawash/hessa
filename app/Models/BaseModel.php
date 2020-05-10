<?php

namespace App\Models;

use Illuminate\Http\Request;


Trait BaseModel {


	//  ---------------------- [ Scopes ] ----------------------

	public static function order(Request $request)
	{

		if( ! isset($request->get('order')[0]['column'])  ) {
			return self::orderBy('created_at', 'desc');
		}

		$columnIndex = $request->get('order')[0]['column'];
    $orderBy = $request->get('order')[0]['dir'];
		$columnName = $request->get('columns')[$columnIndex]['data'];

    return self::orderBy($columnName, $orderBy);
	}


}
