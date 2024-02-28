<?php

//function to display error under each filed

function display_error($validation, $field){

	if(isset($validation) && $validation->hasError($field)){
		return $validation->getError($field);
	}
	else
	{
		return false;
	}
}

