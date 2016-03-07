<?php
/**
 * @description:
 *
 * @author: Monk
 * @create: 5.1.2009
 * @update: $Id: function.html_select.php 49 2014-01-07 21:14:32Z Monk $
*/

/**
 * Smarty {html_select} function plugin
 *
 * Type:     function<br>
 * Name:     html_select<br>
 */
function smarty_function_html_select($params, &$smarty)
{
	require_once $smarty->_get_plugin_filepath('function', 'html_options');
	// выбранный элемент по значению
	$selected_index = 0;
	// выбранный элемент по описанию
	$selected_value = 0;
	// дополнительные свойства
	$extra = "";
	// текст если нету данных
	$default_null_text = "Ничего нет";
	// если не пусто то будет пустое значение с этим тесктом
	$empty_text = null;
	// имя select'a
	$name = "select";
	
	$html_result = '';
	
	foreach ($params as $_key=> $_value) 
	{
		$$_key = $_value;
	}
	
	if (!$data)
	{
		$data = array(0 => $default_null_text);
		$keys = array(0 => 0);
	}
	else
	{
		$keys = array_keys($data);
		if ($empty_text)
		{
			array_unshift($data, $empty_text);
			array_unshift($keys, 0);
		}
	}
	
	if ($selected_index === 0 && $selected_value !== 0)
	{
		$selected_index = array_search($selected_value, $data);
	}

	$html_result .= '<select name="'.$name.'" '.$extra.'>'."\n";
	$html_result .= smarty_function_html_options(array('output'       => $data,
	                                                  'values'        => $keys,
	                                                  'selected'      => $selected_index,
	                                                  ),
	                                            $smarty);
	$html_result .= "</select>\n";


		
   return $html_result;
}

?>