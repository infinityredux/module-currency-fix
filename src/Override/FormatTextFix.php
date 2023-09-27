<?php
namespace InfinityRedux\CurrencyFix\Override;

use Magento\Directory\Model\Currency;
use Magento\Framework\Currency\Exception\CurrencyException;


class FormatTextFix extends Currency
{
    /**
     * Override to specifically replace the functionality, as per a blog
     * describing the fix. Their "fix" involved overriding most of the functions
     * in the Currency model - but the only actual change I could find (aside
     * from the weird whitespace they used) was in this function, removing a
     * call to `formatCurrency`.
     *
     * Worth noting that this was apparently a fix for an issue in Magento 2.4.3
     * so may well get outdated, but
     *
     * @see https://magecomp.com/blog/solved-magento-2-currency-symbol-not-showing/
     * @throws CurrencyException
     */
    public function formatTxt($price, $options = []): string
    {
        if (!is_numeric($price)) {
            $price = $this->_localeFormat->getNumber($price);
        }
        $price = sprintf("%F", $price);

        // if ($this->canUseNumberFormatter($options)) {
        //     return $this->formatCurrency($price, $options);
        // }

        return $this->_localeCurrency->getCurrency($this->getCode())->toCurrency($price, $options);
    }
}
