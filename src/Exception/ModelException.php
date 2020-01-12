<?php

/**
 * Copyright 2020 Jesse Rushlow - Geeshoe Development
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *     http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */

declare(strict_types=1);

namespace Geeshoe\Atom\Exception;

/**
 * Class ModelException
 *
 * @package Geeshoe\Atom\Exception
 * @author  Jesse Rushlow <jr@geeshoe.com>
 */
class ModelException extends \RuntimeException
{
    /**
     * @param string          $propertySignature
     * @param \Throwable|null $previous
     */
    public static function emptyPropertyException(string $propertySignature, \Throwable $previous = null): void
    {
        throw new self("$propertySignature value is empty or uninitialized", 0, $previous);
    }
}