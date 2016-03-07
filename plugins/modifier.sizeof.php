<?php
/**
 * @description:
 *
 * @author: Monk
 * @create: 04.09.12
 * @update: $Id: modifier.sizeof.php 49 2014-01-07 21:14:32Z Monk $
 */


function smarty_modifier_sizeof($array)
{
	echo sizeof($array).' - ';
	debug($array);
	if (is_array($array))
		return sizeof($array);
	return strlen($array);
}
?>