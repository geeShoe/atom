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

namespace Geeshoe\Atom\Model;

use Geeshoe\Atom\Collection\CategoryCollection;
use Geeshoe\Atom\Collection\LinkCollection;
use Geeshoe\Atom\Collection\PersonCollection;
use Geeshoe\Atom\Contract\FeedInterface;
use Geeshoe\Atom\Exception\ModelException;

/**
 * @author Jesse Rushlow <jr@rushlow.dev>
 */
class Feed implements FeedInterface
{
    private string $id;
    private string $title;
    private \DateTimeInterface $updated;
    private ?PersonCollection $author = null;
    private ?CategoryCollection $category = null;
    private ?PersonCollection $contributor = null;
    private ?string $generator = null;
    private ?string $icon = null;
    private ?string $logo = null;
    private ?LinkCollection $link = null;
    private ?string $rights = null;
    private ?string $subtitle = null;

    /**
     * @param string             $id      unique permanent feed URI
     * @param string             $title   human readable title of the feed
     * @param \DateTimeInterface $updated time of last significant feed modification
     */
    public function __construct(string $id, string $title, \DateTimeInterface $updated)
    {
        $this->id = $id;
        $this->title = $title;
        $this->updated = $updated;
    }

    /**
     * {@inheritdoc}
     *
     * @throws ModelException
     */
    public function getId(): string
    {
        if (!empty($this->id)) {
            return $this->id;
        }

        throw ModelException::emptyPropertyException('Id');
    }

    /**
     * {@inheritdoc}
     *
     * @throws ModelException
     */
    public function getTitle(): string
    {
        if (!empty($this->title)) {
            return $this->title;
        }

        throw ModelException::emptyPropertyException('Title');
    }

    /**
     * {@inheritdoc}
     */
    public function getUpdated(): \DateTimeInterface
    {
        return $this->updated;
    }

    public function getAuthor(): ?PersonCollection
    {
        return $this->author;
    }

    public function setAuthor(PersonCollection $author): void
    {
        $this->author = $author;
    }

    public function getCategory(): ?CategoryCollection
    {
        return $this->category;
    }

    public function setCategory(CategoryCollection $categoryCollection): void
    {
        $this->category = $categoryCollection;
    }

    public function getContributor(): ?PersonCollection
    {
        return $this->contributor;
    }

    public function setContributor(PersonCollection $personCollection): void
    {
        $this->contributor = $personCollection;
    }

    public function getLink(): ?LinkCollection
    {
        return $this->link;
    }

    public function setLink(LinkCollection $linkCollection): void
    {
        $this->link = $linkCollection;
    }

    public function getGenerator(): ?string
    {
        return $this->generator;
    }

    public function setGenerator(string $generator): void
    {
        $this->generator = $generator;
    }

    public function getIcon(): ?string
    {
        return $this->icon;
    }

    public function setIcon(string $icon): void
    {
        $this->icon = $icon;
    }

    public function getLogo(): ?string
    {
        return $this->logo;
    }

    public function setLogo(string $logo): void
    {
        $this->logo = $logo;
    }

    public function getRights(): ?string
    {
        return $this->rights;
    }

    public function setRights(string $rights): void
    {
        $this->rights = $rights;
    }

    public function getSubtitle(): ?string
    {
        return $this->subtitle;
    }

    public function setSubtitle(string $subtitle): void
    {
        $this->subtitle = $subtitle;
    }
}
