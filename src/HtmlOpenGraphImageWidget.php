<?php
namespace Mouf\Html\Widgets\Opengraph;
use Mouf\Html\HtmlElement\HtmlElementInterface;
/**
 * 
 * @author benoit
 * TODO: add getter
 */
class HtmlOpenGraphImageWidget implements HtmlElementInterface{
	/**
	 * 
	 * @var string
	 */
	private $url = null;
	/**
	 * 
	 * @var string
	 */
	private $secure_url = null;
	/**
	 * 
	 * @var string
	 */
	private $type = null;
	/**
	 * 
	 * @var int
	 */
	private $width = null;
	/**
	 * 
	 * @var int
	 */
	private $height = null;
	/**
	 * 
	 * @var bool
	 */
	private $hasChange = true;
	/**
	 * 
	 * @var string
	 */
	private $html = "";
	/**
	 * 
	 * @param string $url
	 * @param string $secure_url
	 * @param string $type
	 * @param int $width
	 * @param int $height
	 */
	function __construct(string $url, string $secure_url = null, string $type = null, int $width = null, int $height = null) {
		$this->url = $url;
		$this->secure_url = $secure_url;
		$this->type = $type;
		$this->width = $width;
		$this->height = $height;
		$this->hasChange = true;
		$this->html = "";
	}
	/**
	 * 
	 * @param string $url
	 */
	public function setUrl($url) {
		$this->url = $url;
		$this->hasChange = true;
	}
	/**
	 * 
	 * @param string $url
	 */
	public function setSecureUrl($url) {
		$this->secure_url = $url;
		$this->hasChange = true;
	}
	/**
	 * 
	 * @param string $type
	 */
	public function setType($type) {
		$this->type = $type;
		$this->hasChange = true;
	}
	/**
	 * 
	 * @param int $width
	 */
	public function setWidth($width) {
		$this->width = $width;
		$this->hasChange = true;
	}
	/**
	 * 
	 * @param int $height
	 */
	public function setHeight($height) {
		$this->height = $height;
		$this->hasChange = true;
	}
	
	private function constructHtml() {
		$this->hasChange = false;
		$html = "";
		if ($this->url === null)
			return $html;
		$html .= '<meta property="og:image" content="'.$this->url.'" />';
		$html .= ($this->secure_url === null ? '' : '<meta property="og:image:secure_url" content="'.$this->secure_url.'" />');
		$html .= ($this->type === null ? '' : '<meta property="og:image:type" content="'.$this->type.'" />');
		$html .= ($this->width === null ? '' : '<meta property="og:image:width" content="'.$this->width.'" />');
		$html .= ($this->height === null ? '' : '<meta property="og:image:height" content="'.$this->height.'" />');
		return $html;
	}
	
	public function toHtml() {
		if ($this->hasChange == true)
			$this->html = $this->constructHtml();
		return $this->html;
	}
}