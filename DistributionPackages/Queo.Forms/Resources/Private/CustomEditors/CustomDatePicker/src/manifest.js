import manifest from '@neos-project/neos-ui-extensibility';

import CustomDatePickerEditor from './CustomDatePickerEditor';

console.log('load new datepicker')

manifest('Queo.Forms.CustomEditors:CustomDatePickerEditor', {}, globalRegistry => {
    const editorsRegistry = globalRegistry.get('inspector').get('editors');

    

    editorsRegistry.set('Queo.Forms.CustomEditors/CustomDatePickerEditor', {
        component: CustomDatePickerEditor
    });
});