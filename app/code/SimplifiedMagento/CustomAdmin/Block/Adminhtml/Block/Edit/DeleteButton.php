<?php


namespace SimplifiedMagento\CustomAdmin\Block\Adminhtml\Block\Edit;


use Magento\Framework\View\Element\UiComponent\Control\ButtonProviderInterface;

class DeleteButton extends Generic implements ButtonProviderInterface
{

    /**
     * Retrieve button-specified settings
     *
     * @return array
     */
    public function getButtonData()
    {
        $data = [];
        if ($this->getId()) {
            $data = [
                'label' => __('Delete Block'),
                'on_click' => 'deleteConfirm(\'' . __(
                        'Are you sure you want to do this?'
                    ) . '\', \'' . $this->getDeleteUrl() . '\')',
                'class' => 'delete',
                'sort_order' => 20,
            ];
        }
        return $data;
    }

    public function getDeleteUrl(){
        return $this->getUrl('*/*/delete',['id' => $this->getId()]);
    }


}