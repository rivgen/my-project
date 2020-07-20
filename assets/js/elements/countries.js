import React, {Component} from 'react';
import PropTypes from 'prop-types';
import {AllCountry} from '../api/country';

class Countries extends Component {
    constructor(props) {
        super(props);
        this.state = {
            countriesArr: [],
            countryName: '',
        };
        this.countryChange = this.countryChange.bind(this);
    };

    countryChange(event) {
        const countries = this.state.countriesArr;
        const {value} = event.target;
        let id = value;
        const country = countries.filter(countries=>countries.id == id)
        const countryName = country.map((val)=>(val.countryName)).toString();
        const countryZoom = country.map((val)=>(val.zoom)).toString();
        this.props.countryChange(value);
        this.props.setCountry(countryName, countryZoom);
        // console.log(111, countryZoom);

    };

    componentDidMount() {
        this.Countries();
    };

    Countries = () => {

        AllCountry()
            .then(res => {
                // console.dir(res.data);

                if (res.status === 200) {
                    let resArray = res.data;
                    if (resArray) {
                        // console.dir(res.data);
                        this.setState({countriesArr: res.data});
                        // this.setState({countryId: res.data});
                    }
                    // console.dir(res)
                } else {
                    throw new Error('Countries not last won!');
                }
            })
            .catch(e => console.warn(e));

    };

    render() {
        let countries = this.state.countriesArr;
        const { country } = this.props;
        return (
            <div>
                {country}
                <select onChange={this.countryChange}>
                    {countries.map((value, key) => (<option value={value.id}  key={key}>{value.countryName}</option>))}
                </select>
            </div>
        )
    }
}

Countries.propTypes = {
    country: PropTypes.string.isRequired,
    setCountry: PropTypes.func.isRequired,
};

export default (Countries);