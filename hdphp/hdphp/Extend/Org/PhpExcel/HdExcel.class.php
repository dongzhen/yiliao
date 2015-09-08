<?php
C('SHOW_NOTICE',false);
require_cache(HDPHP_PATH . 'Extend/Org/PhpExcel/Classes/PHPExcel.php');

class HdExcel
{
    private $objPHPExcel;
    private $code = array('A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z',
        'AA', 'AB', 'AC', 'AD', 'AE', 'AF', 'AG', 'AH', 'AI', 'AJ', 'AK', 'AL', 'AM', 'AN', 'AO', 'AP', 'AQ', 'AR', 'AS', 'AT', 'AU', 'AV', 'AW', 'AX', 'AY', 'AZ');

    public function __construct()
    {
        $this->objPHPExcel = new PHPExcel();
    }

    /**
     * 创建Excel文件
     */
    private function createExcelInit($data)
    {
        //创建人
//        $this->objPHPExcel->getProperties()->setCreator("");
////最后修改人
//        $this->objPHPExcel->getProperties()->setLastModifiedBy("");
////标题
//        $this->objPHPExcel->getProperties()->setTitle("");
////题目
//        $this->objPHPExcel->getProperties()->setSubject("");
////描述
//        $this->objPHPExcel->getProperties()->setDescription("");
////关键字
//        $this->objPHPExcel->getProperties()->setKeywords("");
////种类
//        $this->objPHPExcel->getProperties()->setCategory("");
////设置当前的sheet
//        $this->objPHPExcel->setActiveSheetIndex(0);
////设置sheet的name
//        $this->objPHPExcel->getActiveSheet()->setTitle('');
//合并单元格
//        $this->objPHPExcel->getActiveSheet()->mergeCells('A1:G1');
//

////文字

        //第一行字段名
        $field = array_keys(current($data));
        foreach ($field as $i => $v) {
            $col = $this->code[$i] . 1;
            $this->objPHPExcel->getActiveSheet()->getStyle($col)->getFont()->setSize(18);
            $this->objPHPExcel->getActiveSheet()->getStyle($col)->getFont()->setBold(true);

            //设置背景颜色
            $this->objPHPExcel->getActiveSheet()->getStyle($col)->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID);
            $this->objPHPExcel->getActiveSheet()->getStyle($col)->getFill()->getStartColor()->setARGB('c7d8c5');
            //单元格对齐
            $this->objPHPExcel->getActiveSheet()->getStyle($col)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

//边框边框线
            $this->objPHPExcel->getActiveSheet()->getStyle($col)->getBorders()->getTop()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
            $this->objPHPExcel->getActiveSheet()->getStyle($col)->getBorders()->getRight()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
            $this->objPHPExcel->getActiveSheet()->getStyle($col)->getBorders()->getBottom()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
            $this->objPHPExcel->getActiveSheet()->getStyle($col)->getBorders()->getLeft()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
//边框边框颜色
            $this->objPHPExcel->getActiveSheet()->getStyle($col)->getBorders()->getLeft()->getColor()->setARGB('333333');
            $this->objPHPExcel->getActiveSheet()->getStyle($col)->getBorders()->getTop()->getColor()->setARGB('333333');
            $this->objPHPExcel->getActiveSheet()->getStyle($col)->getBorders()->getBottom()->getColor()->setARGB('333333');
            $this->objPHPExcel->getActiveSheet()->getStyle($col)->getBorders()->getRight()->getColor()->setARGB('333333');


//设置单元格的值
            $this->objPHPExcel->getActiveSheet()->setCellValue($col, $v, PHPExcel_Style_NumberFormat::FORMAT_TEXT);
        }

