<?php
namespace App\Services;

class PlaceholderTransformer
{
    /**
     * Transforms placeholders in a string to XML tags.
     *
     * @param string $input The input string.
     * @return array An array with the transformed string and the placeholders.
     */
    public static function transformPlaceholdersToXmlTags($input) {
        $placeholders = [];

        $callback = function ($matches) use (&$placeholders) {
            $placeholders[] = $matches[0];
            return '$' . (count($placeholders) + 100);
            // return '$' . (count($placeholders) - 1);
            // return '<m id="' . (count($placeholders) - 1) . '" />';
        };
        // Adjusted regex to capture more complex placeholders
        // you have update this regex based on diff pages we have
        $pattern = '/{{\s*(.*?)\s*}}|%\s*(.*?)\s*%|{%\s*(.*?)\s*%}|@(.*)/';
        // $pattern = '/{{\s*(.*?)\s*}}|%\s*(.*?)\s*%|{%\s*(.*?)\s*%}|@(.*)|<script[^>]*>(.*?)<\/script>|<style[^>]*>(.*?)<\/style>/s';

        // pre-processing part: pre-process underscore based lang shorthands {{ __('Login') }} from blade. or just replace it with nothing?
        $input = preg_replace('/{{\s*__\(\s*["\']([^"\']+)["\']\s*\)\s*}}/', '$1', $input);

        $transformedString = preg_replace_callback($pattern, $callback, $input);
        // dd($placeholders);
        return [$transformedString, $placeholders];
    }

    /**
     * Transforms XML tags in a string back to the original placeholders.
     *
     * @param string $input The input string.
     * @param array $placeholders The original placeholders.
     * @return string The string with XML tags replaced by placeholders.
     */
    public static function transformXmlTagsToPlaceholders($input, array $placeholders) {
        // $callback = function ($matches) use ($placeholders) {
        //     return isset($placeholders[$matches[1]]) ? $placeholders[$matches[1]] : '';
        // };

        foreach($placeholders as $key => $_placeholder) {
            $key = $key + 101;
            $string = '$'.$key;

            $input = str_replace($string, $_placeholder, $input);
        }

        foreach($placeholders as $key => $_placeholder) {
            $key = $key + 101;
            $string = '%24'.$key;
            $input = str_replace($string, $_placeholder, $input);
        }

        return $input;

        // return preg_replace_callback('/<m id="(\d+)" \/>/', $callback, $input);
    }


}
