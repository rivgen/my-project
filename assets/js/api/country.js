import axios from 'axios';

const Country = axios.create({
    baseURL: `/api/country`,
});

const Region = axios.create({
    baseURL: `/api/region`,
});

const City = axios.create({
    baseURL: `/api/city`,
});

const CompaniesFromRegion = axios.create({
    baseURL: `/api/region/company`,
});

export const AllCountry = () => {
    return Country({
        method: 'GET',
    });
};

export const RegionsCountry = ({ country }) => {
    return Region({
        method: 'POST',
        data: {country},
    });
};

export const CitiesRegion = ({ region }) => {
    return City({
        method: 'POST',
        data: {region},
    });
};

export const RegionCompanies = ({ region }) => {
    return CompaniesFromRegion({
        method: 'POST',
        data: {region},
    });
};