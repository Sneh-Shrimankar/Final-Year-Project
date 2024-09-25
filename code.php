<?php
session_start();
include('dbconfig.php');

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
                $TLMIN =$row['13'];
                $TLR = $row['14'];
                $MathTot = $row['15'];
                $MathMin = $row['16'];
                $MathRe = $row['17'];
                $EVSTot = $row['18'];
                $EVSMin = $row['19'];
                $EVSRe = $row['20'];
                $DrawG = $row['21'];
                $DrawMin = $row['22'];
                $DrawRe = $row['23'];
                $WEG = $row['24'];
                $WEMin = $row['25'];
                $WERe = $row['26'];
                $PEG = $row['27'];
                $PEMin = $row['28'];
                $PERe = $row['29'];
                $Percen = $row['30'];
                $ReDate = $row['31'];
                $Remark = $row['32'];

                $studentQuery = "INSERT INTO 5_std_data (Roll_No,Stu_Name,Stu_ID,PEN_No,GR_No,Division,FLT,FLMIN,FLR,SLT,SLMIN,SLR,TLT,TLMIN,TLR,MathTot,MathMin,MathRe,EVSTot,EVSMin,EVSRe,DrawG,DrawMin,DrawRe,WEG,WEMin,WERe,PEG,PEMin,PERe,Percen,ReDate,Remark) VALUES 
                ('$Roll_No','$Stu_Name','$Stu_ID','$PEN_No','$GR_No','$Division','$FLT','$FLMIN','$FLR','$SLT','$SLMIN','$SLR','$TLT','$TLMIN','$TLR','$MathTot','$MathMin','$MathRe','$EVSTot','$EVSMin','$EVSRe','$DrawG','$DrawMin','$DrawRe','$WEG','$WEMin','$WERe','$PEG','$PEMin','$PERe','$Percen','$ReDate','$Remark')";
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
            header('Location: index.php');
            exit(0);
        }
        else
        {
            $_SESSION['message'] = "Not Imported";
            header('Location: index.php');
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