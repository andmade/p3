<?php

namespace P3\Classes;
use joshtronic\LoremIpsum;

class GladosIpsum extends LoremIpsum

{
	public $firstWords = true;
	public $words = array(
			//Initial Lines
			"Oh, it's you.", "It's been a long time.", 

			//Other fragments
			"hello and welcome",			"stand back", 				"you're doing quite well",
			"once again",			"good luck", 				"it's been a long time",
			"you murdered me",		"you're going to regret it",	"congratulations",	
			"i have a surprise",	"i hate you so much",		"you're a tumor",
			"just a regular moron",	"you're good at murdering",	"take the lemons",
			"burn his house down",	"this place is self-destructing",	"everybody likes revenge",	
			"press the button",		"goodbye, caroline",	"killing you is hard", 
			"dangerous, mute lunatic",	"blah", "there will be cake",	"feel free to pass out",
			"faithful companions",	"euthanize it",				"storage cube destroyed",
			"android hell is a real place", "at the first sign of defiance",	"the possibility of death",	
			"incoherent",	"insecure",	"fears intimacy", 
			"poor thing",	"nothing bad happened",	"I don't care about",
			"you are a horrible person",	"the best for one of us", "you monster",
			"the perfect time to have her tested", "you monster", "you will be missed", "quit now",
			"this is not good", "you're on your own", "nice job breaking it, hero"
		);

	private function reshuffle()
    {
        if ($this->firstWords) {
            $this->firstWords = array_slice($this->words, 0, 2);
            $this->words = array_slice($this->words, 2);

            shuffle($this->words);

            $this->words = $this->firstWords + $this->words;

            $this->firstWords = false;
        } else {
            shuffle($this->words);
        }
    }

    private function createOutput($strings, $tags, $array, $delimiter = ' ')
    {
        if ($tags) {
            if (!is_array($tags)) {
                $tags = array($tags);
            } else {
                // Flips the array so we can work from the inside out
                $tags = array_reverse($tags);
            }

            foreach ($strings as $key => $string) {
                foreach ($tags as $tag) {
                    // Detects / applies back reference
                    if ($tag[0] == '<') {
                        $string = str_replace('$1', $string, $tag);
                    } else {
                        $string = sprintf('<%1$s>%2$s</%1$s>', $tag, $string);
                    }

                    $strings[$key] = $string;
                }
            }
        }

        if (!$array) {
            $strings = implode($delimiter, $strings);
        }

        return $strings;
    }
}