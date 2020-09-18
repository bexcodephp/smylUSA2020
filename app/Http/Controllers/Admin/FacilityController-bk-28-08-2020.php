<?php

namespace App\Http\Controllers\Admin;

use App\Appointment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Shop\Facility\FacilityTimeslot;
use App\Shop\Facility\FacilityNonAvailabilityTimeslot;
use App\Shop\Facility\FacilityTimespan;
use App\Shop\Facility\Requests\FacilityCreateRequest;
use App\Shop\Facility\Requests\FacilityUpdateRequest;
use App\Shop\Facility\Repositories\FacilityRepository;
use App\Shop\Facility\Repositories\Interfaces\FacilityRepositoryInterface;
use Illuminate\Support\Facades\DB;
use App\Shop\Facility\Facility;

class FacilityController extends Controller
{
    private $facilityRepo;

    public function __construct(
        FacilityRepositoryInterface $facilityRepo 
    )
    {
        $this->facilityRepo = $facilityRepo;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        
        $facilities = $this->facilityRepo->listFacilities();
        return view('admin.facilities.index', compact('facilities'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $states = DB::table('states')->get();
        return view('admin.facilities.create',compact('states'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FacilityCreateRequest $request)
    {
        //dd($request);
        //exit;

        $data = $request->input();
        if ($request->hasFile('image')) {
            $data['image'] = $this->facilityRepo->saveFacilityImage($request->file('image'));
        }
        $instertFacility = $this->facilityRepo->create($data);

        $lastId = $instertFacility->facility_id; // last inserted id

        //$updateTime = updateTime($request->input,$lastId);
        

        foreach($request->start as $weekday => $value)
        {
            $a = FacilityTimeslot::create([
                'facility_id' => $lastId,
                'weekday' => $weekday,
                'start_time' => date('H:i', strtotime($value)),
                'end_time' => date('H:i', strtotime($request->end[$weekday])),
                'is_closed' => isset($request->closed[$weekday]) ? 1 : 0
            ]);
        }

        if($a->wasRecentlyCreated==true){
            return redirect()->route('admin.facilities.index')->with([
                'message' => 'Facility Added.'
            ]);
        }else{
            return redirect()->route('admin.facilities.index')->with([
                'erroe' => 'Facility Timeslot has some errors.'
            ]);
        }

        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Shop\Facility  $facility
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $facility = $this->facilityRepo->find($id);

        $timeslots = FacilityTimeslot::where('facility_id', $id)->get()->toArray();
        
        $nontimeslots = FacilityNonAvailabilityTimeslot::where('facility_id', $id)->get()->toArray();
        
        return view('admin.facilities.show', compact('facility', 'timeslots', 'nontimeslots'));
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Shop\Facility  $facility
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $states = DB::table('states')->get();
        $facility = $this->facilityRepo->find($id);
        $timeslots = FacilityTimeslot::where('facility_id', $id)->get()->toArray();
        $nontimeslots = FacilityNonAvailabilityTimeslot::where('facility_id', $id)->get()->toArray();
        return view('admin.facilities.edit', compact('facility','states','timeslots', 'nontimeslots'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Shop\Facility  $facility
     * @return \Illuminate\Http\Response
     */
    public function update(FacilityUpdateRequest $request, $id)
    {
        $data = $request->input();
        if ($request->hasFile('image')) {
            $data['image'] = $this->facilityRepo->saveFacilityImage($request->file('image'));
        }

        $facility = $this->facilityRepo->find($id);

        $update = new FacilityRepository($facility);

        $update->update($data);
        
        FacilityTimeslot::where('facility_id', $id)->delete();

        foreach($request->start as $weekday => $value)
        {
            $a = FacilityTimeslot::create([
                'facility_id' => $id,
                'weekday' => $weekday,
                'start_time' => date('H:i', strtotime($value)),
                'end_time' => date('H:i', strtotime($request->end[$weekday])),
                'is_closed' => isset($request->closed[$weekday]) ? 1 : 0
            ]);
        }

        return redirect()->route('admin.facilities.index')->with([
            'message' => 'Facility Updated'
        ]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Shop\Facility  $facility
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $facility = $this->facilityRepo->find($id);
        $facility_repo = new FacilityRepository($facility);
        $facility_repo->delete();

        return redirect()->route('admin.facilities.index')->with([
            'message' => 'Facility Deleted'
        ]);

    }

    public function updateTime(Request $request, $id)
    {
        $facility = $this->facilityRepo->find($id);

        FacilityTimeslot::where('facility_id', $id)->delete();

        foreach($request->start as $weekday => $value)
        {
            $a = FacilityTimeslot::create([
                'facility_id' => $id,
                'weekday' => $weekday,
                'start_time' => date('H:i', strtotime($value)),
                'end_time' => date('H:i', strtotime($request->end[$weekday])),
                'is_closed' => isset($request->closed[$weekday]) ? 1 : 0
            ]);
        }

        return $a;
        //return $this->sendResponse(true, "Facility time updated");
    }

    public function addNonAvailabilityTime(Request $request)
    {
        $weekday =  date('w', strtotime($request->date));
        $facility = $this->facilityRepo->find($request->id);

        $a = FacilityNonAvailabilityTimeslot::create([
            'date' => $request->date,
            'facility_id' => $request->id,
            'weekday' => $weekday,
            'start_time' => date('H:i', strtotime($request->start_time)),
            'end_time' => date('H:i', strtotime($request->end_time))               
        ]);

        return $this->sendResponse(true, "Facility Non Availability time has been added");
    }

    public function updateNonAvailabilityTime(Request $request, $id)
    {
        $data = [
                    'date' => $request->date,
                    'start_time' => $request->start_time,
                    'end_time' => $request->end_time
                ];
        $result = FacilityNonAvailabilityTimeslot::where('id', $id)->update($data);
        return "true";
    }

    public function destroyNonAvailabilityTime(Request $request)
    {      
        $naTimeslot = FacilityNonAvailabilityTimeslot::where('id',$request->id);
        $naTimeslot->delete();
        return "true";
    }


    

    public function getAppointments()
    {
        $appointments = Appointment::with(['dentist', 'customer', 'facility'])->orderBy('appointment_date', 'DESC')->get();
        return view('admin.facilities.appointments', compact('appointments'));
    }

    public function updateSpan($facility_id, $weekday)
    {
        $facility = $this->facilityRepo->find($facility_id);

        $spans = FacilityTimespan::where('facility_id', $facility_id)->where('weekday', $weekday)->get();

        return view('admin.facilities.update-span', compact('facility', 'weekday', 'spans'));
    }

    public function updateFacilityTimespan(Request $request, $facility_id, $weekday)
    {
        FacilityTimespan::where('facility_id', $facility_id)->where('weekday', $weekday)->delete();

        foreach ($request->span as $key => $span) {
            FacilityTimespan::create([
                'facility_id' => $facility_id,
                'weekday' => $weekday,
                'timespan' => date('H:i', strtotime($span))
            ]);
        }

        return $this->sendResponse(true, "Facility timespan updated");
    }

    public function getcity(Request $request)
    {
        $cities = DB::table('city_tbl')->where('state_id',$request->state_id)->get(); 
        return response(json_encode($cities));
    }

    public function getProfile($id)
    {
        // echo "hi";exit;
        $facility = $this->facilityRepo->find($id);
        $facilities_all = Facility::all();
        return view('admin.facilities.profile', ['facility' => $facility, 'facilities_all' => $facilities_all]);
    }
}
