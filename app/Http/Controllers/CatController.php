<?php

namespace App\Http\Controllers;

use App\Cat;
use App\Map;
use Artesaos\LinkedIn\Facades\LinkedIn;
use Illuminate\Http\Request;

use App\Http\Requests;
use Maatwebsite\Excel\Facades\Excel as Excel;
use App\Http\Controllers\Input;
use Illuminate\Support\Facades\DB;

class CatController extends Controller
{

    //
    public function insert(Request $request)
    {
        Excel::load(\Illuminate\Support\Facades\Input::file('file'), function ($reader) {
            $reader->each(function ($sheet) {
                $data = Cat::firstOrCreate($sheet->toArray());
            });
        });

        return redirect()->route('showcat')->with('mesege', 'Add complete!');
    }

    public function index()
    {
        $datas = Cat::paginate(15);
        return view('cat.index', compact('datas'));
    }

    function delete($id)
    {
        $data = Cat::find($id);
        $data->delete();
        return redirect()->route('showcat')->with('mesege', 'Delete complete!');
    }

    function mdelete($id)
    {
        $data = Map::find($id);
        $data->delete();
        return redirect()->route('mapshow')->with('mesege', 'Delete complete!');
    }

    function detail($id)
    {
        $data = Map::find($id);
        return view('cat.detail',compact('data'));
    }

    function mapbycat($id)
    {
        $datas = Map::where('cat_id',$id)->paginate(15);
        return view('cat.mapbycat',compact('datas'));
    }

    public function indexmap()
    {
        $datas = Map::paginate(15);
        return view('cat.indexmap', compact('datas'));
    }

    public function data($id)
    {
        $data = Cat::find($id);
        //$response = file_get_contents('https://maps.googleapis.com/maps/api/place/textsearch/json?query=' . urlencode($data->cname) . '+in+Jamaica&country:JM&key=AIzaSyCvA3m5SpXq8N6yRDZ6azoh-eSNg2hFf_s&libraries=places');
        $response = file_get_contents('https://maps.googleapis.com/maps/api/place/textsearch/json?query=' . urlencode($data->cname) . '&location=18.1122747,-78.3973299&radius=10000&key=AIzaSyBlnmgIOMNFb1QsB5W8feI546G4jUFnC7I');
       
        $value = json_decode($response);
        dd($value);
        foreach ($value->results as $item) {
            $sav = new Map();
            $detail = file_get_contents('https://maps.googleapis.com/maps/api/place/details/json?placeid=' . $item->place_id . '&key=AIzaSyCvA3m5SpXq8N6yRDZ6azoh-eSNg2hFf_s');
            $detailjson = json_decode($detail);
            foreach ($detailjson->result->address_components as $part) {

                foreach ($part->types as $part1)
                    switch ($part1) {
                        case 'administrative_area_level_1' :
                            $sav->state = $part->long_name;
                            break;
                        case 'country' :
                            $sav->country = $part->long_name;
                            break;
                        case 'administrative_area_level_2' :
                            $sav->city = $part->long_name;
                            break;
                        case 'locality' :
                            $sav->city = $part->long_name;
                            break;
                    }
            }
            $sav->cat_id = $id;
            if (property_exists($detailjson->result, 'formatted_phone_number'))
                $sav->phone = $detailjson->result->formatted_phone_number;
            if (property_exists($detailjson->result, 'formatted_phone_number'))
                $sav->phone = $detailjson->result->formatted_phone_number;
            $sav->geometry = json_encode($detailjson->result->geometry->location);
            if (property_exists($detailjson->result, 'international_phone_number'))
                $sav->i_phone = $detailjson->result->international_phone_number;
            if (property_exists($detailjson->result, 'name'))
                $sav->name = $detailjson->result->name;
            if (property_exists($detailjson->result, 'opening_hours'))
                $sav->openhour = json_encode($detailjson->result->opening_hours->weekday_text);
            if (property_exists($detailjson->result, 'rating'))
                $sav->rating = $detailjson->result->rating;
            if (property_exists($detailjson->result, 'reviews'))
                $sav->review = json_encode($detailjson->result->reviews);
            if (property_exists($detailjson->result, 'scope'))
                $sav->scope = $detailjson->result->scope;
            if (property_exists($detailjson->result, 'types'))
                $sav->types = json_encode($detailjson->result->types);
            if (property_exists($detailjson->result, 'url'))
                $sav->url = $detailjson->result->url;
            if (property_exists($detailjson->result, 'utc_offset'))
                $sav->utc_offset = $detailjson->result->utc_offset;
            if (property_exists($detailjson->result, 'vicinity'))
                $sav->vicinity = $detailjson->result->vicinity;
            if (property_exists($detailjson->result, 'website'))
                $sav->website = $detailjson->result->website;
            $sav->types = json_encode($item->types);

            $sav->save();
        }

        return redirect()->route('mapbycat',$id)->with('mesege', 'Load data google places compleye!');

    }

    public function datalin()
    {
        if (LinkedIn::isAuthenticated()) {
            //we know that the user is authenticated now. Start query the API

            $user=LinkedIn::get('v1/people/~:(firstName,lastName)');
            echo  "Welcome ".$user['firstName'];
            exit();
        }

        //if not authenticated
        $url = LinkedIn::getLoginUrl();
        echo "<a href='$url'>Login with LinkedIn</a>";
        exit();

    }

    public function search(Request $request)
    {
        $data=Cat::where('vertical','like','%'.$request->input('s').'%')
            ->orWhere('cname','like','%'.$request->input('s').'%')
            ->orWhere('keyword','like','%'.$request->input('s').'%')->select('cname as value','cname as data')->get();
        return response()->json([
            'data'=>$data,
        ], 200);

    }
    public function searchbystate(Request $request)
    {
        $data=Map::where('state','like','%'.$request->input('sta').'%')
            ->select('state as value','state as data')->get();
        return response()->json([
            'data'=>$data,
        ], 200);

    }
    public function searchmain(Request $request)
    {
        $value=DB::table('cats')
            ->join('maps','cats.id','=','maps.id')
            ->where('vertical','like','%'.$request->input('s').'%')
            ->orWhere('keyword','like','%'.$request->input('s').'%')
            ->orWhere('cname','like','%'.$request->input('s').'%')
            ->where('state','like','%'.$request->input('sta').'%')
            ->select('maps.name as name','maps.url as url')->get();
        return response()->json([
            'value'=>$value
        ], 200);

    }
}