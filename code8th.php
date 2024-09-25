<?php
session_start();
include('dbconfig8th.php');

require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

if(isset($_POST['save_excel_data']))
{
    $fileName = $_FILES['import_file']['name'];
    $file_ext = pathinfo($fileName, PATHINFO_EXTENSION);

    $allowed_ext = ['xls','csv','xlsx'];

    if(in_array($file_ext, $allowed_ext))
    {
        $inputFileNamePath = $_FILES['import_file']['tmp_name'];
        $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($inputFileNamePath);
        $data = $spreadsheet->getActiveSheet()->toArray();

        $count = "0";
        foreach($data as $row)
        {
            if($count > 0)
            {
                $Roll_No = $row['0'];
                $Stu_Name = $row['1'];
                $Stu_ID = $row['2'];
                $PEN_No = $row['3'];
                $GR_No = $row['4'];
                $Division = $row['5'];
                $FLT = $row['6'];
                $FLMIN = $row['7'];
                $FLR = $row['8'];
                $SLT = $row['9'];
                $SLMIN = $row['10'];
                $SLR = $row['11'];
                $TLT = $row['12'];
                $TLMIN = $row['13'];
                $TLR = $row['14'];
                $MathTot = $row['15'];
                $MathMin = $row['16'];
                $MathRe = $row['17'];
                $SciTot = $row['18'];
                $SciMin = $row['19'];
                $SciRe = $row['20'];
                $SoSciTot = $row['21'];
                $SoSciMin = $row['22'];
                $SoSciRe = $row['23'];
                $DrawG = $row['24'];
                $DrawMin = $row['25'];
                $DrawRe = $row['26'];
                $WEG = $row['27'];
                $WEGMin = $row['28'];
                $WERe = $row['29'];
                $PEG = $row['30'];
                $PEGMin = $row['31'];
                $PERe = $row['32'];
                $Percen = $row['33'];
                $ReDate = $row['34'];
                $Remark = $row['35'];

                $studentQuery = "INSERT INTO 8_std_data (Roll_No,Stu_Name,Stu_ID,PEN_No,GR_No,Division,FLT,FLMIN,FLR,SLT,SLMIN,SLR,TLT,TLMIN,TLR,MathTot,MathMin,MathRe,SciTot,SciMin,SciRe,SoSciTot,SoSciMin,SoSciRe,DrawG,DrawMin,DrawRe,WEG,WEGMin,WERe,PEG,PEGMin,PERe,Percen,ReDate,Remark) VALUES 
                ('$Roll_No','$Stu_Name','$Stu_ID','$PEN_No','$GR_No','$Division','$FLT','$FLMIN','$FLR','$SLT','$SLMIN','$SLR','$TLT','$TLMIN','$TLR','$MathTot','$MathMin','$MathRe','$SciTot','$SciMin','$SciRe','$SoSciTot','$SoSciMin','$SoSciRe','$DrawG','$DrawMin','$DrawRe','$WEG','$WEGMin','$WERe','$PEG','$PEGMin','$PERe','$Percen','$ReDate','$Remark')";
                $result = mysqli_query($conn, $studentQuery);
                $msg = true;
            }
            else
            {
                $count = "1";
            }
        }

        if(isset($msg))
        {
            $_SESSION['message'] = "Successfully Imported";
            header('Location: index8std.php');
            exit(0);
        }
        else
        {
            $_SESSION['message'] = "Not Imported";
            header('Location: index8std.php');
            exit(0);
        }
    }
    else
    {
        $_SESSION['message'] = "Invalid File";
        header('Location: index.php');
        exit(0);
    }
}
?>