<?php

namespace App\Command;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Question\ConfirmationQuestion;
use Symfony\Component\Console\Question\Question;
use Symfony\Component\Console\Style\SymfonyStyle;

#[AsCommand(
    name: 'doctrine:import:csv',
    description: 'Add a short description for your command',
)]
class DoctrineImportCsvCommand extends Command
{
    public function __construct(protected EntityManagerInterface $em)
    {
        parent::__construct();
    }

    protected function configure(): void
    {
        $this
            ->addArgument('csvPath', InputArgument::REQUIRED, 'Path to csv file')
            ->addArgument('entity', InputArgument::OPTIONAL, 'FQN of entity to persist')
            ->addOption('truncate', false, InputOption::VALUE_NONE, 'Will truncate table')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);
        $csvPath = $input->getArgument('csvPath');
        $entity = $input->getArgument('entity');

        if (!$entity) {
            $helper = $this->getHelper('question');
            $question = new Question('Which entity do you want to insert ? ');
            $entity = $helper->ask($input, $output, $question);
        }

        $io->note(sprintf('Will parse this CSV file: %s', $csvPath));
        $io->note(sprintf('Will fill table corresponding to this entity: %s', $entity));

        if ($input->getOption('truncate')) {
            $io->note(sprintf('TODO truncate table corresponding to this entity: %s', $entity));
        }

        $io->success('Table filled');

        return Command::SUCCESS;
    }
}
