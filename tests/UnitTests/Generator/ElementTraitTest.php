<?php

/**
 * Copyright 2020 Jesse Rushlow - Geeshoe Development.
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

namespace Geeshoe\Atom\UnitTests\Generator;

use Geeshoe\Atom\Fixtures\ElementTraitFixture;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;

/**
 * @author Jesse Rushlow <jr@rushlow.dev>
 *
 * @internal
 */
class ElementTraitTest extends TestCase
{
    /** @var \DOMDocument&MockObject */
    public $mockDocument;

    protected function setUp(): void
    {
        $this->mockDocument = $this->createMock(\DOMDocument::class);
    }

    /** @test */
    public function idPassesParamsToCreateElement(): void
    {
        $id = 'https://geeshoe.com/';

        $this->mockDocument
            ->expects($this->once())
            ->method('createElement')
            ->with('id', $id)
            ->willReturn($this->createMock(\DOMElement::class))
        ;

        $trait = new ElementTraitFixture($this->mockDocument);

        $trait->getIdElement($id);
    }

    /** @test */
    public function titlePassesParamsToCreateElement(): void
    {
        $title = 'Unit Test';

        $this->mockDocument
            ->expects($this->once())
            ->method('createElement')
            ->with('title', $title)
            ->willReturn($this->createMock(\DOMElement::class))
        ;

        $trait = new ElementTraitFixture($this->mockDocument);
        $trait->getTitleElement($title);
    }

    /** @test */
    public function updatedPassesParamsToCreateElement(): void
    {
        $date = new \DateTimeImmutable();
        $updated = $date->format(\DATE_ATOM);

        $this->mockDocument
            ->expects($this->once())
            ->method('createElement')
            ->with('updated', $updated)
            ->willReturn($this->createMock(\DOMElement::class))
        ;

        $trait = new ElementTraitFixture($this->mockDocument);
        $trait->getUpdatedElement($updated);
    }
}
