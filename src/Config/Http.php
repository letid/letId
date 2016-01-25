<?php
namespace Lethil\Config;
class Http
{
	const SLA = '/';
	const SLB = '\\';
	protected static $host,$uri,$error,$warning, $message=array(),
		$Header,$Content,$ContentType;
	// protected $tostring;
	public function __construct()
	{
		session_start();
		$uri 						= parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
		self::$uri 					= explode(self::SLA, $uri);
		self::$host					= $_SERVER['HTTP_HOST'];
	}
	public function Request()
    {
		// session_unset($_SESSION[self::$host]);
		if ($Name=self::getApplicationName()) {
			$this->application = $Name;
		} else if($this->application && $Name=self::isApplication()) {
			$this->application = self::setApplicationName($Name);
		} else if($this->default) {
			$this->application = self::setApplicationName($this->default);
		} else {
			$this->application = array();
		}
		if($this->application) {
			if(is_dir(static::Root())) {
				if(self::getRoot(static::Root().$this->application.self::SLA)){
					self::setLoader();
					if(class_exists(\App\Initiate::class)){
						$Initiate = new \App\Initiate();
						self::$Content = $Initiate::Application();
					} else {
						self::Response('invalid.configuration.html','Invalid directory configuration!');
					}
				} else {
					self::Response('invalid.configuration.html','Invalid directory configuration!');
				}
			} else {
				self::Response('invalid.configuration.html','Invalid directory configuration!');
			}
		} else {
			self::Response('invalid.configuration.html','Invalid directory configuration!');
		}
    }
	private function Response($file,$msg)
    {
		if(self::getRoot(static::Error())) {
			ob_start();
			include $this->directory['root'].$file;
			self::$Content = ob_get_clean();
		} else {
			self::$Content = $msg;
		}
	}
	private function setLoader()
    {
		$loader = new \Composer\Autoload\ClassLoader();
		// $loader->add($this->Name(),self::$setting['dir'],true);
		$loader->addPsr4($this->getName().self::SLB,array($this->directory['root']),true);
		// activate the autoloader
		$loader->register(true);
		// to enable searching the include path (eg. for PEAR packages)
		// $loader->setUseIncludePath(true);
		// print_r($loader);
	}
	private function isApplication()
    {
		foreach ($this->application as $Name => $Regex) {
			if($Regex && self::isRegex(is_array($Regex)?$Regex:array($Regex))) {
				return $Name;
			}
		}
	}
	private function isRegex($Regex)
    {
		foreach ($Regex as $Name) {
			if(preg_match("/$Name/", self::$host)){
				return true;
			}
		}
	}
	private function setApplicationName($Name)
    {
		return $_SESSION[self::$host]=$Name;
	}
	private function getApplicationName()
    {
		if (isset($_SESSION[self::$host])) {
			return $_SESSION[self::$host];
		}
	}
	private function getRoot($d)
    {
		if(file_exists($d)) {
			if(is_array($this->directory)){
				foreach ($this->directory as $name => $v) {
					$this->directory[$name] = $d.$this->directory[$name].self::SLA;
				}
			}
			return $this->directory['root'] = $d;
		}
		// return is_dir($q);
		// return file_exists($file);
	}
	private function getName()
    {
		return $this->Name();
	}
	public function meset($q)
    {
		if(is_array($q)) {
			foreach($q as $msg) {
				array_push(self::$message,$msg);
			}
		} else {
			array_push(self::$message,$q);
		}
    }
	public function meget($q=' ')
    {
		return implode($q,self::$message);
    }
	public function __set($name, $value)
	{
		$this->{$name} = $value;
	}
	public function __get($name)
	{
		if(property_exists($this, $name)) return $this->{$name};
	}
    public function __call($name, $arguments)
	{
		if(method_exists($this, $name) == false) return $this;
    }
	public function __toString()
	{
		return isset($this->tostring)?$this->tostring:null;
	}
}
