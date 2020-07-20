import React, {Component} from 'react';
import PropTypes from 'prop-types';
import {RegionsCountry} from '../api/country';
import {RegionCompanies} from '../api/country';

class Regions extends Component {

    constructor(props) {
        super(props);
        this.state = {
            regionsArr: [],
            // companiesArr: [],
        };
        this.regionChange = this.regionChange.bind(this);
    };

    regionChange(event) {
        this.props.regionChange(event.target.value);
        this.Companies(event.target.value);
        const regions = this.state.regionsArr;
        const {value} = event.target;
        let id = value;
        const regionName = regions.filter(regions=>regions.id == id).map((val)=>(val.regionName)).toString();
        this.props.setRegion(regionName)
    };

    componentDidUpdate(prevProps) {
        if(prevProps.countryId !== this.props.countryId ) {
            this.Regions();
        }
    };

    componentDidMount() {
        this.Regions();
    };

    Regions = () => {

        RegionsCountry({country: this.props.countryId})
            .then(res => {
                if (res.status === 200) {
                    let resArray = res.data;
                    if (resArray) {
                        this.setState({regionsArr: res.data});
                    }
                } else {
                    throw new Error('Regions not last won!');
                }
            })
            .catch(e => console.warn(e));

    };

    Companies = (region) => {

        RegionCompanies({region: region})
            .then(res => {
                if (res.status === 200) {
                    let resArray = res.data;
                    if (resArray) {
                        // this.setState({companiesArr: res.data});
                        this.props.setCompany(res.data)
                        // console.log(222, res.data);
                    }
                } else {
                    throw new Error('Regions not last won!');
                }
            })
            .catch(e => console.warn(e));

    };

    render() {
        let regionsArr = this.state.regionsArr;
        return (
            <div>
                <select onChange={this.regionChange}>
                    {regionsArr.map((value, key) => (<option value={value.id} key={key}>{value.regionName}</option>))}
                </select>
            </div>
        )
    }

}

Regions.propTypes = {
    setRegion: PropTypes.func.isRequired,
    setCompany: PropTypes.func.isRequired
};


export default Regions;

