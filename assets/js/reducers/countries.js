const initialState = {
    country: 'Россия',
    zoom: 9,
    companies: []
}

export function countryReducer(state = initialState, action) {
    switch (action.type) {
        case 'SET_COUNTRY':
            return { ...state, country: action.payload, region: '', city: '', zoom: action.zoom }

        case 'SET_REGION':
            return { ...state, region: action.payload, city: '', zoom: 9 }

        case 'SET_CITY':
            return { ...state, city: action.payload, zoom: 12 }

        case 'SET_COMPANIES':
            return { ...state, companies: action.payload}

        default:
            return state
    }
}