        //插入数据
        foreach ($data as $n => $d) {
            $i = 0;
            $n += 1;
            foreach ($d as $v) {
                $col = $this->code[$i] . ($n + 1);
                $i++;
                $this->objPHPExcel->getActiveSheet()->getStyle($col)->getFont()->setSize(14);
                $this->objPHPExcel->getActiveSheet()->getStyle($col)->getFont()->setBold(true);
                $this->objPHPExcel->getActiveSheet()->getColumnDimension($this->code[$i])->setAutoSize(true);
//边框边框线
                $this->objPHPExcel->getActiveSheet()->getStyle($col)->getBorders()->getTop()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
                $this->objPHPExcel->getActiveSheet()->getStyle($col)->getBorders()->getRight()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
                $this->objPHPExcel->getActiveSheet()->getStyle($col)->getBorders()->getBottom()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
                $this->objPHPExcel->getActiveSheet()->getStyle($col)->getBorders()->getLeft()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
//边框边框颜色
                $this->objPHPExcel->getActiveSheet()->getStyle($col)->getBorders()->getLeft()->getColor()->setARGB('333333');
                $this->objPHPExcel->getActiveSheet()->getStyle($col)->getBorders()->getTop()->getColor()->setARGB('333333');
                $this->objPHPExcel->getActiveSheet()->getStyle($col)->getBorders()->getBottom()->getColor()->setARGB('333333');
                $this->objPHPExcel->getActiveSheet()->getStyle($col)->getBorders()->getRight()->getColor()->setARGB('333333');


//设置单元格的值
                $this->objPHPExcel->getActiveSheet()->setCellValueExplicit($col, $v, PHPExcel_Cell_DataType::TYPE_STRING);
            }
        }
//储存

    }

    /**
     * 数据
     * @param array $data
     * @param string $file
     */
    public function createExcel($data, $file)
    {
        $this->createExcelInit($data);
        $objWriter = PHPExcel_IOFactory::createWriter($this->objPHPExcel, 'Excel2007');
        $objWriter->save($file . '.xlsx');
    }

    /**
     * 下载Excel文件
     */
    public function downloadExcel($data)
    {
        $this->createExcelInit($data);
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="01simple.xls"');
        header('Cache-Control: max-age=0');
        // If you're serving to IE 9, then the following may be needed
        header('Cache-Control: max-age=1');
        // If you're serving to IE over SSL, then the following may be needed
        header('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
        header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT'); // always modified
        header('Cache-Control: cache, must-revalidate'); // HTTP/1.1
        header('Pragma: public'); // HTTP/1.0
        $objWriter = PHPExcel_IOFactory::createWriter($this->objPHPExcel, 'Excel2007');
        $objWriter->save('php://output');
        exit;
    }

    /**
     * 读取Excel
     * @param string $filePath Excel文件
     * @return array
     */
    public function readExcel($filePath)
    {
        $PHPReader = new PHPExcel_Reader_Excel2007();
        if (!$PHPReader->canRead($filePath)) {
            $PHPReader = new PHPExcel_Reader_Excel5();
            if (!$PHPReader->canRead($filePath)) {
                echo 'no Excel';
                return;
            }
        }

        $PHPExcel = $PHPReader->load($filePath);
        /**读取excel文件中的第一个工作表*/
        $currentSheet = $PHPExcel->getSheet(0);
        /**取得最大的列号*/
        $allColumn = $currentSheet->getHighestColumn();
        /**取得一共有多少行*/
        $allRow = $currentSheet->getHighestRow();
        $data = array();
        /**从第二行开始输出，因为excel表中第一行为列名*/
        for ($currentRow = 2; $currentRow <= $allRow; $currentRow++) {
            /**从第A列开始输出*/
            $tmp = array();
            for ($currentColumn = 'A'; $currentColumn <= $allColumn; $currentColumn++) {
                $val = $currentSheet->getCellByColumnAndRow(ord($currentColumn) - 65, $currentRow)->getValue();
                /**ord()将字符转为十进制数*/
                $tmp[] = $val;
            }
            $data[] = $tmp;
        }
        return $data;
    }
}