<?php


namespace SimplifiedMagento\CustomAdmin\Block\Adminhtml\Block\Edit;


use Magento\Framework\View\Element\UiComponent\Control\ButtonProviderInterface;

class SaveButton implements ButtonProviderInterface
{
    /**
     * Retrieve button-specified settings
     *
     * @return array
     */
    public function getButtonData()
    {
        return [
            'label' => __('Save Member'),
            'class' => 'save primary',
            'sort_order' => 50
        ];
    }

}