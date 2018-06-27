<?php

//index.php

$error = '';
$firstName = '';
$lastName = '';
$number = '';
$email = '';
$type = '';
$firstName2 = '';
$lastName2 = '';
$number2 = '';

function clean_text($string)
{
	$string = trim($string);
	$string = stringslashes($string);
	$string = htmlspecialchars($string);
	return $string;
}


if(isset($_POST["submit"]))
{
	if(empty($_POST["firstName"]))
	{
		$error .= '<p><label class= "text-danger"> Please Enter your Name</label></p>';
	}
	else
	{
		$firstName = clean_text($_POST["firstName"]);
		if(!preg_match("/^[a-zA-Z]*$/", $firstName)
		{
			$error .= '<p><label class= "text-danger"> Only letters and white space allowed</label></p>';
		}
	}

	if(empty($_POST["lastName"]))
	{
		$error .= '<p><label class= "text-danger"> Please Enter your Surname</label></p>';
	}
	else
	{
		$lastName = clean_text($_POST["lastName"]);
		if(!preg_match("/^[a-zA-Z]*$/", $lastName)
		{
			$error .= '<p><label class= "text-danger"> Only letters and white space allowed</label></p>';
		}
	}

	if(empty($_POST["email"]))
	{
		$error .= '<p><label class= "text-danger"> Please Enter your Name</label></p>';
	}
	else
	{
		$email = clean_text($_POST["email"]);
		if(!filter_var($email, FILTER_VALIDATE_EMAIL)
		{
			$error .= '<p><label class= "text-danger"> Invalid email/label></p>';
		}
	}

	if(empty($_POST["number"]))
	{
		$error .= '<p><label class= "text-danger"> Please Enter your number</label></p>';
	}
	else
	{
		$number = clean_text($_POST["number"]);
		if(!preg_match("/^[0-9-+]$/", $number)
		{
			$error .= '<p><label class= "text-danger"> Invalid number</label></p>';
		}
	}


	if(empty($_POST["firstName2"]))
	{
		$error .= '<p><label class= "text-danger"> Please Enter your emerancy contact´s Name</label></p>';
	}
	else
	{
		$firstName = clean_text($_POST["firstName2"]);
		if(!preg_match("/^[a-zA-Z]*$/", $firstName)
		{
			$error .= '<p><label class= "text-danger"> Only letters and white space allowed</label></p>';
		}
	}

	if(empty($_POST["lastName2"]))
	{
		$error .= '<p><label class= "text-danger"> Please Enter your emerancy contact´s Surname</label></p>';
	}
	else
	{
		$lastName = clean_text($_POST["lastName2"]);
		if(!preg_match("/^[a-zA-Z]*$/", $lastName)
		{
			$error .= '<p><label class= "text-danger"> Only letters and white space allowed</label></p>';
		}
	}

	if(empty($_POST["number2"]))
	{
		$error .= '<p><label class= "text-danger"> Please Enter your emerancy contact´s number</label></p>';
	}
	else
	{
		$number2 = clean_text($_POST["number2"]);
		if(!preg_match("/^[0-9-+]$/", $number2)
		{
			$error .= '<p><label class= "text-danger"> Invalid number</label></p>';
		}
	}

	if($error == '')
	{
		$file_open = fopen("Register.csv", "a");
		$no_rows = count(file("Register.csv"));
		if($no_rows > 1)
		{
			$no_rows = ($no_rows - 1) + 1;
		}
		$form_data = array(
			'sr_no'  => $no_rows,
			'firstName'  => $firstName,
			'lastName'  => $lastName,
			'number'  => $number,
			'email'  => $email,
			'firstName2'  => $firstName2,
			'lastName2'  => $lastName2,
			'number2'  => $number2
		);
		fputcsv($file_open, $form_data);
		$error .= '<label class= "text-success"> Thank you for your registration!!!</label>';
		$firstName = '';
		$lastName = '';
		$number = '';
		$email = '';
		$type = '';
		$firstName2 = '';
		$lastName2 = '';
		$number2 = '';
	}
	
}

?>
