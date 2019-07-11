import manifest from '@neos-project/neos-ui-extensibility';

import CustomDatePickerEditor from './CustomDatePickerEditor';

manifest('Queo.Forms.CustomEditors:CustomDatePickerEditor', {}, globalRegistry => {
    const editorsRegistry = globalRegistry.get('inspector').get('editors');

    editorsRegistry.set('Queo.Forms.CustomEditors/CustomDatePickerEditor', {
        component: CustomDatePickerEditor
    });
});