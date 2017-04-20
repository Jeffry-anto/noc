<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>NOC Admin Page</title>
 
  
  <link rel="stylesheet" type="text/css" href="./media/css/jquery.dataTables.css">
	<link rel="stylesheet" type="text/css" href="./resources/syntax/shCore.css">
  <link rel="stylesheet" type="text/css" href="./resources/demo.css">
  
  <link rel="stylesheet" href="./Assets/lib/bootstrap/dist/css/bootstrap.min.css" type="text/css" /> 
    <link rel="stylesheet" href="./Assets/css/simple-sidebar.css" type="text/css" />
  
    <link rel="stylesheet" href="./Assets/css/custom1.css" type="text/css" />
 
  
  
  <style>
	#alertwarning
	{
		background-color:#27ae60;
		border:none;
		color:#fff;
		font-weight:bold;
	}
  
  	#alertdanger
	{
		background-color:#e74c3c;
		border:none;
		color:#fff;
		font-weight:bold;
	}
  @media only screen and (max-width: 800px) {
    
    /* Force table to not be like tables anymore */
	#no-more-tables table, 
	#no-more-tables thead, 
	#no-more-tables tbody, 
	#no-more-tables th, 
	#no-more-tables td, 
	#no-more-tables tr { 
		display: block; 
	}
 
	/* Hide table headers (but not display: none;, for accessibility) */
	#no-more-tables thead tr { 
		position: absolute;
		top: -9999px;
		left: -9999px;
	}
 
	#no-more-tables tr { border: 1px solid #ccc; }
 
	#no-more-tables td { 
		/* Behave  like a "row" */
		border: none;
		border-bottom: 1px solid #eee; 
		position: relative;
		padding-left: 50%; 
		white-space: normal;
		text-align:left;
	}
 
	#no-more-tables td:before { 
		/* Now like a table header */
		position: absolute;
		/* Top/left values mimic padding */
		top: 6px;
		left: 6px;
		width: 45%; 
		padding-right: 10px; 
		white-space: nowrap;
		text-align:left;
		font-weight: bold;
	}
 
	/*
	Label the data
	*/
	#no-more-tables td:before { content: attr(data-title); }
	
}
	
	

</style>
  
</head>
<body>