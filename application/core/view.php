<?php

class View
{

	function generate($content_view = null, $template_view, $data = null)
	{

		include 'application/views/'.$template_view;
	}
}
