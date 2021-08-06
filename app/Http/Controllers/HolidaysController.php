<?php

namespace App\Http\Controllers;

use App\Models\Holiday;
use Illuminate\Http\Request;
use Carbon\CarbonPeriod;

class HolidaysController extends Controller
{
    public function index() {
        $holidays = Holiday::all();
        return view('holiday',compact('holidays'));
    }

    public function store() {

        $data = request()->validate([
            'start_date' =>'required',
            'end_date' =>'required',
            'hol_name' =>'required',
            'description' =>'required',
        ]);

        $period = CarbonPeriod::create(request('start_date'),request('end_date'));
        foreach ($period as $date) {
            $listOfDates[] = [
                'start_date' => $date->format('Y-m-d'),
                'end_date' => $date->format('Y-m-d'),
                'hol_name' => $data['hol_name'],
                'description' => $data['description'],
            ];
          }
        
        \DB::table('holidays')->insert($listOfDates);
        return back();
    }

    public function edit(Holiday $holiday) {
        return view('holidayedit',compact('holiday'));
    }

    public function update(Holiday $holiday) {
        $holiday->update($this->validateRequest());
        return redirect('/');
    }
    public function destroy(Holiday $holiday) {
        $holiday->delete();
        return back();
    }

    public function search(Request $request) {

        request()->validate([
            'from' =>'required',
            'to' =>'required',
        ]);

        $fromdate = $request->input('from');
        $todate = $request->input('to');
        
        $holidays = Holiday::whereBetween('start_date',[$fromdate,$todate])->get();      
    
        return view('holiday',compact('holidays'));
    }

    private function validateRequest(){
        return request()->validate([
            'start_date' =>'required',
            'end_date' =>'required',
            'hol_name' =>'required',
            'description' =>'required',
        ]);
    }
}
