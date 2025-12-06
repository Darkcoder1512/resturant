<?php
	if(isset($_POST['employeeadd']))
	{
		$f1= $_POST['id'];
		$f2= $_POST['fname'];
		$f4= $_POST['desi'];
		$f5= $_POST['wtype'];
		$f6= $_POST['address'];
		$f7= $_POST['city'];
		$f8= $_POST['lname'];		
		$f3= $_POST['state'];
		$f9= $_POST['pcode'];
		$f10= $_POST['cno'];
		$f11= $_POST['salary'];
		$f110= $_POST['bdate'];
		require_once __DIR__ . '/connect.php';
		if(!$con || !($con instanceof mysqli)){die('Unable to connect..!!');}
		// Ensure employee table exists
		$con->query("CREATE TABLE IF NOT EXISTS `employee` (
		  `Emp_id` varchar(8) NOT NULL,
		  `Emp_fname` varchar(10) NOT NULL,
		  `Designation` varchar(10) DEFAULT NULL,
		  `Work_type` varchar(30) DEFAULT NULL,
		  `Address` varchar(50) DEFAULT NULL,
		  `City` varchar(10) DEFAULT NULL,
		  `Emp_lname` varchar(10) NOT NULL,
		  `State` varchar(20) DEFAULT NULL,
		  `Pincode` varchar(6) DEFAULT NULL,
		  `Contact_no` varchar(13) DEFAULT NULL,
		  `Emp_salary` float DEFAULT NULL,
		  `hiring_date` date DEFAULT NULL,
		  `bdate` date DEFAULT NULL,
		  PRIMARY KEY (`Emp_id`)
		) ENGINE=InnoDB DEFAULT CHARSET=latin1");
		
		$q1 = "insert into employee values ('$f1','$f2','$f4','$f5','$f6','$f7','$f8','$f3','$f9','$f10','$f11',curdate(),'$f110')";
		$result1=mysqli_query($con,$q1);
	
		if(mysqli_affected_rows($con)>0)
		{
			echo 'Data inserted Successfully...!!';
		}
		else
		{
			echo 'Data is not inserted ...!!';
		}
	   header("refresh:1; url=mainpage.html");
	}
	
	else if(isset($_POST['employeedelete']))
	{
		require_once __DIR__ . '/connect.php';
		if(!$con || !($con instanceof mysqli)) { die('Unable to connect..!!'); }
		$con->query("CREATE TABLE IF NOT EXISTS `employee` (
		  `Emp_id` varchar(8) NOT NULL,
		  `Emp_fname` varchar(10) NOT NULL,
		  `Designation` varchar(10) DEFAULT NULL,
		  `Work_type` varchar(30) DEFAULT NULL,
		  `Address` varchar(50) DEFAULT NULL,
		  `City` varchar(10) DEFAULT NULL,
		  `Emp_lname` varchar(10) NOT NULL,
		  `State` varchar(20) DEFAULT NULL,
		  `Pincode` varchar(6) DEFAULT NULL,
		  `Contact_no` varchar(13) DEFAULT NULL,
		  `Emp_salary` float DEFAULT NULL,
		  `hiring_date` date DEFAULT NULL,
		  `bdate` date DEFAULT NULL,
		  PRIMARY KEY (`Emp_id`)
		) ENGINE=InnoDB DEFAULT CHARSET=latin1");
		$f12= $_POST['id'];
		
		$q2 = "delete from employee where `Emp_id`='$f12'";
		$result2=mysqli_query($con,$q2);
	
		if(mysqli_affected_rows($con)>0)
		{
			echo 'Data deleted Successfully...!!';
		}
		else
		{
			echo 'Data is not deleted ...!!';
		}
	   header("refresh:1; url=mainpage.html");
	}
	
	
	else if(isset($_POST['employeesearch']))
	{
		$con = mysqli_connect('localhost','root','');
		if(!$con)
		{
			die('Unable to connect..!!');
		}
		mysqli_select_db($con,'restaurant');
		$f13= $_POST['id'];
		
		$q3 = "select *  from employee where `Emp_id`='$f13'";
		$result3=mysqli_query($con,$q3);
	
		if($result3){
		if(mysqli_num_rows($result3))
		{
			while($row=mysqli_fetch_array($result3))
			{
				echo "<br/>first name: " .$row['Emp_id'];
				echo "<br/>first name: " .$row['Emp_fname'];
				echo "<br/>designation: ".$desi=$row['Designation'];
				echo "<br/>work type: ".$wtype=$row['Work_type'];
				echo "<br/>address: ".$address=$row['Address'];
				echo "<br/>city: ".$city=$row['City'];
				echo "<br/>last name: ".$lname=$row['Emp_lname'];
				echo "<br/>state: ".$state=$row['State'];
				echo "<br/>pincode: ".$pcode=$row['Pincode'];
				echo "<br/>contact_no: ".$cno=$row['Contact_no'];
				echo "<br/>salary: ".$salary=$row['Emp_salary'];
				echo "<br/>Birth Date: ".$salary=$row['bdate'];
				echo "<br/>Hiring date: ".$salary=$row['hiring_date'];
				
			}
				
		}}
		else
		{
			echo 'Data is not found ...!!';
		}
	   header("refresh:5; url=mainpage.html");
	}
	else if(isset($_POST['customeradd']))
	{
		$f21= $_POST['cid'];
		$f22= $_POST['cfname'];
		$f23= $_POST['clname'];
		$f24= $_POST['ccity'];
		$f25= $_POST['caddress'];
		$f26= $_POST['cpcode'];
		$f27= $_POST['ccno'];
		$f28= $_POST['cemailid'];
		$f29= $_POST['cstate'];
		
		require_once __DIR__ . '/connect.php';
		if(!$con || !($con instanceof mysqli)){die('Unable to connect..!!');}
		// Ensure customer table exists
		$con->query("CREATE TABLE IF NOT EXISTS `customer` (
		  `Cust_id` varchar(8) NOT NULL,
		  `Cust_fname` varchar(8) DEFAULT NULL,
		  `City` varchar(15) DEFAULT NULL,
		  `Address` varchar(50) DEFAULT NULL,
		  `Cust_lname` varchar(8) DEFAULT NULL,
		  `Pincode` varchar(6) DEFAULT NULL,
		  `Contact_no` varchar(13) DEFAULT NULL,
		  `Email_id` varchar(30) DEFAULT NULL,
		  `State` varchar(20) DEFAULT NULL,
		  PRIMARY KEY (`Cust_id`)
		) ENGINE=InnoDB DEFAULT CHARSET=latin1");
		
		$q4 = "insert into customer values ('$f21','$f22','$f23','$f24','$f25','$f26','$f27','$f28','$f29')";
		$result4=mysqli_query($con,$q4);
	
		if(mysqli_affected_rows($con)>0)
		{
			echo 'Data inserted Successfully...!!';
		}
		else
		{
			echo 'Data is not inserted ...!!';
		}
	   header("refresh:1; url=mainpage.html");
	}
	
	else if(isset($_POST['customerdelete']))
	{
		require_once __DIR__ . '/connect.php';
		if(!$con || !($con instanceof mysqli)) { die('Unable to connect..!!'); }
		$con->query("CREATE TABLE IF NOT EXISTS `customer` (
		  `Cust_id` varchar(8) NOT NULL,
		  `Cust_fname` varchar(8) DEFAULT NULL,
		  `City` varchar(15) DEFAULT NULL,
		  `Address` varchar(50) DEFAULT NULL,
		  `Cust_lname` varchar(8) DEFAULT NULL,
		  `Pincode` varchar(6) DEFAULT NULL,
		  `Contact_no` varchar(13) DEFAULT NULL,
		  `Email_id` varchar(30) DEFAULT NULL,
		  `State` varchar(20) DEFAULT NULL,
		  PRIMARY KEY (`Cust_id`)
		) ENGINE=InnoDB DEFAULT CHARSET=latin1");
		$f30= $_POST['cid'];
		
		$q5 = "delete from Customer where `Cust_id`='$f30'";
		$result5=mysqli_query($con,$q5);
	
		if(mysqli_affected_rows($con)>0)
		{
			echo 'Data deleted Successfully...!!';
		}
		else
		{
			echo 'Data is not deleted ...!!';
		}
	   header("refresh:1; url=mainpage.html");
	}
	
	
	else if(isset($_POST['customersearch']))
	{
		$con = mysqli_connect('localhost','root','');
		if(!$con)
		{
			die('Unable to connect..!!');
		}
		mysqli_select_db($con,'restaurant');
		$f31= $_POST['cid'];
		
		$q6 = "select *  from customer where `Cust_id`='$f31'";
		$result6=mysqli_query($con,$q6);
	
		if(mysqli_affected_rows($con)>0)
		{
			while($row=mysqli_fetch_array($result6))
			{
				echo "<br/> id: "   .$row['Cust_id'];
				echo "<br/>first name: " .$row['Cust_fname'];				
				echo "<br/>last name: ".$lname=$row['Cust_lname'];
				echo "<br/>city: ".$city=$row['City'];
				echo "<br/>address: ".$address=$row['Address'];
				echo "<br/>pincode: ".$pcode=$row['Pincode'];
				echo "<br/>contact_no: ".$cno=$row['Contact_no'];
				echo "<br/>email id: ".$salary=$row['Email_id'];
				echo "<br/>state: ".$state=$row['State'];
				
			}
				
		}
		else
		{
			echo 'Data is not found ...!!';
		}
	   header("refresh:5; url=mainpage.html");
	}
	else if(isset($_POST['menu']))
	{
		require_once __DIR__ . '/connect.php';
		if(!isset($con) || !($con instanceof mysqli))
		{
			die('Unable to connect..!!');
		}
		$f31= $_POST['cid'];
		
		// Ensure required tables exist (lightweight guard)
		$con->query("CREATE TABLE IF NOT EXISTS `categories` (
		  `category_id` varchar(8) NOT NULL,
		  `category_name` varchar(20) DEFAULT NULL,
		  PRIMARY KEY (`category_id`)
		) ENGINE=InnoDB DEFAULT CHARSET=latin1");
		$con->query("CREATE TABLE IF NOT EXISTS `food` (
		  `Food_id` varchar(8) NOT NULL,
		  `Food_name` varchar(20) NOT NULL,
		  `Price` int(11) DEFAULT NULL,
		  `Rate` float DEFAULT NULL,
		  `Prep_time` time DEFAULT NULL,
		  `Spice_level` int(11) DEFAULT NULL,
		  `Is_Jain` varchar(3) DEFAULT NULL,
		  `Food_description` varchar(100) DEFAULT NULL,
		  `category_id` varchar(8) DEFAULT NULL,
		  PRIMARY KEY (`Food_id`)
		) ENGINE=InnoDB DEFAULT CHARSET=latin1");

		// Use direct SELECT for menu
		$q6 = "SELECT food.category_id, categories.category_name, food.Food_id, food.Food_name, food.Price, food.Rate, food.Prep_time, food.Spice_level, food.Is_Jain, food.Food_description FROM food LEFT JOIN categories ON categories.category_id = food.category_id ORDER BY food.category_id, food.spice_level ASC";
		$result6 = mysqli_query($con, $q6);
		if (!$result6) {
			echo 'Menu query failed: ' . mysqli_error($con);
		}
	
		if($result6 && mysqli_num_rows($result6) > 0)
		{
			echo "<h1 >&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;Menu</h1>";
			echo " 	category_id	&emsp;	category name &emsp; food id &emsp; food name &emsp; price &emsp; rate &emsp; prep_time &emsp; spice_level &emsp; is_jain &emsp; food_description &emsp;<br/>";
			while($row=mysqli_fetch_array($result6))
			{
				echo "<br/>&emsp;&emsp;&emsp;".$row['category_id'];
				echo "&emsp;&emsp;&emsp;".$row['category_name'];				
				echo "&emsp;&emsp;&emsp;".$lname=$row['Food_id'];
				echo "&emsp;&emsp;&emsp;".$city=$row['Food_name'];
				echo "&emsp;&emsp;".$cno=$row['Prep_time'];
				echo "&emsp;&emsp;&emsp;".$salary=$row['Spice_level'];
				echo "&emsp;&emsp;&emsp;".$state=$row['Is_Jain'];				
				echo "&emsp;&emsp;".$address=$row['Price'];
				echo "&emsp;&emsp;".$pcode=$row['Rate'];
				echo "&emsp;&emsp;".$state=$row['Food_description'];
				echo "<br/>";
			}
				
		}
		else {
			// Fallback: list items even without categories
			$q6b = "SELECT Food_id, Food_name, Price, Rate, Prep_time, Spice_level, Is_Jain, Food_description FROM food ORDER BY Food_name ASC";
			$result6b = mysqli_query($con, $q6b);
			if ($result6b && mysqli_num_rows($result6b) > 0) {
				echo "<h1 >&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;Menu</h1>";
				echo " \tfood id &emsp; food name &emsp; price &emsp; rate &emsp; prep_time &emsp; spice_level &emsp; is_jain &emsp; food_description &emsp;<br/>";
				while($row=mysqli_fetch_array($result6b)) {
					echo "<br/>&emsp;&emsp;&emsp;".$row['Food_id'];
					echo "&emsp;&emsp;&emsp;".$row['Food_name'];
					echo "&emsp;&emsp;".$row['Prep_time'];
					echo "&emsp;&emsp;&emsp;".$row['Spice_level'];
					echo "&emsp;&emsp;&emsp;".$row['Is_Jain'];
					echo "&emsp;&emsp;".$row['Price'];
					echo "&emsp;&emsp;".$row['Rate'];
					echo "&emsp;&emsp;".$row['Food_description'];
					echo "<br/>";
				}
			} else {
				echo 'Data is not found ...!!';
			}
		}
	   header("refresh:5; url=mainpage.html");
	}
	else if(isset($_POST['prev']))
	{
		$con = mysqli_connect('localhost','root','');
		if(!$con)
		{
			die('Unable to connect..!!');
		}
		mysqli_select_db($con,'restaurant');
		
	   header("refresh:1; url=index.html");
	}
	else if(isset($_POST['next']))
	{
		$con = mysqli_connect('localhost','root','');
		if(!$con)
		{
			die('Unable to connect..!!');
		}
		mysqli_select_db($con,'restaurant');
		
	   header("refresh:1; url=page2.php");
	}
	


?>