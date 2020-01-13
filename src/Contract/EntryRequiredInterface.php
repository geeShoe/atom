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

namespace Geeshoe\Atom\Contract;

/**
 * Interface EntryRequiredInterface
 *
 * @package Geeshoe\Atom\Contract
 * @author  Jesse Rushlow <jr@geeshoe.com>
 */
interface EntryRequiredInterface
{
    /**
     * @return string Unique permanent URI of the feed.
     * @see https://tools.ietf.org/html/rfc4287#section-4.2.15
     */
    public function getId(): string;

    /**
     * @return string Human readable title of the feed.
     * @see https://tools.ietf.org/html/rfc4287#section-4.2.14
     */
    public function getTitle(): string;

    /**
     * @return \DateTimeInterface
     * @see https://tools.ietf.org/html/rfc4287#section-4.2.15
     */
    public function getUpdated(): \DateTimeInterface;
}
