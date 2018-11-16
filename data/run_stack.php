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

function	process_focus($focus)
{
	$move_count = substr_count($focus, ".");
	echo "{$move_count} POSSIBLE MOVES\n";
	
}

function	rewrite_stack($focus)
{
	;
}

function	main()
{
	$stack_string = get_stack_string();
	$stack_array = explode("\n", $stack_string);
	$focus = $stack_array[0];
	process_focus($focus);
	rewrite_stack($focus);
}

main();


?>