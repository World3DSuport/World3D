<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;

class LogController extends Controller
{
    public function index(Request $request)
    {
        $logFiles = File::files(storage_path('logs'));
        $logs = [];

        $day = $request->input('day');   
        $month = $request->input('month'); 
        $hour = $request->input('hour');  

        foreach ($logFiles as $file) {
            $lines = file($file->getPathname(), FILE_IGNORE_NEW_LINES);
            $filteredLines = [];

            foreach ($lines as $line) {
    
                $match = true;

                if ($day && strpos($line, $day) === false) {
                    $match = false;
                }
                if ($month && strpos($line, $month) === false) {
                    $match = false;
                }
                if ($hour && strpos($line, $hour) === false) {
                    $match = false;
                }

                if ($match) {
                    $filteredLines[] = $line;
                }
            }

            if (!empty($filteredLines)) {
                $logs[$file->getFilename()] = implode("\n", $filteredLines);
            }
        }

        return view('logs', compact('logs', 'day', 'month', 'hour'));
    }
}
