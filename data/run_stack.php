<?php

function	main()
{
	if (file_exists("stack.tsv") == 0)
	{
		exit(-1);
	}
	$stack_string = trim(file_get_contents("stack.tsv"));
	if (strlen($stack_string) == 0)
	{
		exit(0);
	}
	$stack_array = explode("\n", $stack_string);
	$focus = $stack_array[0];
	$results = get_results($focus);
	rewrite_stack($stack_array, $focus, $results);
}




?>