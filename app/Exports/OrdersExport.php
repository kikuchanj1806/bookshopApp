<?php

namespace App\Exports;

use App\Models\OrderModel;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;


class OrdersExport implements FromCollection, WithHeadings, WithMappings
{
    protected $orders;

    public function __construct($orders)
    {
        $this->orders = $orders;
    }

    public function collection()
    {
        return $this->orders;
    }

    public function headings(): array
    {
        return [
            'Mã CTV',
            'Tên khách hàng',
            'Số điện thoại',
            'Địa chỉ',
            'Mã sách đặt',
            'Mã sách tặng',
            'Tổng tiền',
            'Ghi chú',
        ];
    }

    public function map($order): array
    {
       return [];
    }
    public function styles(Worksheet $sheet)
    {
        // Bạn có thể tùy chỉnh kiểu dáng của sheet nếu cần
        return [
            // Ví dụ: làm cho tiêu đề có kiểu chữ đậm
            1    => ['font' => ['bold' => true]],
        ];
    }

    public function columnFormats(): array
    {
        return [
            // Định dạng số cho các cột giá trị
            'F' => '#,##0',
            'G' => '#,##0',
            'H' => '#,##0',
            'I' => '#,##0',
        ];
    }
}
