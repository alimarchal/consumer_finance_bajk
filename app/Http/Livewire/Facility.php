<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Facility extends Component
{

    public $nature_of_facility = [
        'Consumer Finance',
        'Commercial / SME Finance',
        'Micro Finance',
        'Agriculture Finance',
    ];

    public $type_of_facility = [];
    public $type_of_facility_flag = false;

    public $nature_of_facility_selected = null;

    public function render()
    {
        return view('livewire.facility');
    }

    public function nature_of_facility($event)
    {

        if ($event != null) {
            if ($event == 'Consumer Finance') {
                $this->type_of_facility = [
                    'Advance Salary',
                    'Car Finance',
                    'Motorcycle Loan',
                    'Personal Loan',
                    'Gold Loan',
                    'Nasheman Housing',
                    'Home Appliances Finance',
                ];
                $this->type_of_facility_flag = true;
            } elseif ($event == 'Commercial / SME Finance') {
                $this->type_of_facility = [
                    'AKSIC',
                    'AKSIC-Custm. Lending',
                    'RF/DF',
                    'House/Construction',
                    'Auto',
                    'Tourism Promotion',
                    'Healthcare Services',
                ];
                $this->type_of_facility_flag = true;
            } elseif ($event == 'Micro Finance') {
                $this->type_of_facility = [
                    'Micro Enterprise',
                    'Desi Murghbani',
                    'Women Devlopment',
                ];
                $this->type_of_facility_flag = true;
            } elseif ($event == 'Agriculture Finance') {
                $this->type_of_facility = [
                    'Agri. Promotion',
                    'Agri. Development',
                    'Poultry',
                    'Dairy',
                ];
                $this->type_of_facility_flag = true;
            }

        }


    }
}
