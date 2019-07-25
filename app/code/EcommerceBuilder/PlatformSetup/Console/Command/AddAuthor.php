<?php
/**
 * Created by PhpStorm.
 * User: prabhat
 * Date: 25/7/19
 * Time: 5:53 PM
 */

namespace EcommerceBuilder\PlatformSetup\Console\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use EcommerceBuilder\PlatformSetup\Model\AuthorFactory;
use Magento\Framework\Console\Cli;


class AddAuthor extends Command
{
    const INPUT_KEY_NAME = 'author_name';
    const INPUT_KEY_EMAIL = 'email';
    const INPUT_KEY_AFFILIATION = 'affliation';
    const INPUT_KEY_AGE = 'age';

    private $authorFactory;

    public function __construct(AuthorFactory $authorFactory)
    {
        $this->authorFactory = $authorFactory;
        parent::__construct();
    }

    /**
     * Function to set the name and description for the add author command
     */
    protected function configure()
    {
        $this->setName('author:item:add')
            ->addArgument(
                self::INPUT_KEY_NAME,
                InputArgument::REQUIRED,
                'Author name'
            )->addArgument(
                self::INPUT_KEY_EMAIL,
                InputArgument::REQUIRED,
                'Author email'
            )->addArgument(
                self::INPUT_KEY_AFFILIATION,
                InputArgument::REQUIRED,
                'Author Affiliation'
            )->addArgument(
                self::INPUT_KEY_AGE,
                InputArgument::OPTIONAL,
                'Author Age'
            );
        parent::configure();
    }

    /**
     * @param InputInterface $input
     * @param OutputInterface $output
     * @return int|null
     * @throws \Exception
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $item = $this->authorFactory->create();
        $item->setAuthorName($input->getArgument(self::INPUT_KEY_NAME));
        $item->setEmail($input->getArgument(self::INPUT_KEY_EMAIL));
        $item->setAffliation($input->getArgument(self::INPUT_KEY_AFFILIATION));
        $item->setIsObjectNew(true);
        $item->save();
        return Cli::RETURN_SUCCESS;
    }
}