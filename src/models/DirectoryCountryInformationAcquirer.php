<?php

namespace springimport\yii2\magento2\activeapi\models;

use springimport\yii2\magento2\activeapi\components\ActiveApi;

class DirectoryCountryInformationAcquirer extends ActiveApi
{
    const SCENARIO_GET_DIRECTORY_COUNTRIES            = 'getDirectoryCountries';
    const SCENARIO_GET_DIRECTORY_COUNTRIES_COUNTRY_ID = 'getDirectoryCountriesCountryId';

    public function scenarios()
    {
        return [
            self::SCENARIO_GET_DIRECTORY_COUNTRIES => [],
            self::SCENARIO_GET_DIRECTORY_COUNTRIES_COUNTRY_ID => [],
        ];
    }

    public function urls()
    {
        return [
            self::SCENARIO_GET_DIRECTORY_COUNTRIES => 'directory/countries',
            self::SCENARIO_GET_DIRECTORY_COUNTRIES_COUNTRY_ID => 'directory/countries/%s',
        ];
    }
}
