<?php

namespace App\Http\Controllers;


use App\Http\Requests\Neppex\CreateNeppexRequest;
use App\Models\BorderCrossing;
use App\Models\Box;
use App\Models\Consignee;
use App\Models\Country;
use App\Models\DestinationPort;
use App\Models\Exporter;
use App\Models\NeppexControl;
use App\Models\ShippingPort;
use App\Models\SlaughterPlace;
use App\Models\SlaughterPlaceNeppex;
use App\Models\StorageLocation;
use App\Models\StoreLocationNeppex;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;

class NeppexController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $shippingPorts = ShippingPort::where("inactive", "=", 0)->get();
        $countries = Country::where("inactive", "=", 0)->get();
        $destinationPorts = DestinationPort::where("inactive", "=", 0)->get();
        $exporters = Exporter::where("inactive", "=", 0)->get();
        $borderCrossings = BorderCrossing::where("inactive", "=", 0)->get();
        $consignees = Consignee::where("inactive", "=", 0)->get();
        $storageLocations = StorageLocation::where("inactive", "=", 0)->get();
        $slaughterPlaces = SlaughterPlace::where("inactive", "=", 0)->get();


        return view('neppexControls.create', compact('shippingPorts',
            'countries',
            'destinationPorts',
            'exporters',
            'borderCrossings',
            'consignees',
            'storageLocations',
            'slaughterPlaces'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateNeppexRequest $request)
    {

        if($request->box){

            $neppex = new NeppexControl();
            $neppex->codaut = $request->codaut;
            $neppex->authorization_date = $request->authorization_date;
            $neppex->container = $request->container;
            $neppex->container_name = $request->container_name;
            $neppex->shipping_port_id = $request->shipping_port_id;
            $neppex->country_id = $request->country_id;
            $neppex->destination_port_id = $request->destination_port_id;
            $neppex->exporter_id = $request->export_id;
            $neppex->border_crossing_id = $request->border_crossing_id;
            $neppex->consignee_id = $request->consignee_id;
            $neppex->inactive = 0;
            $neppex->created_by = Auth::user()->id;
            $neppex->updated_by = Auth::user()->id;
            $neppex->created_at = date('Y-m-d H:i:s');
            $neppex->updated_at = date('Y-m-d H:i:s');
            $neppex->save();

            foreach ($request->storage_location_id as $item){
                $storeLocationNeppex = new StoreLocationNeppex();
                $storeLocationNeppex->neppex_control_id = $neppex->id;
                $storeLocationNeppex->storage_location_id = $item;
                $storeLocationNeppex->created_at = date('Y-m-d H:i:s');
                $storeLocationNeppex->updated_at = date('Y-m-d H:i:s');
                $storeLocationNeppex->save();
            }

            foreach ($request->slaughter_place_id as $item){
                $slaughterPlaceNeppex = new SlaughterPlaceNeppex();
                $slaughterPlaceNeppex->neppex_control_id = $neppex->id;
                $slaughterPlaceNeppex->slaughter_place_id = $item;
                $slaughterPlaceNeppex->created_at = date('Y-m-d H:i:s');
                $slaughterPlaceNeppex->updated_at = date('Y-m-d H:i:s');
                $slaughterPlaceNeppex->save();
            }

            $path = 'files/txts/' . time() . '.' . $request->box->extension();
            $request->box->move(public_path('files/txts'), time() . '.' . $request->box->extension());
            $fh = fopen($path,'r');
            while ($line = fgets($fh)) {
                $box = new Box();
                $box->overall_box = str_replace(',', ' ', $line);
                $box->neppex_control_id = $neppex->id;
                $box->created_at = date('Y-m-d H:i:s');
                $box->updated_at = date('Y-m-d H:i:s');
                $box->save();
            }
            fclose($fh);


        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function generateExcel(){

    }
}
