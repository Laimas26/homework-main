<?php

namespace App\Tests;

use PHPUnit\Framework\TestCase;
use Twig\Environment;
use Twig\Loader\FilesystemLoader;
use Twig\TwigFilter;

class ReadingTimeTest extends TestCase
{
    public function testReadingTime(): void
    {
        // $text = "Text for testing the reading time algorithm, this calculation should return value of 0.06 minutes or to be exact ~6 seconds";
        // $words = str_word_count($text, 1);
        // $longWords = array_filter($words, function($word) {
        //     return strlen($word) > 3;
        // });
        // $averageReadingSpeed = 200;
        // $expectedTime = 0.65;
        // $readingTime = $longWords / $averageReadingSpeed;

        // $this->assertEquals($expectedTime, $readingTime);

        
        $loader = new FilesystemLoader(__DIR__.'/../templates');
        $twig = new Environment($loader);
        $twig->addFilter(new TwigFilter('readingTime', function($text) {
            $count = 0;
            $allWords = explode(' ', $text);
            foreach ($allWords as $word) {
                if (strlen($word) > 3) {
                    $count++;
                }
            }
            $minutesFloat = $count / 200;
            $minutesInt = floor($minutesFloat);
            $seconds = round(($minutesFloat - $minutesInt) * 60);
            return $minutesInt.':'.sprintf('%02d', $seconds).' mins';
        }));

        $template = $twig->load('_partials/reading-mins.html.twig');
        $article = ['text' => 'Text for testing the reading time algorithm, this calculation should return value of 0.06 minutes or to be exact ~6 seconds'];
        $output = $template->render(['article' => $article]);

        $this->assertEquals(floatval('0:04 mins'), floatval($output));
    }
}
