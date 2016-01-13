<?php

/**
 * Contao Open Source CMS
 *
 * Copyright (c) 2005-2015 Leo Feyer
 *
 * @package   snmLorem
 * @author    s-new-media
 * @license   GNU/LGPL
 * @copyright s-new-media 2016
 */



 // inserttags {{lorem::API}}
 // inserttags {{lorempixel::API}}
 
 $GLOBALS['TL_HOOKS']['replaceInsertTags'][] = array('LoremIpsulm', 'blindtext');

 class LoremIpsulm extends Frontend
 {
    public function blindtext($strTag)
    {
		// based on http://loripsum.net
		/*
		How do I use the API?

		Just do a GET request on loripsum.net/api, to get some placeholder text. You can add extra parameters to specify the output you're going to get. Say, you need 10 short paragraphs with headings, use loripsum.net/api/10/short/headers. All of the possible parameters are:

		(integer) - The number of paragraphs to generate.
		short, medium, long, verylong - The average length of a paragraph.
		decorate - Add bold, italic and marked text.
		link - Add links.
		ul - Add unordered lists.
		ol - Add numbered lists.
		dl - Add description lists.
		bq - Add blockquotes.
		code - Add code samples.
		headers - Add headers.
		allcaps - Use ALL CAPS.
		prude - Prude version.
		plaintext - Return plain text, no HTML.
		*/
        $arrSplit = explode('::', $strTag);
        if ($arrSplit[0] == 'lorem'){
            if (isset($arrSplit[1]))
            {
                return file_get_contents('http://loripsum.net/api/');
            } else {
                return 'value corrupt';
            }
		// based on http://lorempixel.com
		/*
		http://lorempixel.com/400/200							to get a random picture of 400 x 200 pixels
		http://lorempixel.com/g/400/200							to get a random gray picture of 400 x 200 pixels
		http://lorempixel.com/400/200/sports					to get a random picture of the sports category
		http://lorempixel.com/400/200/sports/1					to get picture no. 1/10 from the sports category
		http://lorempixel.com/400/200/sports/Dummy-Text...		with a custom text on the random Picture
		http://lorempixel.com/400/200/sports/1/Dummy-Text...	with a custom text on the selected Picture
		*/
        }elseif($arrSplit[0] == 'lorempixel'){
			if (isset($arrSplit[1]))
			{
				return '<img src="http://lorempixel.com/'.$arrSplit[1].'" />';
			}else {
				return 'value corrupt';
			}
		}
        return false;
      }
 }
