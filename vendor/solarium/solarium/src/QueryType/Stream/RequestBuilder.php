<?php

/*
 * This file is part of the Solarium package.
 *
 * For the full copyright and license information, please view the COPYING
 * file that was distributed with this source code.
 */

namespace Solarium\QueryType\Stream;

use Solarium\Core\Client\Request;
use Solarium\Core\Query\QueryInterface;
use Solarium\Core\Query\RequestBuilderInterface;

/**
 * Build a stream request.
 */
class RequestBuilder implements RequestBuilderInterface
{
    /**
     * Build request for a stream query.
     *
     * @param QueryInterface|Query $query
     *
     * @return Request
     */
    public function build(QueryInterface|Query $query): Request
    {
        $request = new Request();
        $request->setHandler($query->getHandler());
        $request->setContentType(Request::CONTENT_TYPE_TEXT_PLAIN);
        $request->addParam('expr', $query->getExpression());
        $request->addParams($query->getParams());

        return $request;
    }
}
