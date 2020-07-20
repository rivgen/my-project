import React, {Component} from 'react';
import {YMaps, Map, Placemark} from 'react-yandex-maps';
import ymaps from 'ymaps';

class Yandexmap extends Component {

    constructor(props) {
        super(props);
        this.state = {
            coordinates: [52.858248, 27.701393],
            coordinatesCountries: []
        };
        this.geocodeArr = this.geocodeArr.bind(this);
    };

    componentDidUpdate(prevProps) {
        if (prevProps.geocodeCountry !== this.props.geocodeCountry) {
            ymaps.load("https://api-maps.yandex.ru/2.1/?lang=ru_RU&apikey=932f7b60-77d9-4f30-ad3b-f4917b68160d&load=geolocation,geocode")
                .then(ymaps => this.geocodeArr(ymaps))
        }
    }



    geocodeArr = ymaps => {
        // console.log('geocode');
        const {geocodeCountry} = this.props;
        const code = geocodeCountry.country +`${geocodeCountry.region?', ' + geocodeCountry.region +`${geocodeCountry.city?', ' + geocodeCountry.city:''}`:''}`;
        // console.log(222, geocodeCountry);
        // console.log(333, code);
        ymaps.geocode(code)
            .then(result => {
                // console.log(111, result.geoObjects.get(0).geometry.getCoordinates())
                this.setState({coordinates: result.geoObjects.get(0).geometry.getCoordinates()})
            } );
        if (geocodeCountry.companies.length !== 0){
            this.companiesBallon(ymaps)
        }
    };

    companiesBallon = (ymaps) => {
        const {geocodeCountry} = this.props;
        geocodeCountry.companies.map(value =>(
            // const code = value.cityName + `${value.address ? ', ' + value.address : ''}`
            // console.log(value.cityName + `${value.address ? ', ' + value.address : ''}`)
            ymaps.geocode(value.cityName + `${value.address ? ', ' + value.address : ''}`)
                .then(result => {
                    // console.log(111, result.geoObjects.get(0).geometry.getCoordinates())
                    // this.setState({coordinatesCountries: result.geoObjects.get(0).geometry.getCoordinates()})
                    this.setState({
                        coordinatesCountries: [...this.state.coordinatesCountries, result.geoObjects.get(0).geometry.getCoordinates()]
                    })
                } )
        ))
    }

    render() {
        const {geocodeCountry} = this.props;
        let {coordinates} = this.state
        let {coordinatesCountries} = this.state
        if (!coordinates) return null
        // console.log(111, ymaps)
        // console.log(222, coordinatesCountries);
        coordinatesCountries.map(val =>(console.log(val)))
        return (
            <YMaps
                query={{
                    ns: 'use-load-option',
                    apikey: '932f7b60-77d9-4f30-ad3b-f4917b68160d',
                    load: 'Map,Placemark,control.ZoomControl,control.FullscreenControl,geoObject.addon.balloon,geolocation,geocode',
                }}
            >
                <div>
                    My awesome application with maps!
                    <Map
                        state={{center: coordinates, zoom: geocodeCountry.zoom}}
                        onLoad={ymaps => {this.geocodeArr(ymaps)}}
                        width="80vw"
                        height ="350px"
                    >
                        {coordinatesCountries.map((val, key) =>(<Placemark geometry={val} key={key}/>))}
                    </Map>
                </div>
            </YMaps>
        )
    }
}
;

export default Yandexmap;
