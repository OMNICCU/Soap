<?php

namespace RicorocksDigitalAgency\Soap;

final class RewritingSoapClient extends \SoapClient
{
    public function __doRequest(
        string $request,
        string $location,
        string $action,
        int $version,
        bool $one_way = false
    ): ?string {
        $request = preg_replace(
            '/\b(?:\w+:)?MessageId="[^"]*"/',
            'cmn:MessageId="1"  xmlns:cmn="http://www.symxchange.generated.symitar.com/symxcommon',
            $request,
            1
        );

        var_dump($request);

        return parent::__doRequest($request, $location, $action, $version, $one_way);
    }
}
