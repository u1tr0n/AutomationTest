<?php

namespace u1tr0n\AutomationBundle\Command;

use Symfony\Component\Console\Attribute\AsCommand;
use u1tr0n\AutomationBundle\Validator\AsAutomationCommand;

#[AsCommand(
    name: 'automation:run',
    description: 'run all commands need to be run',
)]
#[AsAutomationCommand()]
class RunAutomationCommand
{

}