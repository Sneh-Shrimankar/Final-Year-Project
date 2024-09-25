<!doctype html>
<html lang="en">
<head>
<title>How to generate PDF in PHP dynamically by using TCPDF</title>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
<meta name="viewport" content="width=device-width" />
<!-- *Note: You must have internet connection on your laptop or pc other wise below code is not working -->
<!-- Add icon library -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<!-- bootstrap css and js -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"/>
<!-- JS for jQuery -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>
<body style="background-color:#E4F4F6">
<div class="container">
	<div class="row">
		<div class="col-lg-12" align="center">
			<br>
			<h2 align="center">Sheth Anandilal Podar Vidyalay Data Display</h2>
			<br>
			<table class="table table-striped">
			<thead>
			  <tr>
			  	<th>ID </th>
				<th>GR No</th>
				<th>Roll No</th>
				<th>Student Name</th>
				<th>Student ID</th>
				<th>Action</th>
			  </tr>
			</thead>
			<tbody>
			<?php                
			require 'database_connection.php'; 
			$display_query = "SELECT T1.id,T1.Roll_No,T1.Stu_Name,T1.Stu_ID,T1.PEN_No,T1.GR_No,T1.Division,T1.FLT,T1.FLMIN,T1.FLR,T1.SLT,T1.SLMIN,T1.SLR,T1.TLT,T1.TLMIN,T1.TLR,T1.MathTot,
			T1.MathMin,T1.MathRe,T1.EVSTot,T1.EVSMin,T1.EVSRe,T1.DrawG,T1.DrawMin,T1.DrawRe,T1.WEG,T1.WEMin,T1.WERe,T1.PEG,T1.PEMin,T1.PERe,T1.Percen,T1.ReDate,T1.Remark FROM 5_std_data T1";             
			$results = mysqli_query($con,$display_query);   
			$count = mysqli_num_rows($results);			
			if($count>0) 
			{
				while($data_row = mysqli_fetch_array($results, MYSQLI_ASSOC))
				{
					?>
				 <tr>
				 	<td><?php echo $data_row['id']; ?></td>
				 	<td><?php echo $data_row['GR_No']; ?></td>
				 	<td><?php echo $data_row['Roll_No']; ?></td>
				 	<td><?php echo $data_row['Stu_Name']; ?></td>
				 	<td><?php echo $data_row['Stu_ID']; ?></td>
				 	<td>
				 		<a href="pdf_maker.php?id=<?php echo $data_row['id']; ?>&ACTION=VIEW" class="btn btn-success"><i class="fa fa-file-pdf-o"></i> View PDF</a> &nbsp;&nbsp; 
				 		<a href="pdf_maker.php?id=<?php echo $data_row['id']; ?>&ACTION=DOWNLOAD" class="btn btn-danger"><i class="fa fa-download"></i> Download PDF</a>
						&nbsp;
					</td>
				 </tr>
				 <?php
				}
			}
			?>
				<div style="text-align: right;">
    <button type="submit" name="save_excel_data" class="btn btn-primary mt-3" style="color: white;"><a style="color:white;" href="ResultSelection.html">Back</a></button>
</div>
			</tbody>
			</table>
		</div>
	</div>
</div>
<br>
<div style="text-align: right;">
    <button type="submit" name="save_excel_data" class="btn btn-primary mt-3" style="color: white;"><a style="color:white;" href="ResultSelection.html">Back</a></button>
</div>

</body>
</html> 