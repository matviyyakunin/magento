<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace Magento\Mtf\Troubleshooting;

use Magento\Mtf\Console\CommandList;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * Perform all checks.
 */
class GlobalAnalyzer extends Command
{
    /**
     * List of commands.
     *
     * @var CommandList
     */
    private $commandList;

    /**
     * @param Command[] $commandList
     */
    public function __construct(
        $commandList
    ) {
        parent::__construct();
        $this->commandList = $commandList;
    }

    /**
     * Configure command.
     *
     * @return void
     */
    protected function configure()
    {
        parent::configure();
        $this->setName('troubleshooting:check-all')
            ->setDescription('Perform all available checks.');
    }

    /**
     * Execute command.
     *
     * @param InputInterface $input
     * @param OutputInterface $output
     * @return void
     * @SuppressWarnings(PHPMD.UnusedFormalParameter)
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        foreach ($this->commandList as $command) {
            $command->execute($input, $output);
            $output->writeln('');
        }
    }
}
