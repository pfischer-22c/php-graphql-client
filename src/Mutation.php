<?php

namespace GraphQL;

/**
 * Class Mutation
 *
 * @package GraphQL
 */
class Mutation extends Query
{
    /**
     * Stores the name of the type of the operation to be executed on the GraphQL server
     *
     * @var string
     */
    const OPERATION_TYPE = 'mutation';

    /**
     * @return string
     */
    protected function constructSelectionSet(): string
    {
        if (empty($this->selectionSet)) return '';

        return parent::constructSelectionSet();
    }
}