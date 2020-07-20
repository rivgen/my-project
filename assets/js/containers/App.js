import React, {Component} from 'react';
import {connect} from 'react-redux'
import Countries from '../elements/countries';
import Regions from '../elements/regions';
import Cities from '../elements/cities';
import Map from '../elements/yamap';
import Grid from '@material-ui/core/Grid';
import {setCountry} from '../actions/CountryActions'
import {setRegion} from '../actions/RegionActions'
import {setCity} from '../actions/CityActions'
import {setCompany} from '../actions/CompanyActions'

class App extends Component {


    constructor(props) {
        super(props);
        this.state = {
            countryId: '',
            countryName: '',
            regionId: '',
            geocode: this.props.geocode.country,
        };
        this.countryChange = this.countryChange.bind(this);
        this.regionChange = this.regionChange.bind(this);
    };

    countryChange(country) {
        this.setState({countryId: country});
    }

    regionChange(region) {
        this.setState({regionId: region});
    }

    render() {
        const {geocode, setCountryAction, setRegionAction, setCityAction, setCompanyAction} = this.props;
        // console.log(777, setCompanyAction);
        return (
            <div>
                <Grid container>
                    <Countries countryChange={this.countryChange}
                        // countryName={this.countryName}
                               country={geocode.country}
                               setCountry={setCountryAction}
                        // setCountryZoom={setCountryZoomAction}
                    />
                    <Regions countryId={this.state.countryId}
                             regionChange={this.regionChange}
                             setRegion={setRegionAction}
                             setCompany={setCompanyAction}
                    />
                    <Cities regionId={this.state.regionId}
                            setCity={setCityAction}/>
                </Grid>
                <Grid container>
                    <Map style="width: 100%" geocodeCountry={geocode}/>
                </Grid>
            </div>
        )
    }
}

const mapStateToProps = store => {
    console.log(store); // посмотрим, что же у нас в store?
    return {
        geocode: store.geocode
    }
};

const mapDispatchToProps = dispatch => ({
    setCountryAction: (country, zoom) => dispatch(setCountry(country, zoom)),
    setRegionAction: region => dispatch(setRegion(region)),
    setCityAction: city => dispatch(setCity(city)),
    setCompanyAction: companies => dispatch(setCompany(companies))
});

export default connect(mapStateToProps, mapDispatchToProps)(App);

