<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Page;
use App\Club;
use App\QSO;

class MapController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        //
    }

    public function index()
    {
        return view('map',[
            "Locations"=>"",
            "test"=>""
        ]);
    }

    public function geoJson()
    {
        $locations = array();
        $clubs = Club::all();
        $test="";
        $baseElement = array(
            "type"=> "Feature",
            "geometry"=> array (
                "type" => "Point",
                "coordinates" => array()
            ),
            "properties" => array(
                "name" => "Dinagat Islands"
            )
        );
        foreach ($clubs as $club)
        {
            $element = $baseElement;
            $gps = $this->convertGrid($club->locator);
            $element['properties']['name'] = $club->name; 
            if ($gps[0] != null && $gps[1] != null)
            {
                $element['geometry']['coordinates'] = [$gps[1],$gps[0]];
                $locations[] = $element;
            }
        }
        return response()->json(array(
            "type"=> "FeatureCollection",
            "features"=> $locations
        ));
    }

    private function convertGrid($grid_square_id)
    {
		if (strlen($grid_square_id) % 2 != 0) {
			return array(null, null, null, null);
		}
		$grid_square_id = strtoupper($grid_square_id);
		$lat = -90; 
		$lon = -180; 
		$lat_div = 180; 
		$lon_div = 360;
		$base_calculator = $this->subdivisor();
		for ($base = $base_calculator(); strlen($grid_square_id) > 0; $base = $base_calculator()) {
			$lat_id = $grid_square_id[1];
			$lon_id = $grid_square_id[0];
			$lat_div /= $base;
			$lon_div /= $base;
			$lat += $this->parse_digit($lat_id) * $lat_div;
			$lon += $this->parse_digit($lon_id) * $lon_div;
			$grid_square_id = substr($grid_square_id, 2);
		}
		return array($lat, $lon, $lat_div, $lon_div);
    }
    private function subdivisor() {
		$last = array(18, 10, 24, 10);
		$i = 0;
		return function () use (&$i, &$last) {
			if ($i >= count($last)) {
				$i = 2;
			}
			return $last[$i++];
		};
    }
    private function parse_digit($digit) {
		$alphabet = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
		$value = strpos($alphabet, $digit);
		if ($value == FALSE) {
			$value = floatval($digit);
		}
		return $value;
	}
}
