<?php


namespace App\Services;

use App\Services\Entity\AccountEntity;
use DOMElement;
use PhpQuery\PhpQuery;

class ParseAccountService
{
    const PARSE_URL = 'https://viralpitch.co/topinfluencers/instagram/top-100-instagram-influencers/';
    const BLOCK_INDEX = '.top-channel-item.flex-box';

    /**
     * @var string|false
     */
    private string $page;
    /**
     * @var PhpQuery
     */
    private PhpQuery $phpQuery;

    public function __construct()
    {
        $this->page = file_get_contents(self::PARSE_URL);
        $this->phpQuery = new PhpQuery;
        $this->phpQuery->load_str($this->page);
    }

    /**
     * @param \Closure $closure
     */
    public function map(\Closure $closure): void
    {
        /** @var DOMElement $item */
        foreach ($this->phpQuery->query(self::BLOCK_INDEX) as $item) {
            $closure(new AccountEntity($item));
        }
    }
}
