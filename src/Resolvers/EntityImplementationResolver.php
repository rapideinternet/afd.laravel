<?php


namespace SIVI\LaravelAFD\Resolvers;


class EntityImplementationResolver implements \SIVI\AFD\Resolvers\Contracts\EntityImplementationResolver
{
    public function getGetEntityImplementations(): array
    {
        return config('afd.entity_implementations');
    }
}
