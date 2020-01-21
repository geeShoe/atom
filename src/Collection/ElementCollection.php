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

namespace Geeshoe\Atom\Collection;

use Geeshoe\Atom\Contract\CollectionInterface;
use Geeshoe\Atom\Contract\ElementInterface;

/**
 * Class ElementCollection
 *
 * @package Geeshoe\Atom\Collection
 * @author  Jesse Rushlow <jr@geeshoe.com>
 * @template-implements CollectionInterface<int|null, ElementInterface>
 */
class ElementCollection implements CollectionInterface
{
    /** @var array<ElementInterface> */
    private array $elements = [];

    public function add(ElementInterface $element): void
    {
        $this->elements[] = $element;
    }

    /**
     * @inheritDoc
     */
    public function offsetExists($offset): bool
    {
        return isset($this->elements[$offset]);
    }

    /**
     * @inheritDoc
     */
    public function offsetGet($offset)
    {
        return $this->elements[$offset];
    }

    /**
     * @inheritDoc
     */
    public function offsetSet($offset, $value): void
    {
        if ($offset === null) {
            $this->elements[] = $value;
            return;
        }

        $this->elements[$offset] = $value;
    }

    /**
     * @inheritDoc
     */
    public function offsetUnset($offset): void
    {
        unset($this->elements[$offset]);
    }

    /**
     * @inheritDoc
     */
    public function getIterator(): \Traversable
    {
        return new \ArrayIterator($this->elements);
    }

    /**
     * @inheritDoc
     */
    public function count(): int
    {
        return count($this->elements);
    }
}