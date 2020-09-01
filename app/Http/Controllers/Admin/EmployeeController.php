<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Shop\Employees\Employee;
use App\Models\OrderTreatmentPlan;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Notifications\DentistAccountApproved;
use App\Shop\Admins\Requests\CreateEmployeeRequest;
use App\Shop\Admins\Requests\UpdateEmployeeRequest;
use App\Shop\Employees\Repositories\EmployeeRepository;
use App\Shop\Roles\Repositories\RoleRepositoryInterface;
use App\Mail\DentistAccountApproved as MailDentistAccountApproved;
use App\Shop\Employees\Repositories\Interfaces\EmployeeRepositoryInterface;
use App\Shop\Facility\Facility;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;

class EmployeeController extends Controller
{
    /**
     * @var EmployeeRepositoryInterface
     */
    private $employeeRepo;
    /**
     * @var RoleRepositoryInterface
     */
    private $roleRepo;

    /**
     * EmployeeController constructor.
     *
     * @param EmployeeRepositoryInterface $employeeRepository
     * @param RoleRepositoryInterface $roleRepository
     */
    public function __construct(
        EmployeeRepositoryInterface $employeeRepository,
        RoleRepositoryInterface $roleRepository
    ) {
        $this->employeeRepo = $employeeRepository;
        $this->roleRepo = $roleRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $list = $this->employeeRepo->listEmployees('created_at', 'desc');       
        return view('admin.employees.list', [
            'employees' => $this->employeeRepo->paginateArrayResults($list->all())
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {            
        $facilities = Facility::get(['facility_id','name']);
        $roles = $this->roleRepo->listRoles();
        return view('admin.employees.create', compact('roles','facilities')
    );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CreateEmployeeRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(CreateEmployeeRequest $request)
    {
        //dd($request);    
        //dd($request->file('license_certificates')->getClientOriginalName());
        //dd($request);
        $request->request->add(['role' => '5', 'password'=>Hash::make('12345678')]); 
        $request->merge([
            'location_associated' => json_encode($request->location_associated),
        ]);

        //dd($request);
        $upload_path = "employee/operators/license_certificates";
        $upload_files = $request->file('license_certificates');
        //dd($upload_file);

        $data = $request->input();
        $fileName = []; 
        if ($request->hasFile('license_certificates')) {
            //dd($upload_file);
            foreach($upload_files as $doc){
                $data['saveDocs'] = $this->employeeRepo->saveEmployeeDocs($doc, $upload_path);
                $data['filenames'][] = $data['saveDocs'];
            }
            $data['license_certificates'] = json_encode($data['filenames']);
            //dd($data);
        }
        $employee = $this->employeeRepo->create($data);
        
        //$employee = $this->employeeRepo->createEmployee($request->all()); 

        //dd($employee);
        

        if ($request->has('role')) {    
            // dd($request);        
            $employeeRepo = new EmployeeRepository($employee);
            $employeeRepo->syncRoles([$request->role]);
        }

        // update op_id

        $updateData = [];
        $operator_id = "OP".Carbon::now()->format('ymd').$employee->id; 
        $recentOperator = $this->employeeRepo->findEmployeeById($employee->id); //dd($recentOperator);
        $empRepo = new EmployeeRepository($recentOperator); //dd($empRepo);        
        $updateData['op_id'] = $operator_id; //dd($updateData);
        $result = $empRepo->update($updateData);  
        return redirect('admin/employees/operator');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($user_role)
    {                
        $role = $this->roleRepo->getUserBasedOnRole($user_role);
        $facilities = Facility::all();        
        //dd($role->users);
        //$employee = Employee::all();
        //$facilities = Facility::whereIn('facility_id',$role)->get();  

        return view('admin.employees.show', compact('role','facilities'));
    }

    
    
    public function dentist_orders($dentist)
    {
        $dentist = Employee::with(['orders'])->findorfail($dentist);

        $voodoo = OrderTreatmentPlan::with(['order' => function ($query) {
            $query->with(['customer','orderHistory', 'dentist']);
        }])
        ->latest()
        ->whereIn('order_id', $dentist->orders()->pluck('id')->toArray())
        ->get();

//        return $voodoo;
        $doctors = Employee::all();
        $states = array("AL"=>"Alabama", "AK"=>"Alaska", "AZ"=>"Arizona", "AR"=>"Arkansas", "CA"=>"California", "CO"=>"Colorado", "CT"=>"Connecticut", "DE"=>"Delaware", "DC"=>"District of Columbia", "FL"=>"Florida", "GA"=>"Georgia", "HI"=>"Hawaii", "ID"=>"Idaho", "IL"=>"Illinois", "IN"=>"Indiana", "IA"=>"Iowa", "KS"=>"Kansas", "KY"=>"Kentucky", "LA"=>"Louisiana", "ME"=>"Maine", "MD"=>"Maryland", "MA"=>"Massachusetts", "MI"=>"Michigan", "MN"=>"Minnesota", "MS"=>"Mississippi", "MO"=>"Missouri", "MT"=>"Montana", "NE"=>"Nebraska", "NV"=>"Nevada", "NH"=>"New Hampshire", "NJ"=>"New Jersey", "NM"=>"New Mexico", "NY"=>"New York", "NC"=>"North Carolina", "ND"=>"North Dakota", "OH"=>"Ohio", "OK"=>"Oklahoma", "OR"=>"Oregon", "PA"=>"Pennsylvania", "RI"=>"Rhode Island", "SC"=>"South Carolina", "SD"=>"South Dakota", "TN"=>"Tennessee", "TX"=>"Texas", "UT"=>"Utah", "VT"=>"Vermont", "VA"=>"Virginia", "WA"=>"Washington", "WV"=>"West Virginia", "WI"=>"Wisconsin","WY"=>"Wyoming");

        return view('admin.orders.voodoo', compact('voodoo','states', 'dentist'));

        //dd($dentist);
        //return view('admin.employees.index', compact('role'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(int $id)
    {
        //dd(Auth::guard('employee')->user()->id);
        $employee = $this->employeeRepo->findEmployeeById($id);
        $roles = $this->roleRepo->listRoles('created_at', 'desc');
        $isCurrentUser = $this->employeeRepo->isAuthUser($employee);
        $facilities = Facility::get(['facility_id','name','city','state','zipcode']);
        return view(
            'admin.employees.edit',
            [
                'employee' => $employee,
                'roles' => $roles,
                'isCurrentUser' => $isCurrentUser,
                'selectedIds' => $employee->roles()->pluck('role_id')->all(),
                'facilities'=> $facilities
            ]
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateEmployeeRequest $request
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateEmployeeRequest $request, $id)
    {
        $request->request->add(['role' => '5']); 
        $request->merge([
            'location_associated' => json_encode($request->location_associated),
        ]);

        $employee = $this->employeeRepo->findEmployeeById($id);
        $isCurrentUser = $this->employeeRepo->isAuthUser($employee);

        $empRepo = new EmployeeRepository($employee);
        //$empRepo->updateEmployee($request->except('_token', '_method', 'password'));
        $upload_path = "employee/operators/license_certificates";
        $upload_files = $request->file('license_certificates');

        //dd($upload_files);

        $data = $request->input();
        $fileName = []; 
        if ($request->hasFile('license_certificates')) {
            //dd($upload_file);
            foreach($upload_files as $doc){
                $data['saveDocs'] = $this->employeeRepo->saveEmployeeDocs($doc, $upload_path);
                $data['filenames'][] = $data['saveDocs'];
            }
            $data['license_certificates'] = json_encode($data['filenames']);
            //dd($data);
        }

        $empRepo->update($data);

        if ($request->has('password') && !empty($request->input('password'))) {
            $employee->password = Hash::make($request->input('password'));
            $employee->save();
        }
        
        //dd($isCurrentUser);

        // if ($request->has('roles') and !$isCurrentUser) {
        if ($request->has('roles')) {
            $employee->roles()->sync($request->input('roles'));
        } 
        
        // elseif (!$isCurrentUser) {
        //     $employee->roles()->detach();
        // }

        // return redirect()->route('admin.employees.edit', $id)->with('message', 'Update successful');

        return redirect('admin/employees/operator');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(int $id)
    {
        //dd($id);
        $delete = DB::select(DB::raw("DELETE from employees WHERE id=$id"));
    }

    /**
     * @param $id
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getProfile($id)
    {
        $employee = $this->employeeRepo->findEmployeeById($id);
        $facilities = Facility::all();
        return view('admin.employees.profile', ['employee' => $employee, 'facilities' => $facilities ]);
        //return view('admin.employees.profile', ['employee' => $employee]);
    }

    /**
     * @param UpdateEmployeeRequest $request
     * @param $id
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updateProfile(UpdateEmployeeRequest $request, $id)
    {
        $employee = $this->employeeRepo->findEmployeeById($id);

        $update = new EmployeeRepository($employee);
        $update->updateEmployee($request->except('_token', '_method', 'password'));

        if ($request->has('password') && $request->input('password') != '') {
            $update->updateEmployee($request->only('password'));
        }

        return redirect()->route('admin.employee.profile', $id)
            ->with('message', 'Update successful');
    }

    public function status(Request $request){
       $employee = Employee::where('id',$request->id)->first();
//       return $employee;
       if($employee){
           $employee->status=$request->status;
           $employee->save();
       }
       if($employee->status==1){
           $a = Mail::to($employee)->send(new MailDentistAccountApproved($employee));
        //    dd($a);
           return redirect()->back();
       }else{
           return redirect()->back();
       }

    }

    public function getLocation(Request $request){
        $fid = $request->id;
        $facilities = Facility::whereIn('facility_id',$fid)->get(); 
        return response(json_encode($facilities));
    }

    public function filter(Request $request){
        //dd($request);
        $role = $this->roleRepo->getUsersBasedRoleFilter("operator",$request->filter_name);

        dd($role);

        $facilities = Facility::all();
        if($request->filter_location){
            //echo $request->filter_location;exit;
        }
        return view('admin.employees.show', compact('role','facilities'));
    }

    
}
