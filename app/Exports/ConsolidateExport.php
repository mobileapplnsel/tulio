<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithTitle;

class ConsolidateExport implements FromCollection,WithHeadings,WithEvents,WithTitle
{
    /**
    * @return \Illuminate\Support\Collection
    */
   use Exportable;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct($project,$extraInfo , $headings, $title)
    {
        $this->project = $project;
        $this->extraInfo = $extraInfo;
        $this->headings = $headings;
        $this->title = $title;
    }
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $data = collect();
        $i=1;
        foreach($this->project->rooms as $room){
            $data->push([$i++,$room->name]);
            foreach($room->products as $product){
                $data->push([null,$product->name,null,$product->quantity,$product->unit,$product->sum('price'),'',$product->sum('price')/$product->quantity]);
                foreach($product->components as $component){
                    $data->push([null,$component->name,'',$component->quantity,$component->unit,$component->price]);
                }
                $data->push(['']);
            }
        }
        return $data->merge($this->extraInfo);
    }

    public function headings() : array
    {
        return $this->headings;
    }

    public function title(): string
    {
        return $this->title;
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class    => function(AfterSheet $event) {
                $event->sheet->getRowDimension('1')->setRowHeight(30);
                $event->sheet->getRowDimension('2')->setRowHeight(20);
                $event->sheet->getColumnDimension('B')->setWidth(50);
                $event->sheet->getColumnDimension('D')->setWidth(11);
                $event->sheet->getColumnDimension('E')->setWidth(12);
                $event->sheet->getColumnDimension('F')->setWidth(14);
                $event->sheet->getColumnDimension('G')->setWidth(14);
                $event->sheet->getColumnDimension('H')->setWidth(16);
                $event->sheet->getColumnDimension('I')->setWidth(13);
                $event->sheet->getColumnDimension('K')->setWidth(20);
                $event->sheet->getColumnDimension('L')->setWidth(20);
                $event->sheet->getColumnDimension('M')->setWidth(20);
                $styleArray = [
                    'alignment' => [
                        'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                        'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
                    ]
                ];
                $event->sheet->mergeCells('A1:H1');
                $event->sheet->mergeCells('A2:H2');
                $event->sheet->mergeCells('D3:E3');
                $event->sheet->mergeCells('F3:H3');
                $event->sheet->mergeCells('K3:M4');
                $event->sheet->getStyle('A1:H2')->applyFromArray($styleArray);
                $event->sheet->getStyle('K3:M4')->applyFromArray($styleArray);
                $event->sheet->getDelegate()->getStyle('A1:H1')->getFont()->setSize(20);
                $event->sheet->getDelegate()->getStyle('A2:H2')->getFont()->setSize(14);
                $event->sheet->getDelegate()->getStyle('A3:H10')->getFont()->setSize(12);
                $event->sheet->getDelegate()->getStyle('K3:M4')->getFont()->setSize(12)->setBold(true);
                $event->sheet->getDelegate()->getStyle('A5:M5')->getFont()->setSize(12)->setBold(true);
                $event->sheet->getStyle('A5:I5')->getFill()
                                            ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                                            ->getStartColor()->setARGB('ffcc00');
                $event->sheet->getStyle('L5:M5')->getFill()
                                            ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                                            ->getStartColor()->setARGB('ffcc00');
                $i=6;
                foreach($this->project->rooms as $room){
                    $event->sheet->getStyle("A$i:I$i")->getFill()
                                            ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                                            ->getStartColor()->setARGB('ffcc00');
                    $event->sheet->getStyle("L$i:M$i")->getFill()
                                                ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                                                ->getStartColor()->setARGB('ffcc00');
                    $event->sheet->getDelegate()->getStyle("B$i:B$i")->getFont()->setSize(12)->setBold(true);
                    $i++;
                    foreach($room->products as $product){
                        $event->sheet->getDelegate()->getStyle("B$i:B$i")->getFont()->setSize(12)->setBold(true);
                        $i += $product->components->count()+2;
                    }
                }
                $event->sheet->getStyle("B1:B$i")->getAlignment()->setWrapText(true);
            },
        ];
    }
}
