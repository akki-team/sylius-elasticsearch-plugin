<?php

/*
 * This file was created by developers working at BitBag
 * Do you need more information about us and what we do? Visit our https://bitbag.io website!
 * We are hiring developers from all over the world. Join us and start your new, exciting adventure and become part of us: https://bitbag.io/career
*/

declare(strict_types=1);

namespace spec\BitBag\SyliusElasticsearchPlugin\Model;

use BitBag\SyliusElasticsearchPlugin\Model\SearchFacets;
use Iterator;
use PhpSpec\ObjectBehavior;

final class SearchFacetsSpec extends ObjectBehavior
{
    function it_is_initializable(): void
    {
        $this->shouldHaveType(SearchFacets::class);
    }

    function it_is_an_iterator(): void
    {
        $this->shouldImplement(Iterator::class);
    }

    function it_stores_the_selected_buckets_of_a_facet(): void
    {
        $this->brand = ['959', '960'];

        $this->brand->shouldReturn(['959', '960']);
    }

    function it_returns_an_empty_array_for_a_facet_without_selected_buckets(): void
    {
        $this->unknown->shouldReturn([]);
    }

    function it_iterates_over_the_selected_buckets_of_every_facet(): void
    {
        $this->brand = ['959'];
        $this->size = ['42'];

        $this->shouldIterateLike(['brand' => ['959'], 'size' => ['42']]);
    }
}
