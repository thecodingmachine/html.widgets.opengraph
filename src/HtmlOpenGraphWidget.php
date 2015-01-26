<?php
namespace Mouf\Html\Widgets\Opengraph;
use Mouf\Html\HtmlElement\HtmlElementInterface;
/**
 * 
 * @author benoit
 * TODO add support of type: @see http://ogp.me/ and @see http://www.yakaferci.com/open-graph/
 * TODO: add getter
 */
class HtmlOpenGraphWidget implements HtmlElementInterface{
	/**
	 * 
	 * @var string 
	 */
	private $title;
	/**
	 * 
	 * @var string 
	 */
	private $type;
	/**
	 * 
	 * @var string
	 */
	private $url;
	
	/**
	 * 
	 * @var HtmlOpenGraphImageWidget
	 */
	private $imageObject;
	
	/**Optionnal metadata**/
	/**
	 * 
	 * @var string
	 */
	private $audio;
	/**
	 * Short description
	 * @var string
	 */
	private $description;
	/**
	 *  An enum of (a, an, the, "", auto)
	 * @var string
	 */
	private $determiner;
	/**
	 *  format language_TERRITORY
	 * @var string
	 */
	private $locale;
	/**
	 * 
	 * @var string[]
	 */
	private $locale_alternate;
	/**
	 * 
	 * @var string
	 */
	private $site_name;
	/**
	 * 
	 * @var string
	 */
	private $video;
	/**
	 * TODO: add support of video
	 * TODO: add support of music
	 */
	/**
	 * 
	 * @param string $title
	 * @param string $type
	 * @param string $url
	 * @param HtmlOpenGraphImageWidget $imageObject
	 * @param string $audio
	 * @param string $description
	 * @param string $determiner
	 * @param string $local
	 * @param string $local_alternate
	 * @param string $site_name
	 * @param string $video
	 */
	function __construct($title, $type, $url, HtmlOpenGraphImageWidget $imageObject, $audio = null, $description = null, $determiner = null, $local = null, $local_alternate = null, $site_name = null, $video = null) {
		$this->title = $title;
		$this->type = $type;
		$this->url = $url;
		$this->imageObject = $imageObject;
		
		$this->audio = $audio;
		$this->description = $description;
		$this->determiner = $determiner;
		$this->locale = $local;
		$this->locale_alternate = $local_alternate;
		$this->site_name = $site_name;
		$this->video = $video;
	}
	
	public function setTitle($title) {
		$this->title = $title;
	}
	public function setType($type) {
		$this->type = $type;
	}
	public function setUrl($url) {
		$this->url = $url;
	}
	/**
	 * 
	 * @param HtmlOpenGraphImageWidget $imageObject
	 */
	public function setImageObject($imageObject) {
		$this->imageObject = $imageObject;
	}
	
	private function getOptionnalMetaData() {
		$html = "";
		$html .= $this->audio === null ? "" : '<meta property="og:audio" content="'.$this->audio.'" />';
		$html .= $this->description === null ? "" : '<meta property="og:description" content="'.$this->description.'" />';
		$html .= $this->determiner === null ? "" : '<meta property="og:determiner" content="'.$this->determiner.'" />';
		$html .= $this->locale === null ? "" : '<meta property="og:locale" content="'.$this->locale.'" />';
		foreach ($this->locale_alternate as $loc_alt) {
			$html .= ($loc_alt === null || empty($loc_alt)) ? "" : '<meta property="og:locale_alternate" content="'.$loc_alt.'" />';
		}
		$html .= $this->site_name === null ? "" : '<meta property="og:site_name" content="'.$this->site_name.'" />';
		$html .= $this->video === null ? "" : '<meta property="og:video" content="'.$this->video.'" />';
		return $html;
	}
	
	public function toHtml() {
		$html = "";
		$html .= '<meta property="og:title" content="'.$this->title.'" />
				<meta property="og:type" content="'.$this->type.'" />
				<meta property="og:url" content="'.$this->url.'" />';
		$html .= $this->getOptionnalMetaData();
		$html .= $this->imageObject->toHtml();
		return $html;
	}
}