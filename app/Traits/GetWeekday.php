<?php 
namespace App\Traits;


/**
 * 
 */
trait GetWeekday
{
    public function get_weekday($date)
    {
        $day = date('l', strtotime($date));
        return $this::weekday($day);
    }

    public static function weekday($day, $indexWise = false)
    {

        if($indexWise){
            switch ($day) {
                case 0:
                    $day = 'Monday';
                    break;
                case 1:
                    $day = 'Tuesday';
                    break;
                case 2:
                    $day = 'Wednesday';
                    break;
                case 3:
                    $day = 'Thursday';
                    break;
                case 4:
                    $day = 'Friday';
                    break;
                case 5:
                    $day = 'Saturday';
                    break;
                case 6:
                    $day = 'Sunday';
                    break;
                default:
                    $day = 'NA';
                    break;
            }
            return $day;
        }
        switch ($day) {
            case 'Monday':
                $day = 0;
                break;
            case 'Tuesday':
                $day = 1;
                break;
            case 'Wednesday':
                $day = 2;
                break;
            case 'Thursday':
                $day = 3;
                break;
            case 'Friday':
                $day = 4;
                break;
            case 'Saturday':
                $day = 5;
                break;
            case 'Sunday':
                $day = 6;
                break;
            default:
                $day = 0;
                break;
        }

        return $day;
    }
}
