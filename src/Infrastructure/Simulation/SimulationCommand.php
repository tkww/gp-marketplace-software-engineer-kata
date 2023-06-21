<?php

declare(strict_types=1);

namespace App\Infrastructure\Simulation;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

class SimulationCommand extends Command
{
    protected function configure()
    {
        $this
            ->setName('app:test')
            ->setDescription('Test command');
    }

    public function __construct()
    {
        parent::__construct();
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $symfonyStyle = new SymfonyStyle($input, $output);

        try {
            $symfonyStyle->info('START SIMULATION COMMAND');
        } catch (\Throwable $exception) {
            $symfonyStyle->error(sprintf('ERROR SIMULATION COMMAND: %s', $exception->getMessage()));

            return Command::FAILURE;
        }

        $symfonyStyle->success('SUCCESS SIMULATION COMMAND');

        return Command::SUCCESS;
    }
}