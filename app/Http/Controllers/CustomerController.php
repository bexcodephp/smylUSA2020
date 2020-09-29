<?php
// Our Controller 
namespace App\Http\Controllers;
  
use Illuminate\Http\Request;
use App\Shop\Customers\Customer;
use Illuminate\Support\Facades\DB;
use App\Shop\Customers\Repositories\CustomerRepository;
use App\Shop\Customers\Repositories\Interfaces\CustomerRepositoryInterface;
use PDF;
  
class CustomerController extends Controller
{

    /**
     * @var CustomerRepositoryInterface
     */
    private $customerRepo;

    /**
     * @var CourierRepositoryInterface
     */
    private $courierRepo;
    private $orderRepo;

    /**
     * AccountsController constructor.
     *
     * @param CourierRepositoryInterface $courierRepository
     * @param CustomerRepositoryInterface $customerRepository
     */
    public function __construct(
        CustomerRepositoryInterface $customerRepository
    ) {
        $this->customerRepo = $customerRepository;
    }

    public function printPDF()
    {
        $customer = $this->customerRepo->findCustomerById(auth()->user()->id);

        $customerRepo = new CustomerRepository($customer);

        $answers = DB::table('medical_form_question')
            ->where('customer_id', $customer->id)
            ->first();

        $address = $customerRepo->findAddresses()->first();
        if(count((array)$answers) > 0 ) {


        $data = [          
            'first_name' => $customer->first_name,
            'last_name' => $customer->last_name,  
            'phone' => $customer->phone,  
            'dob' => $customer->dob,  
            'patient_id' => $customer->patient_id,  
            'address_1' => $address->address_1,  
            'address_2' => $address->address_2,  
            'city' => $address->city,  
            'state_code' => $address->state_code,  
            'zip' => $address->zip,  
            'billing_address_1' => $address->billing_address_1,  
            'billing_address_2' => $address->billing_address_2,  
            'billing_city' => $address->billing_city,  
            'billing_state' => $address->billing_state,  
            'billing_zip' => $address->billing_zip,  
            'answer1'=> $answers->question1,
            'answer2'=> $answers->question2,
            'answer3'=> $answers->question3,
            'answer4'=> $answers->question4,
            'answer5'=> $answers->question5,
            'answer6'=> $answers->question6,
            'answer7'=> $answers->question7,
            'answer8'=> $answers->question8,
            'answer9'=> $answers->question9,
            'answer10'=> $answers->question10,
            'answer11'=> $answers->question11,
            'answer12'=> $answers->question12,
            'answer13'=> $answers->question13,
            'answer14'=> $answers->question14,
            'answer15'=> $answers->question15,
            'answer16'=> $answers->question16,
            'answer17'=> $answers->question17,
            'answer18'=> $answers->question18,
            'answer19'=> $answers->question19
        ];
        }  else {
            $data = [          
                'first_name' => $customer->first_name,
                'last_name' => $customer->last_name,  
                'phone' => $customer->phone,  
                'dob' => $customer->dob,  
                'patient_id' => $customer->patient_id,  
                'address_1' => $address->address_1,  
                'address_2' => $address->address_2,  
                'city' => $address->city,  
                'state_code' => $address->state_code,  
                'zip' => $address->zip,  
                'billing_address_1' => $address->billing_address_1,  
                'billing_address_2' => $address->billing_address_2,  
                'billing_city' => $address->billing_city,  
                'billing_state' => $address->billing_state,  
                'billing_zip' => $address->billing_zip,  
                'answer1'=> '',
                'answer2'=> '',
                'answer3'=> '',
                'answer4'=> '',
                'answer5'=> '',
                'answer6'=> '',
                'answer7'=> '',
                'answer8'=> '',
                'answer9'=> '',
                'answer10'=> '',
                'answer11'=> '',
                'answer12'=> '',
                'answer13'=> '',
                'answer14'=> '',
                'answer15'=> '',
                'answer16'=> '',
                'answer17'=> '',
                'answer18'=> '',
                'answer19'=> ''
            ];
        }
        $pdf = PDF::loadView('front/dashboard/pdf_view', $data);  
        return $pdf->download('medium.pdf');
    }
}