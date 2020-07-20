import { combineReducers } from 'redux'
// import { regionReducer } from './regions'
import { countryReducer } from './countries'

export const rootReducer = combineReducers({
    geocode: countryReducer,
})