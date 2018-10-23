<?php


namespace SIVI\LaravelAFD\Models\Messages;


use SIVI\AFD\Models\Contracts\Message as MessageContract;
use SIVI\AFD\Models\Message;

class ContractMessage extends Message
{

    public static function matchMessage(MessageContract $message): bool
    {
        return $message->hasAttributeValue('SKPSID', 'AL', 99999999);
    }
}
