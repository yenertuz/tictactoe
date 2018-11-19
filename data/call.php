<?php

system("php run_stack.php");

while (trim(file_get_contents("stack")) != "")
{
    system("php run_stack.php");
    while (trim(file_get_contents("status")) == "1")
    {
        ;
    }
}

?>
