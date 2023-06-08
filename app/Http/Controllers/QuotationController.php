<?php

namespace App\Http\Controllers;

use App\Exports\QuotationExport;
use App\Models\Project;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class QuotationController extends Controller
{
    public function download(Project $project)
    {
        $headings = [[$project->name],
                    ['230, PHASE IV, UDYOG VIHAR, GURGAON, HARYANA, 122015'],
                    ['BILL TO','DEL/A/CUR/0607','SHIP TO','DEL/A/CUR/0607','','REF: DEL/A/CUR/0607','','','','','CP LEVEL'],
                    ['','','','','','','','Date.'.today()->format('d.m.Y')],
                    ['S. NO.','PARTICULARS','',' QTY.', 'UMO',' RATE',' SUB TOTALS',' TOTAL ' ]
                    ];
        return Excel::download(new QuotationExport($project,$this->extraInfo(),$headings),'quotation.xlsx');
    }

    public function extraInfo()
    {
        $rows[] = ['BANK DETAILS :'];
        $rows[] = ['HDFC Bank details:'];
        $rows[] = ['Name of Account Holder: Shreeton Textile Contracts Private Limited'];
        $rows[] = ['Account Number: 50200048854616'];
        $rows[] = ['IFSC: HDFC0000485'];
        $rows[] = ['Branch address: B-, Vanijya Kunj, Enkay Tower, Udyog Vihar, Phase-V, Gurugram-122001'];
        
        $rows[] = ['','','','','For and on behalf of'];
        $rows[] = ['','','','','Shreeton Textile Contracts pvt. Ltd.'];
        $rows[] = ['Terms & Conditions '];
        $rows[] = ['1. QUOTATION VALIDITY: 15 Days'];
        $rows[] = ['2. PAYMENT: 90% Advance, Balance 10% when material is ready to dispatch. '];
        $rows[] = ['3.FITTING CHARGES  & INSTALLATION :Inclusive  '];
        $rows[] = ['4. DELIVERY: 4 to 5 weeks'];
        $rows[] = ['5. A- Curtains & blinds to be dry-cleaned only'];
        $rows[] = ['5.B- For longevity of curtains and blinds vacuum cleaning recommended once a week.'];
        $rows[] = ['6. SCAFFOLDING WILL BE PROVIDED BY CUSTOMER IF NEED. '];
        return collect($rows);
    }
}
