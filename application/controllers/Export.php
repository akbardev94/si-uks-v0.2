<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Export extends CI_Controller
{
    // construct
    public function __construct()
    {
        parent::__construct();
        // load model
        $this->load->model('Export_model', 'export');
    }

    public function index()
    {
        $data['export_list'] = $this->export->exportList();
        $this->load->view('export', $data);
    }
    // create xlsx
    public function generateXls()
    {
        // create file name
        $fileName = 'data-' . time() . '.xlsx';
        // load excel library
        $this->load->library('excel');
        $listInfo = $this->export->exportList();
        $objPHPExcel = new PHPExcel();
        $objPHPExcel->setActiveSheetIndex(0);
        // set Header
        $objPHPExcel->getActiveSheet()->SetCellValue('A1', 'First Name');
        $objPHPExcel->getActiveSheet()->SetCellValue('B1', 'Last Name');
        $objPHPExcel->getActiveSheet()->SetCellValue('C1', 'Email');
        $objPHPExcel->getActiveSheet()->SetCellValue('D1', 'DOB');
        $objPHPExcel->getActiveSheet()->SetCellValue('E1', 'Contact_No');
        // set Row
        $rowCount = 2;
        foreach ($listInfo as $list) {
            $objPHPExcel->getActiveSheet()->SetCellValue('A' . $rowCount, $list->first_name);
            $objPHPExcel->getActiveSheet()->SetCellValue('B' . $rowCount, $list->last_name);
            $objPHPExcel->getActiveSheet()->SetCellValue('C' . $rowCount, $list->email);
            $objPHPExcel->getActiveSheet()->SetCellValue('D' . $rowCount, $list->dob);
            $objPHPExcel->getActiveSheet()->SetCellValue('E' . $rowCount, $list->contact_no);
            $rowCount++;
        }
        $filename = "si-uks" . date("Y-m-d-H-i-s") . ".csv";
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="' . $filename . '"');
        header('Cache-Control: max-age=0');
        // $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'CSV');
        // $objWriter->save('php://output');
    }
}
