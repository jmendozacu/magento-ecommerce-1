<?php
/**
 * Created by PhpStorm.
 * User: prabhat
 * Date: 18/7/19
 * Time: 10:37 AM
 */

namespace SimplifiedMagento\SFDCProductSync\Command;


use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use SimplifiedMagento\SFDCProductSync\Helper\SFDCConfigHelper;
use SimplifiedMagento\SFDCProductSync\Model\SFDCProductDataSync;

class SFDCProductSyncCommand extends Command
{
    private $state;

    protected $SFDCProductDataSync;

    /**
     * SFDCProductSyncCommand constructor.
     * @param string|null $name
     * @param SFDCConfigHelper $SFDCConfigHelper
     */
    public function __construct(string $name = null, SFDCProductDataSync $SFDCProductDataSync, \Magento\Framework\App\State $state)
    {
        $this->SFDCProductDataSync = $SFDCProductDataSync;
        $this->state = $state;
        parent::__construct($name);
    }

    /**
     * @param string|null $name
     */
    protected function configure(string $name = null)
    {
        $this->setName('magento:sfdc:product:Sync');
        $this->setDescription('Sync products from salesforce to Mageto Database.');

    }

    /**
     * Function to be processed on the execution of the custom command.
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $this->state->setAreaCode(\Magento\Framework\App\Area::AREA_FRONTEND); // or \Magento\Framework\App\Area::AREA_ADMINHTML, depending on your needs
        $result = $this->SFDCProductDataSync->productDataSync();
        $output->writeln('<fg=magenta>' . json_encode($result) . '</fg=magenta>');
    }

}