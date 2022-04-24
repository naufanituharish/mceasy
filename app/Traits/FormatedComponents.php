<?php

namespace App\Traits;

use Illuminate\Contracts\Routing\UrlGenerator;
use Illuminate\Support\HtmlString;

/**
 * Trait FormatedComponents.
 */
trait FormatedComponents
{
    /**
     * Convert an HTML string to entities.
     * @param string $value
     * 
     * @return string
     */
    public function entities($value): string
    {
        return htmlentities($value, ENT_QUOTES, 'UTF-8', false);
    }

    /**
     * Generate a HTML image params.
     * @param $url
     * @param  null  $alt
     * @param  array  $attributes
     * @param  null  $secure
     * 
     * @return array
     */
    public function image($url, $alt = null, $attributes = [], $secure = null): array
    {
        $attributes['alt'] = $alt ? $alt : 'image-table';
        $attributes['src'] = resolve(UrlGenerator::class)->asset($url, $secure);
        return [
            'componentType'        => 'image',
            'componentAttributes'  => $attributes
        ];
    }

    /**
     * Generate a HTML link params.
     * @param $url
     * @param  null  $text
     * @param  array  $attributes
     * @param  null  $secure
     * @param  bool  $escape
     * 
     * @return array
     */
    public function link($url, $text = null, $attributes = [], $secure = null, $escape = true): array
    {
        $url = resolve(UrlGenerator::class)->to($url, [], $secure);

        if (is_null($text) || $text === false) {
            $text = $url;
        }

        if ($escape) {
            $text = $this->entities($text);
        }

        $attributes['href'] = $this->entities($url);

        return [
            'componentType'         => 'link',
            'componentAttributes'   => $attributes,
            'componentText'         => $text
        ];
    }

    /**
     * Generate a HTML link params to a named route.
     * @param string $name
     * @param string $text
     * @param array  $parameters
     * @param array  $attributes
     * @param bool   $secure
     * @param bool   $escape
     *
     * @return array
     */
    public function linkToRoute($name, $text = null, $parameters = [], $attributes = [], $secure = null, $escape = true): array
    {
        return $this->link(
            resolve(UrlGenerator::class)->route($name, $parameters), 
            $text, 
            $attributes, 
            $secure, 
            $escape
        );
    }

    /**
     * Generate a HTML link params to a controller action.
     * @param string $action
     * @param string $text
     * @param array  $parameters
     * @param array  $attributes
     * @param bool   $secure
     * @param bool   $escape
     * 
     * @return array
     */
    public function linkToAction($action, $text = null, $parameters = [], $attributes = [], $secure = null, $escape = true): array
    {
        return $this->link(
            resolve(UrlGenerator::class)->action($action, $parameters), 
            $text, 
            $attributes, 
            $secure, 
            $escape
        );
    }

    /**
     * Generate a HTML link params to an email address.
     * @param string $email
     * @param string $text
     * @param array  $attributes
     * @param bool   $escape
     * @param string   $class
     * @return array
     */
    public function mailto($email, $text = null, $attributes = [], $escape = true): HtmlString
    {
        $email = $this->email($email);
        $text = $text ?: $email;
        if ($escape) {
            $text = $this->entities($text);
        }
        $attributes['href'] = $this->obfuscate('mailto:').$email;
        return [
            'componentType'         => 'email',
            'componentAttribute'    => $attributes,
            'componentText'         => $text
        ];
    }

    /**
     * Obfuscate an e-mail address to prevent spam-bots from sniffing it.
     * @param string $email
     *
     * @return string
     */
    public function email($email): string
    {
        return str_replace('@', '&#64;', $this->obfuscate($email));
    }

    /**
     * Obfuscate a string to prevent spam-bots from sniffing it.
     * @param string $value
     * @return string
     */
    public function obfuscate($value): string
    {
        $safe = '';

        foreach (str_split($value) as $letter) {
            if (ord($letter) > 128) {
                return $letter;
            }

            // To properly obfuscate the value, we will randomly convert each letter to
            // its entity or hexadecimal representation, keeping a bot from sniffing
            // the randomly obfuscated letters out of the string on the responses.
            switch (rand(1, 3)) {
                case 1:
                    $safe .= '&#'.ord($letter).';';
                    break;

                case 2:
                    $safe .= '&#x'.dechex(ord($letter)).';';
                    break;

                case 3:
                    $safe .= $letter;
            }
        }

        return $safe;
    }

    /**
     * Generate a Component.
     * @param string $componentName
     * @param array  $attributes
     * @param string $type
     * @param string $key
     * 
     * @return array
     */
    public function componentElement($componentName, $attributes = [], $type = 'blade', $key = null): array
    {
        return [
            'componentType'         => $type,
            'componentName'         => $componentName,
            'componentAttributes'   => $attributes,  
            'componentKey'          => $key,  
        ];
    }

    /**
     * Generate a Component.
     * @param string  $text
     * @param array  $menuAttributes
     * 
     * @return array
     */
    public function componentMenu($text = 'Menu', $menuAttributes = []): array
    {
        return [
            'componentType'    => 'menu',
            'menuText'         => $text,
            'menuAttributes'   => $menuAttributes,
        ];
    }

    /**
     * Generate a Component.
     * @param array  $attributes
     * 
     * @return array
     */
    public function componentArray($componentArray = [], $componentWrapper = []): array
    {
        return [
            'componentType'    => 'array',
            'componentArray'    => $componentArray,
            'componentWrapper'    => $componentWrapper,
        ];
    }

    /**
     * HTML Component.
     * @param $html
     * @return array
     */
    public function html($html): array
    {
        return [
            'componentType'     => 'html',
            'componentResult'   =>  new HtmlString($html)
        ];
    }

    /**
     * Transform the string to an Html serializable object.
     * @param $html
     * @return HtmlString
     */
    public function htmlString($html): HtmlString
    {
        return new HtmlString($html);
    }
}