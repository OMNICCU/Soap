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
            'cmn:MessageId="1"',
            $request,
            1
        );
        $request = preg_replace(
            '/(<\w+:Envelope\b)(?![^>]*\bxmlns:cmn=)([^>]*)(>)/',
            '$1$2 xmlns:cmn="http://www.symxchange.generated.symitar.com/symxcommon"$3',
            $request,
            1
        );


        return parent::__doRequest($request, $location, $action, $version, $one_way);
    }
}
