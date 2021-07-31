<?php


namespace App\Services\Entity;


class AccountEntity
{
    /**
     * @var \DOMElement
     */
    private \DOMElement $domElement;

    /**
     * AccountEntity constructor.
     * @param \DOMElement $DOMElement
     */
    public function __construct(\DOMElement $DOMElement)
    {
        $this->domElement = $DOMElement;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->domElement->getElementsByTagName('a')[0]->textContent;
    }

    /**
     * @return string
     */
    public function getImage(): string
    {
        return $this->domElement->getElementsByTagName('img')[0]->getAttribute('src');
    }

    /**
     * @return float
     */
    public function getFollowers(): float
    {
        return (float)$this->domElement->getElementsByTagName('div')[5]->textContent;
    }
}
