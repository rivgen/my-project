export function setCountry(country, zoom) {
    return {
        type: 'SET_COUNTRY',
        payload: country,
        zoom: zoom
    }
}