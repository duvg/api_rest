<?php

declare(strict_types=1);

namespace App\Service\Request;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;

class RequestService
{
    /**
     * @return mixed
     */
    public static function getField(Request $request, string $fieldName, bool $isRequired = true, bool $isArray = false)
    {
        $requestData = $request->request->all();

        if ($isArray) {
            $arrayData = self::arrayFlatter($requestData);

            foreach ($arrayData as $key => $value) {
                if ($fieldName === $key) {
                    return $value;
                }
            }

            if ($isRequired) {
                throw new BadRequestHttpException("Missing field $fieldName");
            }

            return null;
        }
        if (!$requestData) {
            throw new BadRequestHttpException("Bad Request");
        }

        if (array_key_exists($fieldName, $requestData)) {
            return $requestData[$fieldName];
        }

        if ($isRequired) {
            throw new BadRequestHttpException("Missing field $fieldName");
        }

        return null;
    }

    // Iterate an object with 2 or more levels
    public static function arrayFlatter(array $array): array
    {
        $return = [];
        foreach ($array as $key => $value) {
            if (\is_array($value)) {
                $return = \array_merge($return, self::arrayFlatter($value));
            } else {
                $return[$key] = $value;
            }
        }

        return $return;
    }
}
