<?php
/**
 * EChosen class file.
 * 
 * @author Andrius Marcinkevicius <andrew.web@ifdattic.com>
 * @copyright Copyright &copy; 2011 Andrius Marcinkevicius
 * @license Licensed under MIT license. http://ifdattic.com/MIT-license.txt
 * @version 1.0
 */

/**
 * EChosen makes select boxes much more user-friendly.
 * 
 * @author Andrius Marcinkevicius <andrew.web@ifdattic.com>
 */
class EChosen extends CWidget
{
  /**
   * @var string apply chosen plugin to these elements.
   */
  public $target = '.chzn-select';
  
  /**
   * @var boolean should jQuery plugin should be used.
   */
  public $useJQuery = true;
  
  /**
   * @var boolean include un-minified plugin then debuging.
   */
  public $debug = false;
  
  /**
   * Apply chosen plugin to select boxes.
   */
  public function run()
  {
    // Publish extension assets
    $assets = Yii::app()->getAssetManager()->publish( Yii::getPathOfAlias(
      'ext.EChosen' ) . '/assets' );
    $cs = Yii::app()->getClientScript();
    $cs->registerCssFile( $assets . '/chosen.css' );
    
    // Get extension for JavaScript file
    $ext = '.min.js';
    if( $this->debug )
      $ext = '.js';
    
    if( $this->useJQuery )
    {
      $cs->registerScriptFile( $assets . '/chosen.jquery' . $ext );
      $cs->registerScript( 'chosen',
        "$( '{$this->target}' ).chosen();" );
    }
    else
    {
      $cs->registerScriptFile( $assets . '/chosen.proto' . $ext );
    }
  }
}
?>