<?php
/**
 * RESTfulInterface.php is the interface
 * to describe rest methods
 *
 * PHP version 5
 *
 * @category PHP
 * @package  /fuku-class/fu-core/
 * @author   Fukuball Lin <fukuball@gmail.com>
 * @license  Licence
 * @version  Release: <1.0>
 * @link     http://www.fukuball.com
 */

/**
 * RESTfulInterface is the interface
 * to describe rest methods
 *
 * An example of a RESTfulInterface is:
 *
 * <code>
 *  # This will done by rest request
 * </code>
 *
 * @category PHP
 * @package  /fuku-class/fu-core/
 * @author   Fukuball Lin <fukuball@gmail.com>
 * @license  Licence
 * @version  Release: <1.0>
 * @link     http://www.fukuball.com
 */
interface RESTfulInterface
{

    /**
     * Dispatch get actions
     *
     * @param array $segments Method segments indicate action and resource
     *
     * @return void
     */
    public function restGet($segments);

    /**
     * Dispatch put actions
     *
     * @param array $segments Method segments indicate action and resource
     *
     * @return void
     */
    public function restPut($segments);

    /**
     * Dispatch post actions
     *
     * @param array $segments Method segments indicate action and resource
     *
     * @return void
     */
    public function restPost($segments);

    /**
     * Dispatch delete actions
     *
     * @param array $segments Method segments indicate action and resource
     *
     * @return void
     */
    public function restDelete($segments);

}// end interface RESTfulInterface
?>