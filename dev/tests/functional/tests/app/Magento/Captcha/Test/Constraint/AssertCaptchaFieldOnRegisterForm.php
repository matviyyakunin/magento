<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace Magento\Captcha\Test\Constraint;

use Magento\Customer\Test\Page\CustomerAccountCreate;
use Magento\Mtf\Constraint\AbstractConstraint;
use PHPUnit\Framework\Assert;

/**
 * Assert captcha on storefront account register page.
 */
class AssertCaptchaFieldOnRegisterForm extends AbstractConstraint
{
    /**
     * Assert captcha and reload button are visible on storefront account register page.
     *
     * @param CustomerAccountCreate $createAccountPage
     * @return void
     */
    public function processAssertRegisterForm(CustomerAccountCreate $createAccountPage)
    {
        Assert::assertTrue(
            $createAccountPage->getRegisterForm()->isVisibleCaptcha(),
            'Captcha image is not displayed on the storefront account register page.'
        );

        Assert::assertTrue(
            $createAccountPage->getRegisterForm()->isVisibleCaptchaReloadButton(),
            'Captcha reload button is not displayed on the storefront account register page.'
        );
    }

    /**
     * Returns a string representation of the object.
     *
     * @return string
     */
    public function toString()
    {
        return 'Captcha and reload button are displayed on the storefront account register page.';
    }
}
