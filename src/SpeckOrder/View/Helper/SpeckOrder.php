<?php
namespace SpeckOrder\View\Helper;

use Zend\View\Helper\AbstractHelper;
use Zend\View\Model\ViewModel;
use Zend\ServiceManager\ServiceLocatorInterface;
use Zend\ServiceManager\ServiceLocatorAwareInterface;
use Zend\Stdlib\ArrayUtils;
use Zend\EventManager\EventManagerAwareInterface;
use Zend\EventManager\EventManagerAwareTrait;

class SpeckOrder extends AbstractHelper implements ServiceLocatorAwareInterface, EventManagerAwareInterface
{
    use EventManagerAwareTrait;

    protected $serviceLocator;
    protected $orderService;
    protected $moduleOptions;

    public function orderStatsToIcon($status)
    {
        $html = '';
        if (trim($status)) {
        }
        return $html;
    }

    public function flagsToIcons($flags)
    {
        $html = '';
        foreach ($flags as $flag) {
            $html .= '';
        }
        return $html;
    }

    public function paymentMethodToIcon($method)
    {
        $html = '';
        if (trim($method)) {
        }
        return $html;
    }

    public function orderSearchForm($render = false, array $formOptions = array())
    {
        $form = $this->getServiceLocator()->get('speckorder_form_ordersearch');
        $data = $this->eventData(__FUNCTION__, array('form' => $form));
        $form = $data['form'];

        $flags = $this->getOrderService()->getAllFlags();
        $form->setFilters($flags);

        if (isset($formOptions['attributes'])) {
            foreach ($formOptions['attributes'] as $attr => $val) {
                $form->setAttribute($attr, $val);
            }
        }

        if (!$render) {
            return $form;
        }

        $view = $this->getView();
        $html = $view->form()->openTag($form);
        foreach($form->getElements() as $element) {
            $html .= $view->formRow($element);
        }
        foreach($form->getFieldSets() as $fieldSet) {
            $name    = $fieldSet->getName();
            $partial = $this->getSearchFormFieldSetPartial($name);
            $data    = $partial ? array($name => $fieldSet) : array('fieldSet' => $fieldSet);
            $html   .= $view->partial($partial ?: $this->getSearchFormFieldSetPartial('default'), $data);
        }
        $html .= $view->form()->closeTag($form);

        return $html;
    }

    public function customerSearchForm($render = false, array $formOptions = array())
    {
        $form = $this->getServiceLocator()->get('speckorder_form_customersearch');
        $data = $this->eventData(__FUNCTION__, array('form' => $form));
        $form = $data['form'];

        if (isset($formOptions['attributes'])) {
            foreach ($formOptions['attributes'] as $attr => $val) {
                $form->setAttribute($attr, $val);
            }
        }

        if (!$render) {
            return $form;
        }

        $view = $this->getView();
        $html = $view->form()->openTag($form);
        foreach($form->getElements() as $element) {
            $html .= $view->formRow($element);
        }
        foreach($form->getFieldSets() as $fieldSet) {
            $name    = $fieldSet->getName();
            $partial = $this->getSearchFormFieldSetPartial($name);
            $data    = $partial ? array($name => $fieldSet) : array('fieldSet' => $fieldSet);
            $html   .= $view->partial($partial ?: $this->getSearchFormFieldSetPartial('default'), $data);
        }
        $html .= $view->form()->closeTag($form);

        return $html;
    }
    public function eventData($function, array $data)
    {
        $response = $this->getEventManager()->trigger($function, $this, $data);
        if (count($response)) {
            foreach ($response as $return) {
                $data = ArrayUtils::merge($data, $return);
            }
        }
        return $data;
    }

    public function orderTagsForm($orderNum = null, $checkedTags = null, $render = false)
    {
        if(!$checkedTags && !$orderNum) {
            throw new \RuntimeException('didnt get an ordernumber or array of checked tags');
        }

        if (!$checkedTags) {
            //$order  = $this->getOrderService()->getOrder($orderNum);
            //$checkedTags = $order['tags'];
        }

        $form = $this->getServiceLocator()->get('speckorder_form_ordertags');
        $data = $this->eventData(__FUNCTION__, array('form' => $form));
        $form = $data['form'];


        $tags  = $this->getOrderService()->getAllTags();
        $values = array('tags' => $checkedTags);

        $form->setTags($tags);
        $form->populateValues($values);

        if ($render === false) {
            return $form;
        }

        $view = $this->getView();
        $html = $view->form()->openTag($form);
        foreach($form->getElements() as $element) {
            $html .= $view->formRow($element);
        }
        $html .= $view->form()->closeTag($form);

        return $html;
    }

    /**
     * @return orderService
     */
    public function getOrderService()
    {
        if (null === $this->orderService) {
            $this->orderService = $this->getServiceLocator()->get('speckorder_service_orderservice');
        }
        return $this->orderService;
    }

    /**
     * @param $orderService
     * @return self
     */
    public function setOrderService($orderService)
    {
        $this->orderService = $orderService;
        return $this;
    }

    /**
     * @return searchFormFieldSetPartials
     */
    public function getSearchFormFieldSetPartial($key)
    {
        $moduleOptions    = $this->getModuleOptions();
        $fieldSetPartials = $moduleOptions['search_form_fieldset_partials'];

        if (isset($fieldSetPartials[$key])) {
            return $fieldSetPartials[$key];
        }
    }

    /**
     * @return serviceLocator
     */
    public function getServiceLocator()
    {
        return $this->serviceLocator->getServiceLocator();
    }

    /**
     * @param $serviceLocator
     * @return self
     */
    public function setServiceLocator(ServiceLocatorInterface $serviceLocator)
    {
        $this->serviceLocator = $serviceLocator;
        return $this;
    }

    /**
     * @return moduleOptions
     */
    public function getModuleOptions()
    {
        if (null === $this->moduleOptions) {
            $this->moduleOptions = $this->getServiceLocator()->get('speckorder_config');
        }
        return $this->moduleOptions;
    }

    /**
     * @param $moduleOptions
     * @return self
     */
    public function setModuleOptions($moduleOptions)
    {
        $this->moduleOptions = $moduleOptions;
        return $this;
    }
}
