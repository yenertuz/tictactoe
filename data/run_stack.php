<?php

function	get_stack_string()
{
	if (file_exists("stack") == 0)
		exit(-1);
	$stack_string = file_get_contents("stack");
	$stack_string = trim($stack_string);
	if (strlen($stack_string) == 0)
		exit(-1);
	return ($stack_string);
}

function	check_new($new)
{
	if (substr_count($new, ".") == 0)
		return (-1);
	$r1c1 = $new[0];
	$r1c2 = $new[1];
	$r1c3 = $new[2];
	$r2c1 = $new[3];
	$r2c2 = $new[4];
	$r2c3 = $new[5];
	$r3c1 = $new[6];
	$r3c2 = $new[7];
	$r3c3 = $new[8];
	if ($r1c1 == $r1c2 && $r1c2 == $r1c3 && $r1c1 != ".") // row 1
		return (1);
	if ($r2c1 == $r2c2 && $r2c2 == $r2c3 && $r2c1 != ".") // row 2
		return (1);
	if ($r3c1 == $r3c2 && $r3c2 == $r3c3 && $r3c1 != ".") // row 3
		return (1);
	if ($r1c1 == $r2c1 && $r2c1 == $r3c1 && $r1c1 != ".") // column 1
		return (1);
	if ($r1c2 == $r2c2 && $r2c2 == $r3c2 && $r1c2 != ".") // column 2
		return (1);
	if ($r1c3 == $r2c3 && $r2c3 == $r3c3 && $r1c3 != ".") // column 3
		return (1);
	if ($r1c1 == $r2c2 && $r2c2 == $r3c3 && $r1c1 != ".") // diagonal 1 
		return (1);
	if ($r1c3 == $r2c2 && $r2c2 == $r3c1 && $r1c3 != ".") // diagonal 2
		return (1);
	return (0);
}

function	add_new_to_stack($new)
{
	$new = str_replace("u", "a", $new);
	$new = str_replace("t", "u", $new);
	$new = str_replace("a", "t", $new);
	file_put_contents("stack", $new."\n", FILE_APPEND);
}

function	add_new_to_logs($focus, $new, $new_check, $index)
{
	$to_write = $focus."\t".$index."\t".$new."\t".$new_check."\n";
	file_put_contents("records", $to_write, FILE_APPEND);
}

function	process_focus($focus)
{
	$len = 9;
	$index = 0;
	echo "FOR THE FOCUS ".$focus."\n\n";
	while ($index < $len)
	{
		if ($focus[$index] == ".")
		{
			//echo $index." IS A POSSIBLE MOVE\n";
			$new = $focus;
			$new[$index] = "u";
			//echo $new." IS THE RESULT\n";
			$new_check = check_new($new);
			//echo $new_check." IS THE CHECK ON THE RESULT\n\n";
			if ($new_check == 0)
				add_new_to_stack($new);
			add_new_to_logs($focus, $new, $new_check, $index);
		}
		$index++;
	}
}

function	rewrite_stack($focus)
{
	$stack_string = trim(file_get_contents("stack"));
	$stack_array = explode("\n", $stack_string);
	$index = 0;
	$count = count($stack_array);
	$new = "";
	while ($index < $count)
	{
		if ($index != 0)
		{
			$new .= $stack_array[$index]."\n";
		}
		$index++;
	}
	file_put_contents("stack", $new);
}

function	check_if_beginning()
{
	$stack = trim(file_get_contents("stack"));
	$records = trim(file_get_contents("records"));
	if ($stack == "" && $records == "")
		file_put_contents("stack", ".........");
}

function	main()
{
	file_put_contents("status", "1");
	check_if_beginning();
	system("clear");
	$stack_string = get_stack_string();
	$stack_array = explode("\n", $stack_string);
	$focus = $stack_array[0];
	process_focus($focus);
	rewrite_stack($focus);
	file_put_contents("status", "0");
}

main();


?>
