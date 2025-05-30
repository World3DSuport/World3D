<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\WithDrawings;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use PhpOffice\PhpSpreadsheet\Worksheet\Drawing;

class UsuariosExport implements FromCollection, WithHeadings, WithTitle, WithDrawings, WithEvents
{
    public function collection()
    {
        return User::select('id', 'name', 'email', 'created_at')->get();
    }

    public function headings(): array
    {
        return ['ID', 'Nombre', 'Correo Electrónico', 'Fecha de Registro'];
    }

    public function title(): string
    {
        return 'Usuarios World3D';
    }

    public function drawings()
    {
        $drawing = new Drawing();
        $drawing->setName('Logo');
        $drawing->setDescription('World3D');
        $drawing->setPath(public_path('img/logo.PNG'));
        $drawing->setHeight(70);
        $drawing->setCoordinates('A1');

        return $drawing;
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function (AfterSheet $event) {
                $sheet = $event->sheet->getDelegate();

                // Ajustar anchos automáticamente
                foreach (range('A', 'D') as $col) {
                    $sheet->getColumnDimension($col)->setAutoSize(true);
                }

                // Aplicar estilos a los encabezados
                $sheet->getStyle('A5:D5')->applyFromArray([
                    'font' => [
                        'bold' => true,
                        'color' => ['rgb' => 'FFFFFF'],
                    ],
                    'fill' => [
                        'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                        'startColor' => ['rgb' => '4F81BD'],
                    ],
                    'alignment' => [
                        'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                    ],
                ]);

                // Mensaje promocional estilizado
                $sheet->mergeCells('A4:D4');
                $sheet->setCellValue('A4', 'Transforma fotogramas en increíbles modelos 3D, diseñando el futuro en tus manos.');
                $sheet->getStyle('A4')->applyFromArray([
                    'font' => [
                        'italic' => true,
                        'size' => 12,
                        'color' => ['rgb' => '333333'],
                    ],
                    'alignment' => [
                        'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                    ],
                ]);

                // Congelar fila de encabezado
                $sheet->freezePane('A6');
            },
        ];
    }
}