<?php
/**
* @description:
*
* @author: Monk
* @create: 18.06.13
* @update: $Id: modifier.human_timestamp.php 93 2014-04-27 15:21:14Z Monk $
*/

dsCore::inc ('core/lib_calendar.php');

function smarty_modifier_human_timestamp($timestamp, $separator = ' ')
{

	return humanTimestamp($timestamp, $separator);
}