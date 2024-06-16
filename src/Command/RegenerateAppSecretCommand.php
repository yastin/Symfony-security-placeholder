<?php

namespace App\Command;

use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

#[AsCommand(
    name: 'regenerate-app-secret',
    description: 'Add a short description for your command',
)]
class RegenerateAppSecretCommand extends Command
{
    protected static $defaultName = 'regenerate-app-secret';

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);

        $a = '0123456789abcdef';
        $secret = '';
        for ($i = 0; $i < 32; $i++) {
            $secret .= $a[rand(0, 15)];
        }

        $escapedSecret = escapeshellarg($secret);
        $command = "sed -i '' -e 's/^APP_SECRET=.*/APP_SECRET=$escapedSecret/' .env";
        shell_exec($command);

        $io->success('New APP_SECRET was generated: ' . $secret);

        return 0;
    }
}
