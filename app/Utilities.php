<?php


namespace App;
use Faker\Provider\File;
use Illuminate\Support\Facades\Storage;
use PHPUnit\Util\Filesystem;
use Illuminate\Support\Carbon;
use App\Shop\Employees\Employee;

class Utilities
{
    public static function saveFile($file, $filePath){
        if ($file) {
            if($file){
                $fileUpload = Storage::putFile('/public/license_certificates', $file); 
            }
            return $file."..and..".$fileUpload;
        }
    }

    public static function getPath($userRole, $memberId,$dir_name){
        return  $userRole.'/'.$memberId.'/docs/'.$dir_name;
    }

    public static function updateFile($file, $filePath,$oldFile){
        if ($file) {

            if(file_exists($oldFile)) {
                unlink($oldFile);
            }

            $fileName = $file->getClientOriginalName();
            if($file){
                $fileUpload = $file->storeAs($filePath,$fileName,'public');
            }
            return $fileUpload;
        }
    }
    public static function renameFile($file){
        $nameonly = pathinfo($file, PATHINFO_FILENAME);
        $extension = pathinfo($file, PATHINFO_EXTENSION);
        $renamedfile =  $nameonly.Carbon::now()->format('YmdHs').".".$extension;  // any random string
        return $renamedfile;
    }

    public static function jsonStringRemove($removestring,$id)
    {
        // dd($removestring);

        $employee = Employee::where('id',$id)->pluck('license_certificates');// $this->employeeRepo->findEmployeeById($request->id);

        $file_arr = json_decode($employee[0]);

        if (($key = array_search($removestring, $file_arr)) !== false) {
            unset($file_arr[$key]);
        }

        return $file_arr;
    }
}
