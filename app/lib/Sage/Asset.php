<?php namespace Roots\Sage;

use Roots\Sage\Assets\IManifest;

/**
 * Class Template
 * @package Roots\Sage
 * @author QWp6t
 */
class Asset {

  public static $dist = '/dist';

  /** @var IManifest Currently used manifest */
  protected $manifest;

  protected $asset;

  protected $dir;

  public function __construct($file, IManifest $manifest = null) {
    $this->manifest = $manifest;
    $this->asset = basename($file);
    $this->dir = dirname($file) != '.' ? dirname($file) : '';
  }

  public function __toString() {
    return $this->getUri();
  }

  public function getUri() {
    $file = self::$dist . '/' . $this->dir . '/' . ($this->manifest ? $this->manifest->get($this->asset) : $this->asset);
    return get_template_directory_uri() . $file;
  }
}
