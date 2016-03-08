<?php
/**
 * @description:
 *
 * @author: Monk
 * @create: 8.12.2009
 * @update: $Id: dsSmarty.php 49 2014-01-07 21:14:32Z Monk $
*/

require('Smarty.class.php');

class dsSmarty extends Smarty
{
	public function __construct()
	{
		global $cfg;
		
		parent::Smarty();
		
		$this->template_dir = 'template/'.$cfg['style'].'/templates/';
		$this->compile_dir = 'template/'.$cfg['style'].'/templates_c/';
		$this->config_dir = 'template/'.$cfg['style'].'/configs/';
		$this->cache_dir = 'template/'.$cfg['style'].'/cache/';
		
		$this->register_block('dynamic', 'smarty_block_dynamic', false);
		
		$this->setDebug($cfg['debug']);
		
		// использование поддиректорий для хранения файлов смарти
		//$this->use_sub_dirs = true;
	}
	/**
	 * dsSmarty::setCacheTime() - задание времени кеширования
	 * 
	 * @param integer $time - время кеширования в секундах
	 * @return void
	 */
	public function setCacheTime($time = 600)
	{
		$time = abs(intval($time));
		if ($time == 0)
		{
			$this->setCache(false);
			$this->cache_lifetime = 0;
			return;
		}

		$this->caching = 2;
		$this->cache_lifetime = $time;
	}
	
	/**
	 * dsSmarty::setCache() - включение/выключения кеширования
	 * 
	 * @param bool $is_cache
	 * @return void
	 */
	public function setCache($is_cache)
	{
		$is_cache = abs(intval($is_cache));
		if ($is_cache > 2) $is_cache = 2;
		$this->caching = $is_cache;
	}


	/**
	 * dsSmarty::getCache() - включено ли кеширование в шаблоне
	 * @return int
	 */
	public function getCache()
	{
		return $this->caching;
	}
	
	public function setDebug($debug = false)
	{
		if (!$debug)
		{
			// при смене tpl нужно вручную удалять скомпилированную копию
			$this->compile_check = false;
		}
	}
}

function smarty_block_dynamic($param, $content, &$smarty) { return $content; }
