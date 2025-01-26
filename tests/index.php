<?php
require __DIR__ . '/../vendor/autoload.php';

use Symfony\Component\Process\Process;
use Symfony\Component\Process\Exception\ProcessFailedException;

$process = new Process([__DIR__ . '/../vendor/bin/phpunit', '--filter', 'RoutesTest', '--log-junit', 'test-results.xml', '-c','phpunit.xml'], __DIR__, ['BASE_URL' => 'http://localhost', 'DB_CONNECTION' => 'sqlite', 'DB_DATABASE' => ':memory:']);
$process->run();
if (!$process->isSuccessful()) {
    throw new ProcessFailedException($process);
}

$xml = simplexml_load_file('test-results.xml');
$html = '<html><head><title>Test Results</title></head><body>';
$html .= '<h1>Test Results</h1>';
$html .= '<ul>';

foreach ($xml->testsuite->testcase as $testcase) {
    $status = isset($testcase->failure) ? '❌' : '✅';
    $color = isset($testcase->failure) ? 'red' : 'green';
    $html .= "<li style='color: $color;'>{$status} {$testcase['name']}</li>";
}

$html .= '</ul></body></html>';

file_put_contents('test-results.html', $html);

echo "Test results have been written to test-results.html\n";