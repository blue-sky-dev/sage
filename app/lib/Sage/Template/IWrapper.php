<?php namespace Roots\Sage\Template;

/**
 * Interface IWrapper
 * @package Roots\Sage
 * @author QWp6t
 */
interface IWrapper {

  /**
   * Get a list of potential wrappers
   * Useful for passing to WordPress's locate_template()
   *
   * @return string[] List of wrappers; e.g., `base-page.php`, `base.php`
   */
  public function getWrappers();

  /**
   * @return string Template file that is being wrapped; e.g., `page.php`, `single.php`, `singular.php`
   */
  public function getTemplate();

  /**
   * @return string Slug of the Wrapper; e.g., `base`
   */
  public function getSlug();
}
