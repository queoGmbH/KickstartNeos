import React, {PureComponent} from 'react';
import PropTypes from 'prop-types';

export default class CustomDatePickerEditor extends PureComponent {

    static propTypes = {
        value: PropTypes.string,
        commit: PropTypes.func.isRequired,
    };

    handleChange = event => {
        console.log('change event');
        this.props.commit(event.target.value);
    };

    render() {
        return (<div>
            <input type="date" value={this.props.value} onChange={event => this.handleChange(event)} placeholder="TT.MM.YYYY"/>
        </div>);
    }
}