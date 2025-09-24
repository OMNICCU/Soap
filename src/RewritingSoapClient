<?php

namespace App\Soap;

final class RewritingSoapClient extends \SoapClient
{
    public function __doRequest(
        string $request,
        string $location,
        string $action,
        int $version,
        bool $one_way = false
    ): ?string {
        // your one-line surgery:
        // $request = str_replace('FIND_THIS', 'REPLACE_WITH_THIS', $request);
        // or a precise regex if needed:
        // $request = preg_replace('/pattern/', 'replacement', $request, 1);

        return parent::__doRequest($request, $location, $action, $version, $one_way);
    }
}
