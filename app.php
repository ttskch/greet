#!/usr/bin/env php
<?php
require __DIR__.'/vendor/autoload.php';

use Symfony\Component\Console\Application;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

$console = new Application();
$console
    ->register('hello')
    ->addArgument('lang', InputArgument::OPTIONAL, 'output language ("en" or "ja")', 'ja')
    ->addOption('times', 't', InputOption::VALUE_REQUIRED, 'how many times output', 1)
    ->setCode(function (InputInterface $input, OutputInterface $output) {
        $lang = strtolower($input->getArgument('lang'));
        for ($i = 0; $i < intval($input->getOption('times')); $i++) {
            $output->writeln($lang === 'en' ? 'Hello!' : 'こんにちは！');
        }
    });
$console
    ->setDefaultCommand('hello', true)
    ->run();
