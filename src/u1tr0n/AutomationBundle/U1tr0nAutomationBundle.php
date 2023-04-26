<?php
declare(strict_types=1);

namespace u1tr0n\AutomationBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class U1tr0nAutomationBundle extends Bundle
{
    public function getPath(): string
    {
        return \dirname(__DIR__);
    }
}