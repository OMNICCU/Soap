<?php

namespace RicorocksDigitalAgency\Soap;


final class RewritingSoapClient extends \SoapClient
{
    private bool $rewrite;
    public function __construct(string $wsdl, array $options)
    {
        $this->rewrite = (bool)($options['rewrite'] ?? false);
        parent::__construct($wsdl, $options);
    }

    public function __doRequest(
        string $request,
        string $location,
        string $action,
        int $version,
        bool $oneWay = false
    ): ?string {
        if ($this->rewrite) {
            $request = preg_replace(
                '/\b(?:\w+:)?MessageId="[^"]*"/',
                'cmn:MessageId="1"  xmlns:cmn="http://www.symxchange.generated.symitar.com/symxcommon"',
                $request,
                1
            );
        }

        return parent::__doRequest($request, $location, $action, $version, $oneWay);
    }
}