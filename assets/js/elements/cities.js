import React, {Component} from 'react';
import PropTypes from 'prop-types';
import {CitiesRegion} from '../api/country';

class Cities extends Component {

    constructor(props) {
        super(props);
        this.state = {
            citiesArr: [],
        };
        this.cityChange = this.cityChange.bind(this);
    };

    cityChange(event) {
        const cites = this.state.citiesArr;
        const {value} = event.target;
        let id = value;
        const cityName = cites.filter(cites=>cites.id == id).map((val)=>(val.cityName)).toString();
        this.props.setCity(cityName)
    };

    componentDidUpdate(prevProps) {
        if(prevProps.regionId !== this.props.regionId ) {
            this.City();
        }
    };

    componentDidMount() {
        this.City();
    };

    City = () => {

        CitiesRegion({region: this.props.regionId})
            .then(res => {
                if (res.status === 200) {
                    let resArray = res.data;
                    if (resArray) {
                        this.setState({citiesArr: res.data});
                    }
                } else {
                    throw new Error('Cities not last won!');
                }
            })
            .catch(e => console.warn(e));

    };

    render() {
        let citiesArr = this.state.citiesArr;
        return (
            <div>
                <select onChange={this.cityChange}>
                    {citiesArr.map((value, key) => (<option value={value.id} key={key}>{value.cityName}</option>))}
                </select>
            </div>
        )
    }

}

Cities.propTypes = {
    setCity: PropTypes.func.isRequired
};

export default Cities;