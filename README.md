# Currency Fix
*infinityredux / module-currency-fix*

This module solves a problem where currency symbols disappears on pages after 
the initial render pass, but before the pages have completed the magento load 
cycle. Based on the 
[magecomp blog](https://magecomp.com/blog/solved-magento-2-currency-symbol-not-showing/) 
for this bug.

Issue was apparently reported in Magento `2.4.3` but the code changed by the 
fix is still the same in `2.4.5-p3`, and should still work for as long as the 
code remains unchanged.
