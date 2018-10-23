<?php


namespace SIVI\LaravelAFD\Resolvers;


class MessageImplementationResolver implements \SIVI\AFD\Resolvers\Contracts\MessageImplementationResolver
{

    public function getMessageImplementations(): array
    {
        return config('afd.message_implementations');
    }
}
