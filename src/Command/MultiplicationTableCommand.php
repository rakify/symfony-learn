<?php

namespace App\Command;

use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Question\Question;
use Symfony\Component\Console\Helper\Table;

#[AsCommand(
    name: 'app:multiplication-table',
    description: 'Generates a multiplication table for a given number.',
)]
class MultiplicationTableCommand extends Command
{
    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $helper = $this->getHelper('question');
        $question = new Question('Enter a number to generate its multiplication table: ');

        // Ask user for input
        $number = $helper->ask($input, $output, $question);

        // Validate input
        if (!is_numeric($number) || $number <= 0) {
            $output->writeln('<error>Please enter a positive number.</error>');
            return Command::FAILURE;
        }

        // Create a table
        $table = new Table($output);
        $table->setHeaders(['Multiplier', 'Result']);

        // Generate the multiplication table
        for ($i = 1; $i <= 10; $i++) {
            $table->addRow([$number . ' x ' . $i, $number * $i]);
        }

        $output->writeln("\nMultiplication Table for <info>$number</info>:\n");
        $table->render();

        return Command::SUCCESS;
    }
}
