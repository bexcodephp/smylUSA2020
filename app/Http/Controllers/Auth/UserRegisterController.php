<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Shop\Customers\Customer;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Shop\Customers\Requests\CreateCustomerRequest;
use App\Shop\Employees\Repositories\EmployeeRepository;
use App\Shop\Customers\Requests\RegisterCustomerRequest;
use App\Shop\Customers\Repositories\Interfaces\CustomerRepositoryInterface;
use App\Shop\Employees\Repositories\Interfaces\EmployeeRepositoryInterface;

class UserRegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

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
    public function __construct(EmployeeRepositoryInterface $employeeRepository) {
        $this->employeeRepo = $employeeRepository;
    }


    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return Customer
     */
    protected function create(array $data)
    {
        switch ($data['user_type']) {
            case 'dentist':
                $role = 4;
                break;
            case 'pharmacist':
                $role = 5;
                break;
            case 'vendor':
                $role = 6;
                break;
            default:
                return redirect()->back()->with(['error' => 'invalid user']);
                break;
        }

        //dd($data);

        $employee = $this->employeeRepo->createEmployee($data);
        $employeeRepo = new EmployeeRepository($employee);
        $employeeRepo->syncRoles([$role]);
        return $employee;
    }
    
    public function register(Request $request)
    {   
        $validator = Validator::make($request->input(), [
            'email' => 'required|email|unique:employees,email',
            'fname' => 'required',
            'lname' => 'required',
            'user_type' => 'required |in:vendor,pharmacist,dentist',
            'phone' => 'required',
            'state' => 'required',
            'password' => 'required|string|min:6',
        ]);

        if($validator->fails())
        {
            return redirect()->back()->with(['error' => $validator->errors()->first()]);
        }

        $customer = $this->create($request->except('_method', '_token'));
        Auth::guard('employee')->login($customer);

        auth()->logout();
        request()->session()->invalidate();

        return redirect()->back()->with(['message' => 'You account has been created. After admin approval, you can login.']);

        switch ($request->user_type) {
            case 'dentist':
                return redirect()->route('dentist.profile');
                break;
            case 'pharmacist':
                return redirect()->route('operator.dashboard');
                break;
            case 'vendor':
                return redirect()->route('vendor.dashboard');
                break;
            default:
                return redirect()->route('accounts');
                break;
        }
    }
}
