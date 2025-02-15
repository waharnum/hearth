<?php

use CommerceGuys\Addressing\Subdivision\SubdivisionRepository;

if (! function_exists('get_region_name')) {
    /**
     * Get the name of an administrative subdivision from its code.
     *
     * @param string $code An administrative subdivision code.
     * @param array $countries An array of ISO 3166-1 alpha-2 country codes.
     * @param string $locale An ISO 639-1 language code.
     *
     * @return null|string The name of the administrative subdivision, if found.
     */
    function get_region_name($code, $countries = ['CA'], $locale = 'en')
    {
        $subdivisionRepository = new SubdivisionRepository();

        $subdivision = $subdivisionRepository->get($code, $countries);

        if ($subdivision) {
            return ($locale === $subdivision->getLocale()) ? $subdivision->getLocalName() : $subdivision->getName();
        }

        return null;
    }
}

if (! function_exists('get_regions')) {
    /**
     * Retrieve an array of administrative subdivisions within a country or countries.
     *
     * @param array $countries An array of ISO 3166-1 alpha-2 country codes.
     * @param string $locale An ISO 639-1 language code.
     *
     * @return array An array of administrative subdivision names keyed by administrative subdivision codes.
     */
    function get_regions($countries = ['CA'], $locale = 'en')
    {
        $subdivisionRepository = new SubdivisionRepository();

        $regions = [];

        foreach ($subdivisionRepository->getAll($countries) as $region) {
            $regions[$region->getCode()] = ($locale === $region->getLocale()) ? $region->getLocalName() : $region->getName();
        }

        return $regions;
    }
}

if (! function_exists('get_region_codes')) {
    /**
     * Retrieve an array of administrative subdivision codes within a country or countries.
     *
     * @param array $countries An array of ISO 3166-1 alpha-2 country codes.
     *
     * @return array An array of administrative subdivision codes.
     */
    function get_region_codes($countries = ['CA'])
    {
        $subdivisionRepository = new SubdivisionRepository();

        $regions = [];

        foreach ($subdivisionRepository->getAll($countries) as $region) {
            $regions[] = $region->getCode();
        }

        return $regions;
    }
}
