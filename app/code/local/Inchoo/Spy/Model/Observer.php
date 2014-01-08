<?php

class Inchoo_Spy_Model_Observer {
    const FLAG_BRAKE = 'break';

    private $request;

    /**
     * Triggered from config.xml
     * 
     * @param $observer
     */
    public function iSpyWithMyEye($observer)
    {
        $this->request = $observer->getEvent()->getData('front')->getRequest();

        if ($this->request->{self::FLAG_BRAKE} === 'true') {
            die('stopped');
        }
    }
}